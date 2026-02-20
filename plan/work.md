# work.md — Текущие задачи

_Обновлено: 2026-02-20. Статус: Фаза A завершена ✅. Следующий шаг — Railway deploy._

Легенда: `[ ]` — не сделано · `[x]` — готово · `[~]` — в процессе

---

## БЛОК 2 — Railway Staging (технический запуск)

**Цель:** сайт живой на Railway URL, Stripe Test работает, письма доходят.
**Домен не нужен.** Всё на `*.up.railway.app`.

### B-0. Подготовка кода ✅ (Claude)
- [x] `nixpacks.toml` — сборка без кэша конфига в build-фазе
- [x] `Procfile` — только worker (web Railway определяет сам)
- [x] `robots.txt` — динамический (staging = закрыт, production = открыт)
- [x] Маршрут `/test` закрыт в production
- [x] Исправлены 4 бага по итогам инспекции
- [ ] Закоммитить и запушить на GitHub → `develop` ветку

### B-1. Создать Railway-проект (Пользователь)
- [ ] Зайти: railway.app → Login with GitHub
- [ ] New Project → Deploy from GitHub repo → выбрать SloDoks
- [ ] Подождать первый деплой (может упасть — нормально, идём дальше)

### B-2. Добавить PostgreSQL (Пользователь)
- [ ] В проекте: кнопка `+` → Database → Add PostgreSQL
- [ ] Открыть созданную БД → вкладка Variables → скопировать значения:
  `PGHOST`, `PGPORT`, `PGDATABASE`, `PGUSER`, `PGPASSWORD`

### B-3. Переменные окружения Web Service (Пользователь)
- [ ] Web Service → Variables → добавить все переменные из списка ниже
- [ ] После добавления Railway автоматически передеплоит

```
APP_NAME=SloDocs
APP_ENV=staging
APP_DEBUG=false
APP_URL=https://ТВОЙ-URL.up.railway.app   ← взять из Railway после первого деплоя

APP_KEY=base64:...   ← запустить локально: php artisan key:generate --show

DB_CONNECTION=pgsql
DB_HOST=           ← PGHOST из шага B-2
DB_PORT=           ← PGPORT
DB_DATABASE=       ← PGDATABASE
DB_USERNAME=       ← PGUSER
DB_PASSWORD=       ← PGPASSWORD

MAIL_MAILER=log
QUEUE_CONNECTION=database
SESSION_SECURE_COOKIE=true
CACHE_STORE=database

PAYMENT_MOCK=false
STRIPE_KEY=pk_test_placeholder
STRIPE_SECRET=sk_test_placeholder
STRIPE_WEBHOOK_SECRET=whsec_placeholder
STRIPE_CURRENCY=EUR

LOG_LEVEL=error
```

### B-4. Миграции и первый admin (Пользователь)
- [ ] Web Service → верхнее меню → кнопка `...` → Open Shell (или Connect)
- [ ] Выполнить:
  ```
  php artisan migrate --force
  php artisan db:seed --class=AdminUserSeeder
  ```
- [ ] Проверить: `/admin` открывается, можно войти

### B-5. Worker Service (Пользователь)
- [ ] В проекте: `+` → GitHub repo → тот же репозиторий SloDoks
- [ ] Settings → Start Command: `php artisan queue:work --sleep=3 --tries=3 --timeout=60`
- [ ] Variables → скопировать все переменные из Web Service
- [ ] Убедиться что Worker статус: Running (не Crashed)

### B-6. Проверка "сайт живой" (Пользователь)
- [ ] `https://ТВОЙ-URL.up.railway.app` — главная открывается
- [ ] `/admin` — Filament, вход работает
- [ ] Worker — Running в Railway dashboard
- [ ] Логи Web Service — нет красных ошибок

---

## БЛОК 3 — Stripe Test Mode (на Railway URL)

**Цель:** полный цикл тестовой оплаты работает. Реального домена нет.

### C-1. Stripe Dashboard (Пользователь)
- [ ] Зайти: dashboard.stripe.com → убедиться что режим Test (переключатель вверху)
- [ ] Developers → Webhooks → Add endpoint
  - URL: `https://ТВОЙ-URL.up.railway.app/webhooks/stripe`
  - Events: `checkout.session.completed`, `payment_intent.payment_failed`
- [ ] Скопировать `Signing secret` (whsec_...)

### C-2. Обновить переменные Railway (Пользователь)
- [ ] Web Service → Variables:
  ```
  STRIPE_KEY=pk_test_...        ← реальный test key
  STRIPE_SECRET=sk_test_...     ← реальный test key
  STRIPE_WEBHOOK_SECRET=whsec_  ← из шага C-1
  ```
- [ ] Worker Service → те же три переменные обновить

### C-3. Контент для теста (Пользователь)
- [ ] В Filament создать 1 тестовую услугу (или запустить сидер: `php artisan db:seed`)
- [ ] Убедиться что услуга `is_active = true`

