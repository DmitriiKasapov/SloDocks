# 02 — Staging Deploy (Фаза B)

## Цель
Поднять рабочий сервер на VPS, закрыть от публики, убедиться что сайт живой.

---

## B1. VPS и домен

- [ ] VPS создан (Hetzner CX22 или DigitalOcean Basic $6/мес — Ubuntu 22.04)
- [ ] SSH-ключ добавлен, вход по ключу работает
- [ ] Субдомен `staging.slodocs.si` (или техдомен) настроен → DNS A-запись на IP сервера
- [ ] DNS propagation проверен (`dig staging.slodocs.si` возвращает правильный IP)

## B2. Установка сервера

```bash
# Обновление
apt update && apt upgrade -y

# Nginx
apt install -y nginx

# PHP 8.2 + расширения
apt install -y php8.2-fpm php8.2-pgsql php8.2-mbstring php8.2-xml \
  php8.2-curl php8.2-zip php8.2-bcmath php8.2-intl

# Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Node.js 20
curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
apt install -y nodejs

# PostgreSQL
apt install -y postgresql postgresql-contrib
```

- [ ] PHP 8.2 установлен (`php -v`)
- [ ] Composer установлен (`composer -V`)
- [ ] Nginx запущен (`systemctl status nginx`)
- [ ] PostgreSQL запущен (`systemctl status postgresql`)

## B3. PostgreSQL на staging

```bash
sudo -u postgres psql
CREATE DATABASE slodocs_staging;
CREATE USER slodocs WITH PASSWORD 'strong_password';
GRANT ALL PRIVILEGES ON DATABASE slodocs_staging TO slodocs;
\q
```

- [ ] База `slodocs_staging` создана
- [ ] Пользователь создан, права выданы

## B4. Код на сервере

```bash
# Создать директорию
mkdir -p /var/www/slodocs
cd /var/www/slodocs

# Клонировать репозиторий
git clone git@github.com:user/slodocs.git .

# Зависимости
composer install --no-dev --optimize-autoloader
npm install && npm run build

# Права
chown -R www-data:www-data /var/www/slodocs
chmod -R 755 /var/www/slodocs/storage
chmod -R 755 /var/www/slodocs/bootstrap/cache
```

- [ ] Репозиторий склонирован
- [ ] `composer install --no-dev` выполнен
- [ ] `npm run build` выполнен (assets в `public/build/`)
- [ ] Права на `storage/` и `bootstrap/cache/` выставлены

## B5. .env на staging

```bash
cp .env.example .env
php artisan key:generate
```

Заполнить:
- [ ] `APP_ENV=staging`
- [ ] `APP_DEBUG=false`
- [ ] `APP_URL=https://staging.slodocs.si`
- [ ] `DB_*` — данные PostgreSQL staging
- [ ] `MAIL_MAILER=log` (пока, до настройки Brevo в фазе D)
- [ ] `PAYMENT_MOCK=false`
- [ ] `STRIPE_*` — test keys (фаза C)
- [ ] `SESSION_SECURE_COOKIE=true`
- [ ] `QUEUE_CONNECTION=database`

## B6. Миграции и seed

```bash
php artisan migrate --force
php artisan db:seed --class=AdminUserSeeder
```

- [ ] Миграции прошли без ошибок
- [ ] Таблицы созданы (проверить `psql` → `\dt`)
- [ ] Администратор создан

## B7. Nginx конфигурация

```nginx
server {
    listen 80;
    server_name staging.slodocs.si;
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl;
    server_name staging.slodocs.si;
    root /var/www/slodocs/public;
    index index.php;

    ssl_certificate /etc/letsencrypt/live/staging.slodocs.si/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/staging.slodocs.si/privkey.pem;

    # Basic Auth — закрыть staging от публики
    auth_basic "Staging";
    auth_basic_user_file /etc/nginx/.htpasswd;

    # Stripe webhook — без Basic Auth
    location /webhooks/stripe {
        auth_basic off;
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
}
```

```bash
# SSL
apt install -y certbot python3-certbot-nginx
certbot --nginx -d staging.slodocs.si

# Basic Auth пароль
apt install -y apache2-utils
htpasswd -c /etc/nginx/.htpasswd admin

# Применить конфиг
nginx -t && systemctl reload nginx
```

- [ ] SSL сертификат получен (Let's Encrypt)
- [ ] Basic Auth настроен (логин/пароль для команды)
- [ ] `/webhooks/stripe` исключён из Basic Auth
- [ ] Nginx конфиг прошёл `nginx -t`

## B8. Кеширование

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

- [ ] Команды выполнены без ошибок
- [ ] `php artisan route:list` показывает `/webhooks/stripe`

## B9. Queue Worker (systemd)

```ini
# /etc/systemd/system/slodocs-worker.service
[Unit]
Description=SloDocs Queue Worker
After=network.target

[Service]
User=www-data
WorkingDirectory=/var/www/slodocs
ExecStart=/usr/bin/php artisan queue:work --sleep=3 --tries=3 --timeout=60
Restart=always
RestartSec=5

[Install]
WantedBy=multi-user.target
```

```bash
systemctl enable slodocs-worker
systemctl start slodocs-worker
systemctl status slodocs-worker
```

- [ ] Воркер запущен и активен

## B10. Scheduler (cron)

```bash
crontab -e
# Добавить:
* * * * * cd /var/www/slodocs && php artisan schedule:run >> /dev/null 2>&1
```

- [ ] Cron добавлен

## B11. Проверка "сайт живой"

- [ ] `https://staging.slodocs.si` открывается (после Basic Auth)
- [ ] Главная страница загружается
- [ ] `/services/{slug}` открывается
- [ ] `/admin` → экран логина Filament
- [ ] Логи чистые: `tail -f storage/logs/laravel.log`
- [ ] `robots.txt` содержит `Disallow: /` (staging закрыт от индексации)

---

## ✅ Критерий завершения Фазы B

Сайт открывается на staging URL, Basic Auth защищает, логи без ошибок, воркер работает.
