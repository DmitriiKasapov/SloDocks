# 08 — Ops и обслуживание

## Правило №1
Ни одного ручного изменения PHP/Blade-файлов на сервере. Только: локально → git → deploy.

---

## O1. Deploy checklist (каждый деплой)

```bash
# На сервере
cd /var/www/slodocs-live

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

- После каждого деплоя проверить: главная открывается, логи чистые

## O2. Изменение контента

Всё через Filament-админку на production:
- Редактировать тексты шагов
- Обновлять FAQ
- Заменять PDF-файлы
- Включать/отключать услуги

Замена файла не влияет на уже выданные доступы (пользователь увидит новый файл).

## O3. Бэкапы

### База данных
```bash
# Скрипт /usr/local/bin/backup-slodocs.sh
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M)
pg_dump -U slodocs slodocs_production > /backups/db_$DATE.sql
gzip /backups/db_$DATE.sql
# Удалить бэкапы старше 14 дней
find /backups -name "*.sql.gz" -mtime +14 -delete
```

```bash
# Cron (ежедневно в 3:00)
0 3 * * * /usr/local/bin/backup-slodocs.sh
```

- [ ] Скрипт создан
- [ ] Cron добавлен
- [ ] Первый бэкап проверен вручную (`ls /backups/`)
- [ ] Восстановление проверено хотя бы раз: `psql slodocs_test < backup.sql`

### Storage (файлы услуг)
```bash
# Синхронизировать storage/app на удалённый диск
rsync -az /var/www/slodocs-live/storage/app /backups/storage/
```

- [ ] Бэкап storage настроен (если есть PDF-файлы)

## O4. Мониторинг

### Sentry
- [ ] `SENTRY_LARAVEL_DSN` в `.env` production
- [ ] Sentry получает ошибки (проверить: намеренно вызвать исключение в tinker)

### Failed jobs
```bash
# Проверять еженедельно
php artisan queue:failed

# Повторить упавший job
php artisan queue:retry {id}

# Очистить старые
php artisan queue:flush
```

- [ ] Алерт на failed jobs настроен (email уведомление через Sentry или cron-скрипт)

### Queue worker
```bash
# Если worker упал
systemctl status slodocs-worker
systemctl restart slodocs-worker
```

### SSL авторенеувление
```bash
# Certbot обновляет автоматически, проверить:
certbot renew --dry-run
```

## O5. Действия при инцидентах

### Письмо не доходит
1. Проверить `failed_jobs` — job упал?
2. Проверить Brevo dashboard — ошибка доставки?
3. Ручная повторная отправка: Filament → Accesses → «Отправить email»

### Доступ не выдан после оплаты
1. Stripe Dashboard → Events → найти `checkout.session.completed` → статус доставки
2. Если не delivered — Resend вручную через Stripe Dashboard
3. Проверить `purchases` таблицу — статус покупки
4. Если нужно — вручную через tinker: `app(AccessGrantService::class)->grantAccess($purchase)`

### Сайт упал
1. `systemctl status nginx` — nginx жив?
2. `systemctl status php8.2-fpm` — PHP-FPM жив?
3. `tail -f /var/log/nginx/error.log` — ошибки Nginx
4. `tail -f storage/logs/laravel.log` — ошибки Laravel

## O6. SSL обновление (раз в 90 дней)

Certbot обновляет автоматически. Проверить раз в месяц:
```bash
certbot certificates
```

---

## O7. Checklist ежемесячного обслуживания

- [ ] Проверить `queue:failed` — нет критичных упавших jobs
- [ ] Проверить бэкапы — файлы созданы за последние 7 дней
- [ ] Проверить SSL — до истечения > 30 дней
- [ ] Проверить Sentry — нет нераскрытых ошибок
- [ ] Проверить Stripe Dashboard — нет failed webhooks
- [ ] Проверить Brevo — нет проблем с доставкой
