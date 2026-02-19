# 03 — Stripe Test Mode (Фаза C)

## Цель
Подтвердить полный платёжный цикл на staging: checkout → webhook → Access → email.

---

## C1. Настройка Stripe Dashboard (Test Mode)

- [ ] Войти в Stripe → переключить в **Test Mode**
- [ ] Скопировать `Publishable key` (pk_test_...) → `STRIPE_KEY` в `.env` staging
- [ ] Скопировать `Secret key` (sk_test_...) → `STRIPE_SECRET` в `.env` staging

### Webhook endpoint

- [ ] Stripe Dashboard → Developers → Webhooks → **Add endpoint**
- [ ] URL: `https://staging.slodocs.si/webhooks/stripe`
- [ ] Events to send: **`checkout.session.completed`** (только это событие!)
- [ ] После создания — скопировать **Signing secret** (whsec_...) → `STRIPE_WEBHOOK_SECRET`
- [ ] `PAYMENT_MOCK=false` в `.env` staging
- [ ] Применить: `php artisan config:cache`

## C2. Проверка конфигурации

```bash
# На staging-сервере
php artisan tinker
>>> config('stripe.key')        # должен вернуть pk_test_...
>>> config('stripe.secret')     # должен вернуть sk_test_...
>>> config('stripe.mock')       # должен вернуть false
```

- [ ] Все значения корректны
- [ ] Mock mode отключён

## C3. Тест: успешная оплата

Тестовая карта: `4242 4242 4242 4242`, срок: любой будущий, CVC: любой.

1. [ ] Открыть услугу → ввести email → нажать «Получить доступ»
2. [ ] Редирект на Stripe Checkout (реальная страница Stripe)
3. [ ] Ввести тестовую карту → оплатить
4. [ ] Попасть на `/payment/success`
5. [ ] В Stripe Dashboard → Events → `checkout.session.completed` — статус **delivered**
6. [ ] В БД: `purchases` — запись со `status=paid`
7. [ ] В БД: `accesses` — запись с токеном и `expires_at`
8. [ ] Job `SendAccessEmail` выполнен (очередь пустая)
9. [ ] В логе (или Mailtrap) — письмо с правильной ссылкой

## C4. Тест: отмена оплаты

1. [ ] Открыть услугу → начать оплату
2. [ ] На странице Stripe нажать «Назад» / закрыть
3. [ ] Попасть на `/payment/cancel`
4. [ ] В БД: `purchases` — статус остался `pending`
5. [ ] Access **не создан**

## C5. Тест: идемпотентность webhook

```bash
# В Stripe Dashboard → Webhooks → выбрать endpoint →
# найти событие checkout.session.completed → Resend
```

1. [ ] Повторно отправить то же событие через Stripe Dashboard
2. [ ] В БД: **второй Access не создан** (дублей нет)
3. [ ] В логах: запись о повторной обработке без ошибки

## C6. Тест: доступ по токену

1. [ ] Открыть ссылку из письма (`/services/{slug}?token=xxx`)
2. [ ] Платный контент виден
3. [ ] Открыть ту же страницу без токена → публичная версия + CTA
4. [ ] Изменить один символ в токене → сообщение об ошибке

## C7. Тест: повторная покупка тем же email

1. [ ] Тот же email покупает ту же услугу второй раз
2. [ ] Создаётся **новый** Access (не обновляется старый)
3. [ ] Оба токена работают независимо

## C8. Stripe CLI (альтернатива для локальной проверки webhook)

```bash
# Установить Stripe CLI
stripe login
stripe listen --forward-to http://localhost:8000/webhooks/stripe

# В отдельном терминале — триггер события
stripe trigger checkout.session.completed
```

- [ ] Локально webhook принимается и обрабатывается корректно

---

## Артефакт по завершению

Заполнить в конце этого файла:

```
Дата тестирования: ____
Staging URL: ____
Тестовые сценарии:
  ✅/❌ Успешная оплата
  ✅/❌ Отмена оплаты
  ✅/❌ Идемпотентность webhook
  ✅/❌ Доступ по токену
  ✅/❌ Повторная покупка
Найденные проблемы: ____
Исправлено: ____
```

---

## ✅ Критерий завершения Фазы C

Все 5 сценариев C3–C7 пройдены. В БД нет дублей. Email (пусть в лог) содержит рабочую ссылку.
