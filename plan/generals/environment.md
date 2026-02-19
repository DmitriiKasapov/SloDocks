# Environment — SloDocs

## Окружения
- `local` — локальная разработка
- `staging` — закрытый тест-сервер (Basic Auth, noindex)
- `production` — рабочее окружение

## Environment Matrix

| Переменная | local | staging | production |
|-----------|-------|---------|------------|
| APP_ENV | local | staging | production |
| APP_DEBUG | true | false | false |
| APP_URL | http://localhost:8000 | https://staging.slodocs.si | https://slodocs.si |
| DB_CONNECTION | pgsql | pgsql | pgsql |
| MAIL_MAILER | log | smtp | smtp |
| MAIL_HOST | — | smtp-relay.brevo.com | smtp-relay.brevo.com |
| MAIL_PORT | — | 587 | 587 |
| STRIPE_KEY | pk_test_... | pk_test_... | pk_live_... |
| STRIPE_SECRET | sk_test_... | sk_test_... | sk_live_... |
| STRIPE_WEBHOOK_SECRET | whsec_test_... | whsec_test_... | whsec_live_... |
| PAYMENT_MOCK | true | false | false |
| SESSION_SECURE_COOKIE | false | true | true |
| QUEUE_CONNECTION | database | database | database |
| CACHE_STORE | database | database | database |
| LOG_LEVEL | debug | error | error |
| SENTRY_LARAVEL_DSN | — | — | dsn_... |

## Ключевые правила
- `PAYMENT_MOCK=true` только в local, никогда в staging/production
- `APP_DEBUG=false` на staging и production
- Stripe test keys на local и staging, live keys только в production
- Два отдельных webhook endpoint в Stripe: один для staging, один для production
- `.env`, `.env.testing` в `.gitignore` — не коммитятся

## Email по окружениям
- **local**: `MAIL_MAILER=log` (письма в laravel.log) или Mailtrap
- **staging**: Brevo SMTP, домен аутентифицирован (SPF/DKIM)
- **production**: Brево SMTP, те же credentials

## Переменные (полный список)

### Приложение
- APP_ENV, APP_URL, APP_DEBUG, APP_KEY

### База данных
- DB_CONNECTION=pgsql
- DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

### Stripe
- STRIPE_KEY, STRIPE_SECRET, STRIPE_WEBHOOK_SECRET
- STRIPE_CURRENCY=eur
- PAYMENT_MOCK=false

### Email (Brevo)
- MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_ENCRYPTION=tls
- MAIL_USERNAME, MAIL_PASSWORD
- MAIL_FROM_ADDRESS, MAIL_FROM_NAME

### Сессии и кеш
- SESSION_DRIVER=database
- SESSION_SECURE_COOKIE=true (staging, production)
- CACHE_STORE=database

### Хранилище
- FILESYSTEM_DISK=local (файлы вне public/, через FileController)

### Логирование
- LOG_CHANNEL, LOG_LEVEL
- SENTRY_LARAVEL_DSN (production)
- SENTRY_TRACES_SAMPLE_RATE=0.2

### Доступ к контенту
- ACCESS_TOKEN_LENGTH=64 (длина токена, генерируется в AccessGrantService)
