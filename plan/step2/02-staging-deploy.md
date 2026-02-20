# 02 — Staging Deploy (Фаза B) — Railway

## Цель
Развернуть рабочий staging на Railway без ручной настройки серверов.
Сайт доступен по HTTPS, база работает, очередь крутится, логи чистые.

---

## Обзор архитектуры

```
Railway Project: slodocs
├── Web Service       (Laravel — PHP 8.2)
├── Worker Service    (queue:work — тот же код, другая команда)
└── PostgreSQL        (managed DB от Railway)
```

Все три сервиса в одном Railway-проекте. Общаются через внутренние переменные.

---

## B1. Подготовка репозитория

### Нужные файлы (Claude создаёт)

- [x] `nixpacks.toml` — инструкции сборки для Railway
- [x] `Procfile` — команды запуска web и worker
- [ ] `robots.txt` — `Disallow: /` (закрыть staging от индексации)

### nixpacks.toml
```toml
[phases.setup]
nixPkgs = ["php82", "php82Extensions.pgsql", "php82Extensions.mbstring",
           "php82Extensions.xml", "php82Extensions.curl", "php82Extensions.zip",
           "php82Extensions.bcmath", "php82Extensions.intl", "composer", "nodejs_20"]

[phases.build]
cmds = [
    "composer install --no-dev --optimize-autoloader",
    "npm install && npm run build",
    "php artisan config:cache",
    "php artisan route:cache",
    "php artisan view:cache"
]

[start]
cmd = "php artisan serve --host=0.0.0.0 --port=$PORT"
```

### Procfile
```
web: php artisan serve --host=0.0.0.0 --port=$PORT
worker: php artisan queue:work --sleep=3 --tries=3 --timeout=60
```

---

## B2. Создание Railway-проекта

- [ ] Зарегистрироваться / войти на railway.app
- [ ] New Project → Deploy from GitHub repo → выбрать репозиторий SloDocs
- [ ] Railway автоматически определяет PHP-проект

---

## B3. PostgreSQL

- [ ] В Railway-проекте: Add Service → Database → PostgreSQL
- [ ] После создания: в настройках БД скопировать `DATABASE_URL`
- [ ] Добавить переменную в Web Service:
  ```
  DATABASE_URL = (скопированный url)
  ```
  Laravel читает `DATABASE_URL` автоматически через `config/database.php`

---

## B4. Переменные окружения (Web Service)

В Railway → Web Service → Variables добавить:

```env
APP_NAME=SloDocs
APP_ENV=staging
APP_DEBUG=false
APP_URL=https://<generated>.railway.app    # после первого деплоя

APP_KEY=                                    # сгенерировать: php artisan key:generate --show

DB_CONNECTION=pgsql
# DB_* не нужны — Railway подставляет DATABASE_URL автоматически

MAIL_MAILER=log                             # пока; Brevo в фазе D
QUEUE_CONNECTION=database
SESSION_SECURE_COOKIE=true
CACHE_STORE=database

PAYMENT_MOCK=false
STRIPE_KEY=pk_test_...                      # фаза C
STRIPE_SECRET=sk_test_...                   # фаза C
STRIPE_WEBHOOK_SECRET=whsec_...             # фаза C
STRIPE_CURRENCY=EUR

LOG_LEVEL=error
```

- [ ] `APP_KEY` добавлен (сгенерировать командой выше)
- [ ] `DATABASE_URL` добавлен
- [ ] Все обязательные переменные заполнены

---

## B5. Worker Service

- [ ] В Railway-проекте: Add Service → GitHub repo (тот же репозиторий)
- [ ] В настройках сервиса: Start Command → `php artisan queue:work --sleep=3 --tries=3 --timeout=60`
- [ ] Скопировать все переменные из Web Service в Worker Service
  (Railway позволяет "Share variables" между сервисами)
- [ ] Убедиться что Worker видит тот же `DATABASE_URL`

---

## B6. Миграции

Railway не запускает миграции автоматически. Два варианта:

**Вариант A — через Railway Shell (рекомендую)**
- Web Service → Settings → Open Shell
- Ввести: `php artisan migrate --force`

**Вариант B — добавить в nixpacks.toml в build-фазу**
```toml
[phases.release]
cmds = ["php artisan migrate --force"]
```

- [ ] `php artisan migrate --force` выполнена без ошибок
- [ ] `php artisan db:seed --class=AdminUserSeeder` выполнена
- [ ] Администратор создан (проверить вход в /admin)

---

## B7. Домен и HTTPS

Railway даёт домен автоматически: `<name>.up.railway.app`

Для staging это достаточно — HTTPS уже есть.

Кастомный домен (`staging.slodocs.si`) опционально:
- [ ] Railway → Web Service → Settings → Custom Domain
- [ ] Добавить CNAME-запись в DNS-панели домена
- [ ] Railway выпустит SSL автоматически

---

## B8. Проверка "сайт живой"

- [ ] `https://<name>.up.railway.app` открывается
- [ ] Главная страница загружается, услуги видны
- [ ] `/services/{slug}` открывается
- [ ] `/admin` → экран логина Filament
- [ ] Worker Service в Railway — статус Running (не Crashed)
- [ ] Логи Web Service чистые (Railway → Logs)

---

## B9. Защита staging от индексации

`public/robots.txt`:
```
User-agent: *
Disallow: /
```

- [ ] `robots.txt` создан и задеплоен

---

## ✅ Критерий завершения Фазы B

Сайт открывается на Railway URL, `/admin` работает, Worker — Running,
логи без критических ошибок. Готово к Фазе C (Stripe Test Mode).

---

## Что НЕ нужно делать (в отличие от VPS)

- Устанавливать PHP, Nginx, PostgreSQL — Railway делает сам
- Настраивать SSL — Railway делает сам
- Писать systemd для воркера — Railway держит процессы сам
- Заходить по SSH — не нужно (есть Shell в UI)
- Настраивать cron — scheduler через Railway Cron Service если понадобится
