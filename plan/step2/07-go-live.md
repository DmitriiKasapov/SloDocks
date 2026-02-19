# 07 — Go Live (Фаза G)

## Цель
Переключить с staging на production: живой домен, Stripe Live, Brevo с аутентифицированным доменом, открытая индексация.

## Предусловие
Фазы A–F пройдены. QA-отчёт подписан.

---

## G1. Production-сервер

Варианты:
- Тот же VPS, отдельная директория `/var/www/slodocs-live`
- Новый VPS (рекомендуется для чистоты)

- [ ] VPS для production готов (или используется staging-сервер)
- [ ] Репозиторий задеплоен в production-директорию
- [ ] `.env` production создан (отдельно от staging)

## G2. Домен и SSL

- [ ] DNS A-запись `slodocs.si` → IP production-сервера
- [ ] DNS A-запись `www.slodocs.si` → тот же IP
- [ ] DNS propagation проверен (`dig slodocs.si`)
- [ ] Certbot: `certbot --nginx -d slodocs.si -d www.slodocs.si`
- [ ] SSL работает: `https://slodocs.si` открывается без предупреждений
- [ ] Редирект: `http://slodocs.si` → `https://slodocs.si` (301)
- [ ] Редирект: `www.slodocs.si` → `slodocs.si` (или наоборот — один канонический URL)
- [ ] `APP_URL=https://slodocs.si` в production `.env`

## G3. Nginx production

```nginx
server {
    listen 80;
    server_name slodocs.si www.slodocs.si;
    return 301 https://slodocs.si$request_uri;
}

server {
    listen 443 ssl;
    server_name slodocs.si;
    root /var/www/slodocs-live/public;
    index index.php;

    ssl_certificate /etc/letsencrypt/live/slodocs.si/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/slodocs.si/privkey.pem;

    # Без Basic Auth в production!

    location /webhooks/stripe {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header Referrer-Policy "no-referrer";
}
```

- [ ] Nginx конфиг применён (`nginx -t && systemctl reload nginx`)

## G4. .env production

Отличия от staging:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://slodocs.si

STRIPE_KEY=pk_live_...
STRIPE_SECRET=sk_live_...
STRIPE_WEBHOOK_SECRET=whsec_live_...
PAYMENT_MOCK=false

SESSION_SECURE_COOKIE=true
LOG_LEVEL=error
SENTRY_LARAVEL_DSN=https://...@sentry.io/...
```

- [ ] Live Stripe keys установлены
- [ ] `PAYMENT_MOCK=false` подтверждён
- [ ] `APP_DEBUG=false`
- [ ] Sentry DSN настроен

## G5. Stripe Live Mode

- [ ] Stripe Dashboard → переключить в **Live Mode**
- [ ] Скопировать Live keys → `.env` production
- [ ] Создать новый webhook endpoint: `https://slodocs.si/webhooks/stripe`
- [ ] Event: `checkout.session.completed`
- [ ] Скопировать Live webhook signing secret → `STRIPE_WEBHOOK_SECRET`
- [ ] `php artisan config:cache` на production-сервере

## G6. Email production

- [ ] Brevo домен `slodocs.si` аутентифицирован (SPF/DKIM — сделано в фазе D)
- [ ] `.env` production содержит Brevo SMTP credentials
- [ ] Тест: `php artisan tinker` → отправить письмо → проверить inbox

## G7. База данных production

- [ ] Production БД создана (отдельная от staging)
- [ ] `php artisan migrate --force`
- [ ] `php artisan db:seed --class=AdminUserSeeder`
- [ ] **Сразу сменить пароль администратора** через Filament UI

## G8. Кеши и оптимизация

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

- [ ] Все команды выполнены без ошибок

## G9. Открыть индексацию

- [ ] `public/robots.txt` обновлён:
```
User-agent: *
Allow: /
Disallow: /admin
Disallow: /payment
Disallow: /webhooks

Sitemap: https://slodocs.si/sitemap.xml
```
- [ ] Basic Auth убран (если использовался)
- [ ] `https://slodocs.si/sitemap.xml` — доступен публично

## G10. Проверка "всё живое"

- [ ] `https://slodocs.si` открывается
- [ ] `https://slodocs.si/services/{slug}` открывается
- [ ] `https://slodocs.si/admin` → экран логина (не пропускает без пароля)
- [ ] Логи чистые: `tail -f storage/logs/laravel.log`
- [ ] Queue worker запущен: `systemctl status slodocs-worker`
- [ ] Scheduler работает: проверить crontab

## G11. Первая реальная покупка

- [ ] Купить одну услугу с реальной картой (минимальная сумма)
- [ ] Stripe Live Dashboard → платёж появился
- [ ] Email с токеном получен
- [ ] Токен открывает платный контент
- [ ] В Filament → Purchases → запись со статусом `paid`

---

## ✅ Критерий завершения Фазы G (Go Live)

Реальная покупка прошла. Email получен в inbox. Платный контент открывается. Сайт индексируется.
