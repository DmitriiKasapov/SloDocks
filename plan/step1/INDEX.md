# SloDocs — Этап 1: Итог и план

## Статус бэкенда: ЗАВЕРШЁН (2026-02-04)

| Блок | Статус |
|------|--------|
| Модели, миграции, сервисы | ✅ |
| Stripe + webhooks | ✅ |
| Mock payment (dev) | ✅ |
| Система доступа (токены) | ✅ |
| Filament admin | ✅ |
| SEO (sitemap, robots, schema.org, OG) | ✅ |
| Тесты (49: 21 Unit + 28 Feature) | ✅ |
| PostgreSQL | ✅ |
| Поиск (/search) | ✅ |
| Frontend / дизайн | 🔨 В работе |
| Production deployment | ⏳ |

---

## User Flow

1. Пользователь открывает главную → видит список услуг
2. Выбирает услугу → страница с описанием и ценой
3. Нажимает «Получить доступ» → вводит email
4. Редирект на Stripe Checkout → оплачивает
5. Stripe отправляет webhook → система выдаёт Access
6. Пользователь получает email со ссылкой `/services/{slug}?token=xxx`
7. По ссылке открывается платный контент
8. По истечении срока — доступ закрывается автоматически

Альтернатива: ошибка оплаты → Purchase остаётся `pending` → пользователь может повторить.

---

## Страница услуги

### Публичная часть (без токена)
1. H1 — заголовок услуги
2. Краткое описание (для кого, что получит)
3. Список «Что входит в материалы»
4. Формат и условия доступа (срок, электронный вид)
5. Цена + единственная кнопка CTA «Получить доступ»
6. Блок отказа от ответственности

### Платная часть (с валидным токеном)
Контентные блоки (`material_blocks`):
- **steps** — пошаговые инструкции (автогенерирует обзор шагов)
- **text** — RichText (H2/H3, списки)
- **tip** — полезный совет (info/warning/success)
- **files** — файлы для скачивания (PDF, private disk)
- **samples** — образцы и примеры
- **faq** — вопросы и ответы
- **help** — CTA-блок с текстом и ссылкой

Доступ к файлам: `/services/{slug}/file/{field}?token=xxx` (FileController с whitelist)

### Состояния страницы
- Нет токена → публичная версия + CTA
- Невалидный токен → сообщение об ошибке (без деталей)
- Истекший токен → «Срок доступа истёк» + CTA повторной оплаты
- Валидный токен → баннер «У вас есть доступ до {date}» + платный контент

---

## Архитектура

### База данных

| Таблица | Ключевые поля |
|---------|--------------|
| services | slug, title, price, access_duration_days, is_active |
| purchases | service_id, email, payment_id (nullable), status: pending/paid/failed |
| accesses | service_id, purchase_id, email, access_token (64 chars), expires_at, is_active |
| material_blocks | service_id, type, order_index, content (json) |
| users | email, purchases_count, first/last_purchase_at (пассивная статистика) |
| activity_logs | event_type, email, service_id, purchase_id, metadata |
| admin_users | email, password (Filament auth, отдельно от users) |

### Ключевые файлы

```
app/Services/
├── PaymentService.php       # Stripe Checkout / Mock
├── AccessService.php        # Проверка токена → AccessResult (value object)
├── AccessGrantService.php   # Выдача доступа (DB transaction, идемпотентность)

app/Jobs/
├── ProcessStripeWebhook.php # checkout.session.completed → выдача доступа
└── SendAccessEmail.php      # Email со ссылкой (backoff: 5,15,30s, 3 попытки)

app/Http/Controllers/
├── ServiceController.php   # Публичная/платная страница услуги
├── PaymentController.php   # Checkout + mock + success/cancel
├── WebhookController.php   # Stripe webhook (signature verification)
├── FileController.php      # Скачивание PDF (проверка доступа, whitelist)
└── SearchController.php    # Поиск услуг

app/Http/Middleware/
├── CheckServiceAccess.php  # Проверка токена → request attributes
└── SetReferrerPolicy.php   # no-referrer (токен не утекает в заголовках)

app/Filament/Resources/
├── ServiceResource.php     # CRUD услуг + контент + SEO
├── PurchaseResource.php    # Только чтение
└── AccessResource.php      # Чтение + resend email + деактивация

app/Console/Commands/
└── ExpireAccessesCommand.php  # access:expire, запуск: daily()
```

