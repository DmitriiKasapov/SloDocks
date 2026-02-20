# SloDocs — Этап 2: Индекс

## Стратегия
Запуск без юрлица: сначала технический staging → бесплатный доступ на реальном домене →
подключение оплаты когда будет SP.

## Фазы

| Блок | Цель | Где работает |
|------|------|--------------|
| A. Локальная стабилизация | Локально всё чисто, тесты зелёные | localhost ✅ |
| B. Railway deploy | Сайт живой, worker крутится | *.railway.app |
| C. Stripe Test Mode | Тестовые оплаты проходят, письма в лог | *.railway.app |
| D. Brevo email | Письма в inbox, не спам | *.railway.app |
| E. Бесплатный режим + домен | `slodocs.si` живой, кнопка = бесплатный доступ | slodocs.si |
| F. Платный режим | Stripe Live, кнопка = Купить | slodocs.si |

## Правило
Никаких новых фич до завершения блока E.
Stripe Live только после получения SP.

## Файлы плана
- `01-local-stabilization.md` — локальная среда (завершено ✅)
- `02-staging-deploy.md` — Railway: Web + Worker + PostgreSQL
- `03-stripe-testmode.md` — Stripe Test + webhook
- `04-email-brevo.md` — Brevo SMTP + SPF/DKIM
- `05-content-mvp.md` — структура и стандарт контента
- `06-qa-scenarios.md` — сценарии проверки
- `07-go-live.md` — переключение на live + платный режим
- `08-ops-and-maintenance.md` — бэкапы, деплой, мониторинг
- `10-risk-register.md` — риски и митигации

## Текущий статус
→ **Блок B**: нужен коммит + деплой на Railway
