# Backend Review — Итоговый отчёт

Дата: 2026-01-30

---

## Статус: ГОТОВ К ФРОНТЕНДУ

После полной ревизии бэкенда все критические и средние проблемы исправлены. Оставшиеся замечания — низкий приоритет, допустимы для MVP.

---

## Выполненные исправления

### Критические (блокировали фронтенд)

| # | Проблема | Исправление | Файлы |
|---|----------|-------------|-------|
| 1 | **Payment ID mismatch** — webhook `payment_intent.succeeded` искал Purchase по `pi_xxx`, но хранился `cs_xxx` (session ID). Реальные платежи Stripe не выдавали доступ. | Перенёс логику выдачи доступа в `handleCheckoutCompleted()` (ищет по session ID). `handlePaymentSucceeded()` теперь только логирует. | `app/Jobs/ProcessStripeWebhook.php` |
| 2 | **CSRF для вебхука** — кастомный `VerifyCsrfToken` middleware мог не применяться в Laravel 12. | Настроил исключение в `bootstrap/app.php` через `validateCsrfTokens(except:)`. Удалил устаревший `VerifyCsrfToken.php`. | `bootstrap/app.php` |
| 3 | **Нет rate limiting** — `POST /payment/create` без ограничений. Спам Stripe Checkout Sessions. | Добавил `throttle:5,1` (5 запросов/мин). | `routes/web.php` |
| 4 | **Нет скачивания скрытых файлов** — PDF хранились на private диске, но не было маршрута для отдачи с проверкой доступа. | Создал `FileController` с whitelist полей, проверкой `has_access`, стримингом через `Storage::download()`. | `app/Http/Controllers/FileController.php`, `routes/web.php` |
| 5 | **activity_log() игнорирует FK** — `service_id` и `purchase_id` всегда `null`, данные дублировались в JSON metadata. | Расширил сигнатуру хелпера (`serviceId`, `purchaseId`). Обновил все 10 вызовов. Перевёл `PaymentService` на хелпер. | `app/helpers.php`, + 8 файлов |
| 6 | **payment_id NOT NULL** — колонка не nullable, но для реального Stripe Purchase создаётся до Checkout Session (payment_id ещё не известен). | Миграция `make_payment_id_nullable`. | `database/migrations/2026_01_30_000002_*` |

### Средние (исправлены)

| # | Проблема | Исправление | Файлы |
|---|----------|-------------|-------|
| 7 | **Нет очистки истёкших доступов** — `is_active` оставался `true` навсегда. | Команда `access:deactivate-expired` + `Schedule::daily()`. | `app/Console/Commands/DeactivateExpiredAccess.php`, `routes/console.php` |
| 8 | **Токен в Referrer** — `?token=xxx` утекал в заголовках при переходах на внешние ссылки. | Middleware `SetReferrerPolicy` → `Referrer-Policy: no-referrer` на все web-маршруты. | `app/Http/Middleware/SetReferrerPolicy.php`, `bootstrap/app.php` |
| 9 | **User как auth provider** — дефолтный guard `web` указывал на `App\Models\User` (без `Authenticatable`). | Дефолтный guard → `admin`. Provider `users` → `AdminUser`. | `config/auth.php` |

---

## Что НЕ изменено (и правильно)

- **Сервисный слой** — `PaymentService`, `AccessService`, `AccessGrantService` — чистое разделение
- **Value-объект `AccessResult`** — типизированные статусы без строковых сравнений
- **DB::transaction в AccessGrantService** — атомарность выдачи доступа
- **Идемпотентность** — cache-дедупликация в вебхуке + проверка existing Access в grantAccess
- **Mock mode guard** — `&& env('APP_ENV') !== 'production'` в config/stripe.php
- **Отдельный admin guard** — Filament изолирован от публичной части
- **Валидация email** — `email:rfc,dns` в CreatePaymentRequest
- **Генерация токенов** — 64 символа Str::random() с проверкой уникальности
- **Аудит** — activity_log по всем бизнес-событиям

---

## Отложено (после MVP)

| Пункт | Причина |
|-------|---------|
| XSS-санитизация RichEditor | Делать при создании Blade-шаблонов фронтенда. Использовать `htmlpurifier` при выводе `{!! !!}`. |
| Webhook retry/backoff | Stripe сам управляет повторами. Job имеет `$tries = 3`. |
| Защита от дублирования покупок | Повторная покупка одной услуги допустима по спеке. |
| GDPR удаление данных | Обрабатывать вручную. |
| Ограничение параллельных сессий | Вне скоупа MVP. |
| Политика хранения ActivityLog | Не критично при MVP-трафике. |
| Миграция файлов на S3 | Локальный диск достаточен. |
| `payment_intent.payment_failed` mismatch | Обработчик не найдёт Purchase по pi_xxx. Некритично: покупка остаётся в `pending`, пользователь может попробовать снова. Для полноценного решения — слушать `checkout.session.expired`. |

---

## Архитектура файлов (актуальная)

