# Deployment Notes — SloDocs

## Окружения
- local → staging → production
- Staging закрыт Basic Auth + robots noindex
- Production открыт, индексируется

## Конфигурация
- Все секреты через .env (не коммитятся)
- .env.testing в .gitignore
- Разные ключи для каждого окружения
- Два отдельных Stripe webhook endpoint: staging и production

## Деплой (ручной)

```bash
git pull origin main
composer install --no-dev --optimize-autoloader
npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan queue:restart
systemctl reload nginx
```

Правило: никаких ручных правок файлов на сервере. Только git → deploy.

## Хостинг
- VPS: Hetzner или DigitalOcean (Ubuntu 22.04)
- Nginx + PHP 8.2-FPM
- SSL: Let's Encrypt (Certbot, авторенеувление)
- Редиректы: http → https, www → non-www (один канонический URL)

## Queue Worker
- Systemd service, `queue:work --sleep=3 --tries=3 --timeout=60`
- `Restart=always` — поднимается автоматически при падении
- Failed jobs: таблица `failed_jobs` (driver database)

## Scheduler
- Cron: `* * * * * php artisan schedule:run`
- Команда: `access:expire` — ежедневная деактивация истекших доступов

## Email (Brevo)
- SMTP: smtp-relay.brevo.com, порт 587, TLS
- From: support@slodocs.si
- Домен аутентифицирован: SPF + DKIM + DMARC обязательны
- Используется для: ссылок доступа, уведомлений об оплате
- Локально: log driver или Mailtrap (не Brevo)

## База данных
- PostgreSQL
- Бэкапы: pg_dump + cron (ежедневно в 3:00)
- Хранение бэкапов: локальная папка /backups + опционально S3
- Удаление старых бэкапов: старше 14 дней

## Мониторинг
- Sentry: SENTRY_LARAVEL_DSN в production .env
- Failed jobs: проверять через `php artisan queue:failed`
- SSL: `certbot certificates` — проверять раз в месяц

## Staging — особенности
- Basic Auth на весь сайт (кроме /webhooks/stripe)
- robots.txt: `Disallow: /`
- Stripe Test keys (не live)
- Отдельная БД (slodocs_staging)
- После прохождения QA — переходим к production
