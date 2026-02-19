# SloDocs — Next Stage: Индекс

## Цель
Через 5–7 рабочих дней: staging с Stripe Test Mode + Brevo + 3 услуги + пройденные QA-сценарии → Go Live.

## Фазы и критерии перехода

| Фаза | Файл | Критерий перехода |
|------|------|-------------------|
| A. Локальная стабилизация | 01 | Mock flow проходит без ошибок, config:cache не ломает работу |
| B. Staging deploy | 02 | Сайт открывается, админка работает, логи чистые |
| C. Stripe Test Mode | 03 | Webhook приходит, Access создаётся, письмо уходит |
| D. Email Brevo | 04 | Письмо в inbox (не спам) на Gmail и Outlook |
| E. Контент MVP | 05 | 3 услуги в админке, материалы прикреплены и защищены |
| F. QA-сценарии | 06 | Все сценарии пройдены, отчёт подписан |
| G. Go Live | 07 | 1 реальная покупка прошла, письмо получено |

## Правило
Никаких новых фич (языки, SEO-расширения, кабинет) до прохождения фазы G.

## Файлы
- `01-local-stabilization.md` — проверки на локальной машине
- `02-staging-deploy.md` — поднять VPS, Nginx, деплой
- `03-stripe-testmode.md` — Stripe Test + webhook на staging
- `04-email-brevo.md` — Brevo SMTP + SPF/DKIM
- `05-content-mvp.md` — стандарт и структура 3 услуг
- `06-qa-scenarios.md` — полный набор сценариев
- `07-go-live.md` — переключение на live
- `08-ops-and-maintenance.md` — бэкапы, деплой, мониторинг
- `09-claude-tasks.md` — шаблоны задач для Claude
- `10-risk-register.md` — риски и митигации
