# 01 — Локальная стабилизация (Фаза A)

## Цель
Убедиться, что локальная среда работает как production-подобная. Mock flow проходит чисто.

---

## A1. Git и конфигурация

- [ ] Ветка `develop` актуальна, нет незакоммиченных критичных изменений
- [ ] `.env.example` актуален (все переменные присутствуют, без значений секретов)
- [ ] `.gitignore` содержит: `.env`, `.env.testing`, `storage/`, `node_modules/`
- [ ] `PAYMENT_MOCK=true` только в `.env` (не в коде жёстко)

## A2. Environment Matrix

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

## A3. Mock payment flow

- [ ] Пользователь вводит email → создаётся Purchase (status: pending)
- [ ] Редирект на `/payment/mock/{purchase}` → страница mock checkout
- [ ] Клик «Оплатить» → Purchase status = paid, Access создаётся
- [ ] Повторный клик «Оплатить» на том же Purchase → **дублей Access нет** (идемпотентность)
- [ ] Access содержит валидный `access_token` (64 символа)
- [ ] Страница `/services/{slug}?token=xxx` открывает платный контент
- [ ] Та же страница без токена или с неверным токеном → публичная версия

## A4. Логика доступа

- [ ] Токен c истекшим `expires_at` → сообщение «Срок доступа истёк», контент скрыт
- [ ] `is_active=false` → доступ закрыт
- [ ] Прямой URL файла без токена → 403/404 (FileController блокирует)
- [ ] Логи не содержат токены в plaintext

## A5. Email (локально)

- [ ] `MAIL_MAILER=log` — письмо пишется в `storage/logs/laravel.log`
- [ ] В логе есть корректный subject, email получателя, ссылка с токеном
- [ ] `APP_URL` в ссылке соответствует `.env` (не `localhost` если стоит другое)
- [ ] Альтернатива: Mailtrap (`MAIL_MAILER=smtp`, хост Mailtrap) — письмо видно в Mailtrap inbox

## A6. Artisan команды

- [ ] `php artisan migrate:fresh --seed` — проходит без ошибок
- [ ] `php artisan config:cache` — не ломает роуты и mock payment
- [ ] `php artisan route:cache` — webhook `/webhooks/stripe` присутствует в списке
- [ ] `php artisan config:clear && php artisan cache:clear` — после теста чистим кеш
- [ ] `php artisan test` — все 49 тестов зелёные

## A7. Queue

- [ ] `php artisan queue:listen` запущен в отдельном терминале
- [ ] После mock-оплаты job `SendAccessEmail` выполняется (виден в `jobs` → исчезает после обработки)
- [ ] Упавший job попадает в `failed_jobs` (проверить через `php artisan queue:failed`)

---

## ✅ Критерий завершения Фазы A

Все чекбоксы выше отмечены. Mock-оплата от начала до получения ссылки в логе проходит за один прогон без ручных правок.