### C-4. Тестовая оплата (Пользователь)
- [ ] Открыть страницу услуги → нажать "Купить"
- [ ] Карта: `4242 4242 4242 4242`, срок: любой будущий, CVC: любые 3 цифры
- [ ] Email: любой реальный (придёт письмо в лог)

### C-5. Проверить результат (Пользователь)
- [ ] Stripe Dashboard → Events — видно `checkout.session.completed`
- [ ] Railway → Web Service → Logs — нет ошибок
- [ ] Railway → Worker → Logs — job обработан
- [ ] В Filament → Accesses — запись появилась с токеном
- [ ] Email: Railway → Worker → Logs — письмо записано в лог (MAIL_MAILER=log)

### C-6. Проверить доступ по токену (Пользователь)
- [ ] Из лога скопировать ссылку с токеном
- [ ] Открыть в браузере — контент доступен
- [ ] Открыть без токена — контент закрыт

---

## БЛОК 4 — Email Brevo (на Railway URL)

**Цель:** письма доходят в реальный inbox, не в спам.

### D-1. Настройка Brevo (Пользователь)
- [ ] Зарегистрироваться: brevo.com
- [ ] Settings → Senders & Domains → добавить домен `slodocs.si`
- [ ] Прописать DNS-записи: SPF, DKIM, DMARC (Brevo покажет что именно)
- [ ] Подождать подтверждения (обычно 15-30 минут)

### D-2. SMTP credentials (Пользователь)
- [ ] Brevo → SMTP & API → SMTP tab → скопировать:
  `Host`, `Port`, `Login`, `Password`

### D-3. Обновить переменные Railway (Пользователь)
- [ ] Web Service + Worker → Variables:
  ```
  MAIL_MAILER=smtp
  MAIL_HOST=smtp-relay.brevo.com
  MAIL_PORT=587
  MAIL_USERNAME=...   ← из Brevo
  MAIL_PASSWORD=...   ← из Brevo
  MAIL_FROM_ADDRESS=noreply@slodocs.si
  MAIL_FROM_NAME=SloDocs
  MAIL_ENCRYPTION=tls
  ```

### D-4. Проверка (Пользователь)
- [ ] Повторить тестовую оплату (блок C-4)
- [ ] Письмо пришло в Gmail — не в спам
- [ ] Письмо пришло в Outlook — не в спам
- [ ] Ссылка в письме открывает контент

---

## БЛОК 5 — Бесплатный режим + домен (Claude + Пользователь)

**Цель:** запустить `slodocs.si` с бесплатным доступом для сбора аудитории.
**Оплата выключена.** Кнопка "Купить" → "Получить бесплатный доступ".

### E-1. Функция "бесплатный доступ" (Claude)
- [ ] Новый маршрут: POST `/services/{slug}/free-access`
- [ ] Форма: поле email
- [ ] Логика: создаёт `Access` напрямую (без Purchase/Stripe)
- [ ] Отправляет письмо с токеном через обычный SendAccessEmail
- [ ] Кнопка на странице услуги переключается через конфиг `APP_FREE_ACCESS=true`

### E-2. Контент (Пользователь + Claude)
- [ ] Запустить сидер: `php artisan db:seed` (статья про школу)
- [ ] Добавить 2-ю и 3-ю услугу через Filament (черновики готовы)

### E-3. Подключить домен (Пользователь)
- [ ] Railway → Web Service → Settings → Custom Domain → добавить `slodocs.si`
- [ ] В DNS-панели домена: CNAME-запись → Railway URL
- [ ] Railway выдаёт SSL автоматически
- [ ] Обновить `APP_URL=https://slodocs.si` в Variables

### E-4. Перейти на Hobby (Пользователь)
- [ ] Railway → Settings → Plan → Hobby ($5/мес)
- [ ] Sleep отключается, сайт всегда доступен
- [ ] Stripe webhook больше не зависит от sleep

### E-5. Проверка перед запуском (Пользователь)
- [ ] Форма "бесплатный доступ" работает
- [ ] Письмо с токеном приходит
- [ ] Контент открывается по ссылке из письма
- [ ] Google Analytics / счётчик подключён (опционально)

---

## БЛОК 6 — Переход на платный режим (позже, когда будет SP)

**Цель:** включить реальную оплату через Stripe Live.

### F-1. Stripe Live (Пользователь)
- [ ] Активировать Stripe-аккаунт (заполнить данные SP)
- [ ] Stripe Dashboard → переключить на Live mode
- [ ] Добавить webhook endpoint: `https://slodocs.si/webhooks/stripe`
- [ ] Обновить в Railway Variables:
  ```
  STRIPE_KEY=pk_live_...
  STRIPE_SECRET=sk_live_...
  STRIPE_WEBHOOK_SECRET=whsec_live_...
  APP_FREE_ACCESS=false
  ```
- [ ] Кнопка возвращается к "Купить"

---

_Текущий шаг: закоммитить изменения → начать БЛОК 2 (Railway)_