---

## Маршруты

| Метод | URL | Назначение |
|-------|-----|-----------|
| GET | `/` | Главная |
| GET | `/services/{slug}` | Страница услуги (middleware: CheckServiceAccess) |
| GET | `/services/{slug}/file/{field}` | Скачивание PDF (проверка доступа) |
| GET | `/search` | Поиск услуг |
| POST | `/payment/create` | Создание Checkout (throttle: 10/min) |
| GET | `/payment/success` | После оплаты |
| GET | `/payment/cancel` | Отмена оплаты |
| GET/POST | `/payment/mock/{purchase}` | Mock оплата (только local) |
| POST | `/webhooks/stripe` | Stripe webhook (без CSRF) |
| GET | `/terms` | Условия использования |
| GET | `/privacy` | Политика конфиденциальности |
| GET | `/sitemap.xml` | Sitemap |
| — | `/admin/*` | Filament (guard: admin) |

---

## Платёжный поток

```
POST /payment/create
  → Purchase (pending, payment_id=null)
  → Stripe Checkout Session (payment_id=cs_xxx)
  → Redirect на Stripe

POST /webhooks/stripe
  → Signature verification
  → Cache-дедупликация по event_id (24ч)
  → ProcessStripeWebhook job

  checkout.session.completed  ← ОСНОВНОЙ EVENT
    → Purchase найден по cs_xxx → status=paid
    → AccessGrantService::grantAccess()
       → access_token (64 символа, unique)
       → Access (starts_at, expires_at)
       → User upsert (статистика)
       → ActivityLog: access_granted
       → SendAccessEmail job

  payment_intent.succeeded  → только Log::info()
  payment_intent.payment_failed → Log::warning()
```

---

## Критические технические заметки

- **Webhook event**: слушаем `checkout.session.completed`, не `payment_intent.succeeded`
- **CSRF исключение**: в `bootstrap/app.php` через `validateCsrfTokens(except:)`, не через middleware
- **Auth guard**: дефолтный guard = `admin`, User — пассивная сущность, не для авторизации
- **payment_id**: nullable (создаётся до получения cs_xxx от Stripe)
- **Идемпотентность**: двойная — cache по event_id + проверка existing Access в grantAccess()
- **Файлы**: private disk, FileController с whitelist полей, прямые URL недоступны
- **Referrer**: SetReferrerPolicy → `no-referrer` (токен не утекает при переходе на внешние ссылки)
- **XSS**: при выводе RichEditor через `{!! !!}` использовать htmlpurifier
- **Тестирование**: `.env.testing` в `.gitignore` (был инцидент с утечкой на GitHub)

---

## MVP: что осознанно НЕ входит

- Личный кабинет и регистрация
- Поиск по контенту внутри материалов
- Рейтинги, отзывы, комментарии
- Скидки, промокоды
- Маркетинговые email-рассылки
- Многоязычность интерфейса
- Мобильное приложение
- Подписки и пакеты услуг
- DRM и watermarking файлов
- Автоматические возвраты
- Staging окружение
- Redis (database driver достаточен)

---

## Текущий план

### Этап 1: Frontend — тестирование и доработка ← ТЕКУЩИЙ
- Проверка всех страниц и UI/UX
- Responsive дизайн
- Проверка функционала admin-панели

### Этап 2: Добавление услуг
- 5 новых услуг (контент + описания + SEO)
- Тестирование покупки и доступа для каждой

### Этап 3: Страница контактов
- Контактная форма с email-уведомлением

### Этап 4: Финальное тестирование
- Кросс-браузерная совместимость, mobile
- Lighthouse >= 90, WCAG 2.1
- SEO-аудит

### Этап 5: Production
- VPS + Nginx + HTTPS (Let's Encrypt)
- PostgreSQL + бэкапы (pg_dump → S3)
- Postmark/Mailgun + SPF/DKIM/DMARC
- Stripe production mode + webhook endpoint
- Systemd для queue worker + scheduler
- Sentry для ошибок
- Смена пароля администратора
