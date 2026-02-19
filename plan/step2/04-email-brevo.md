# 04 — Email: Brevo SMTP (Фаза D)

## Цель
Настроить доставку email через Brevo на staging и live. Убедиться, что письмо доходит в inbox.

---

## D1. Логика по окружениям

| Окружение | Driver | Хост |
|-----------|--------|------|
| local | `log` или Mailtrap | — / smtp.mailtrap.io |
| staging | `smtp` | smtp-relay.brevo.com |
| production | `smtp` | smtp-relay.brevo.com |

**Правило:** Brevo не трогать локально. Mailtrap/log достаточно.

---

## D2. Регистрация и настройка Brevo

- [ ] Создать аккаунт на brevo.com
- [ ] Перейти: **SMTP & API → SMTP**
- [ ] Получить SMTP-credentials:
  - Login (обычно email аккаунта)
  - Master password или создать отдельный SMTP password
- [ ] Сохранить credentials в `.env` staging

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp-relay.brevo.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_USERNAME=your_brevo_login@email.com
MAIL_PASSWORD=your_brevo_smtp_password
MAIL_FROM_ADDRESS=support@slodocs.si
MAIL_FROM_NAME="SloDocs"
```

## D3. Аутентификация домена в Brevo

- [ ] Brevo → **Senders & IP → Domains → Add a domain**
- [ ] Ввести домен: `slodocs.si`
- [ ] Brevo выдаст DNS-записи для добавления:

### SPF
```
Тип: TXT
Имя: @
Значение: v=spf1 include:spf.sendinblue.com mx ~all
```

### DKIM
```
Тип: TXT
Имя: mail._domainkey  (или то что укажет Brevo)
Значение: (длинная строка от Brevo)
```

### DMARC (добавить самостоятельно)
```
Тип: TXT
Имя: _dmarc
Значение: v=DMARC1; p=none; rua=mailto:support@slodocs.si
```

- [ ] DNS-записи добавлены у регистратора домена
- [ ] Подождать 15–60 минут
- [ ] Brevo → проверить статус домена → **Authenticated** ✓

## D4. Тест отправки со staging

```bash
# На staging-сервере
php artisan config:cache

php artisan tinker
Mail::raw('Test email from staging', function($m) {
    $m->to('your_test@gmail.com')->subject('SloDocs staging test');
});
```

- [ ] Команда выполнена без ошибок
- [ ] Письмо получено на Gmail
- [ ] Письмо получено на Outlook/Hotmail (если есть)
- [ ] Письмо **не попало в спам**
- [ ] В заголовке письма `From:` стоит `support@slodocs.si`

## D5. Тест реального письма доступа

1. [ ] Пройти полный mock/stripe test flow на staging
2. [ ] Письмо «Доступ активирован» получено в inbox
3. [ ] Ссылка в письме ведёт на правильный staging URL
4. [ ] Срок доступа в письме корректный

## D6. Mailtrap (локально, опционально)

```env
# .env (local)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=mailtrap_user
MAIL_PASSWORD=mailtrap_password
MAIL_FROM_ADDRESS=support@slodocs.si
```

- [ ] Письма видны в Mailtrap inbox
- [ ] Ссылки корректные (APP_URL = http://localhost:8000)

---

## ✅ Критерий завершения Фазы D

Письмо с токеном доступа доходит в inbox (не спам) на Gmail со staging-сервера. Домен аутентифицирован в Brevo.
