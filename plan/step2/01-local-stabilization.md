# 01 — Локальная стабилизация (Фаза A)

## Цель
Убедиться, что локальная среда работает как production-подобная. Mock flow проходит чисто.

---

## A1. Git и конфигурация

- [x] Ветка `develop` актуальна, нет незакоммиченных критичных изменений
- [x] `.env.example` актуален (все переменные присутствуют, без значений секретов)
- [x] `.gitignore` содержит: `.env`, `.env.testing`, `node_modules/` — Laravel-стандарт, `storage/` исключается через вложенные .gitignore
- [x] `PAYMENT_MOCK=true` только в `.env` (не в коде жёстко)

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

- [x] Пользователь вводит email → создаётся Purchase (status: pending) — покрыто тестами
- [x] Редирект на `/payment/mock/{purchase}` → страница mock checkout — покрыто тестами
- [x] Клик «Оплатить» → Purchase status = paid, Access создаётся — покрыто тестами
- [x] Повторный клик «Оплатить» на том же Purchase → **дублей Access нет** (идемпотентность)
- [x] Access содержит валидный `access_token` (64 символа) — проверено в AccessGrantService
- [ ] Страница `/services/{slug}?token=xxx` открывает платный контент — **ручная проверка в браузере**
- [ ] Та же страница без токена или с неверным токеном → публичная версия — **ручная проверка**

## A4. Логика доступа

- [ ] Токен c истекшим `expires_at` → сообщение «Срок доступа истёк», контент скрыт — **ручная проверка**
- [ ] `is_active=false` → доступ закрыт — **ручная проверка**
- [x] Прямой URL файла без токена → 403/404 (FileController блокирует) — исправлено: CheckServiceAccess теперь проверяет cookie, downloads/examples используют роут services.file
- [x] Логи не содержат токены в plaintext

## A5. Email (локально)

- [x] `MAIL_MAILER=log` — письмо пишется в `storage/logs/laravel.log`
- [x] В логе есть корректный subject, email получателя, ссылка с токеном
- [x] `APP_URL` в ссылке соответствует `.env`
- [x] БАГ ИСПРАВЛЕН: emails/access-granted.blade.php использовал route('terms') вместо route('legal.terms')

## A6. Artisan команды

- [ ] `php artisan migrate:fresh --seed` — проходит без ошибок
- [ ] `php artisan config:cache` — не ломает роуты и mock payment
- [ ] `php artisan route:cache` — webhook `/webhooks/stripe` присутствует в списке
- [ ] `php artisan config:clear && php artisan cache:clear` — после теста чистим кеш
- [x] `php artisan test` — 45/45 тестов зелёные (тесты обновлены под текущую архитектуру без email в форме покупки)

## A7. Queue

- [x] `php artisan queue:work --once` — job обрабатывается
- [x] После оплаты job `SendAccessEmail` выполняется, письмо пишется в лог
- [x] Upавший job попадает в `failed_jobs` — проверено (падал из-за route('terms'), исправлено)

---

## ✅ Критерий завершения Фазы A

Все чекбоксы выше отмечены. Mock-оплата от начала до получения ссылки в логе проходит за один прогон без ручных правок.