```
app/
├── Console/Commands/
│   └── DeactivateExpiredAccess.php      # Scheduled: ежедневная деактивация
├── Filament/
│   ├── Resources/
│   │   ├── ServiceResource.php          # CRUD услуг + контент + SEO + скрытый контент
│   │   ├── PurchaseResource.php         # Только чтение
│   │   └── AccessResource.php           # Чтение + resend email + деактивация
│   └── Widgets/
│       └── StatsOverview.php            # Дашборд: покупки, доступы, пользователи
├── Http/
│   ├── Controllers/
│   │   ├── ServiceController.php        # Публичная страница услуги
│   │   ├── PaymentController.php        # Создание платежа + mock + success/cancel
│   │   ├── WebhookController.php        # Stripe webhook с signature verification
│   │   └── FileController.php           # Скачивание скрытых PDF с проверкой доступа
│   ├── Middleware/
│   │   ├── CheckServiceAccess.php       # Проверка токена → request attributes
│   │   └── SetReferrerPolicy.php        # Referrer-Policy: no-referrer
│   └── Requests/
│       └── CreatePaymentRequest.php     # Валидация email + service_id
├── Jobs/
│   ├── ProcessStripeWebhook.php         # Обработка checkout.session.completed
│   └── SendAccessEmail.php             # Отправка email с токеном
├── Mail/
│   └── AccessGrantedMail.php           # Шаблон email
├── Models/
│   ├── Service.php                     # Услуга (публичный + скрытый контент)
│   ├── Purchase.php                    # Покупка (pending → paid/failed)
│   ├── Access.php                      # Доступ (токен + срок)
│   ├── User.php                        # Пассивная статистика
│   ├── AdminUser.php                   # Аутентификация Filament
│   └── ActivityLog.php                 # Аудит (service_id, purchase_id, metadata)
├── Services/
│   ├── PaymentService.php              # Stripe Checkout Session / Mock
│   ├── AccessService.php               # Проверка токена
│   ├── AccessGrantService.php          # Выдача доступа (транзакция + идемпотентность)
│   └── AccessResult.php                # Value object для результата проверки
└── helpers.php                         # activity_log() хелпер
```

---

## Маршруты (актуальные)

| Метод | URL | Контроллер | Middleware | Назначение |
|-------|-----|-----------|-----------|------------|
| GET | `/` | closure | web | Главная |
| GET | `/services/{slug}` | ServiceController@show | web, CheckServiceAccess | Страница услуги |
| GET | `/services/{slug}/file/{field}` | FileController@download | web, CheckServiceAccess | Скачивание PDF |
| POST | `/payment/create` | PaymentController@create | web, throttle:5,1 | Создание платежа |
| GET | `/payment/success` | PaymentController@success | web | Успешная оплата |
| GET | `/payment/cancel` | PaymentController@cancel | web | Отмена оплаты |
| GET | `/payment/mock/{purchase}` | PaymentController@mockCheckout | web | Mock checkout (dev) |
| POST | `/payment/mock/{purchase}/pay` | PaymentController@mockPay | web | Mock оплата (dev) |
| POST | `/webhooks/stripe` | WebhookController@handleStripe | без CSRF | Stripe webhook |
| GET | `/terms` | closure | web | Условия |
| GET | `/privacy` | closure | web | Политика |
| — | `/admin/*` | Filament | admin guard | Админ-панель |

---

## Платёжный поток (исправленный)

```
Пользователь → POST /payment/create (throttle:5,1)
    → PaymentService::createCheckoutSession()
    → Purchase (pending, payment_id = null)
    → Stripe Checkout Session → payment_id = cs_xxx
    → Redirect на Stripe

Stripe → POST /webhooks/stripe
    → Signature verification
    → Cache-дедупликация по event_id
    → ProcessStripeWebhook job

    checkout.session.completed (ОСНОВНОЙ)
        → Purchase::where('payment_id', session_id) ← cs_xxx совпадает
        → Purchase.status = paid
        → AccessGrantService::grantAccess()
        → SendAccessEmail job

    payment_intent.succeeded (ЛОГИРОВАНИЕ)
        → Log::info()

    payment_intent.payment_failed
        → Purchase не найдётся (pi_xxx ≠ cs_xxx)
        → Log::warning — допустимо для MVP
```

---

## Контрольный чеклист

- [x] Платежи: идемпотентность, signature verification, mock isolation
- [x] Доступ: токен 64 символа, проверка срока, деактивация по расписанию
- [x] Файлы: private disk, скачивание через FileController, whitelist полей
- [x] Админка: отдельный guard, отдельная модель, activity logging
- [x] CSRF: исключение для webhook в bootstrap/app.php
- [x] Rate limiting: throttle на создание платежа
- [x] Headers: Referrer-Policy: no-referrer
- [x] Auth: дефолтный guard = admin, provider = AdminUser
- [x] Логирование: activity_log с FK (service_id, purchase_id)
- [ ] XSS: санитизация RichEditor — при создании Blade-шаблонов

---

## Вывод

Бэкенд готов к разработке фронтенда. Все критические баги в платёжном потоке исправлены, файлы защищены, аудит работает с FK-связями, expired-доступы деактивируются автоматически. Единственный открытый пункт — XSS-санитизация при выводе rich text — решается на этапе вёрстки Blade-шаблонов.
