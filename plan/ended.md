# ended.md — Отчёт о выполнении

Формат записи:
`[дата] [ID задачи] [описание] — [статус]`

---

<!-- Записи появляются здесь после выполнения задач из work.md -->

[2026-02-19] [нюанс #1] Добавить SESSION_SECURE_COOKIE в .env.example — выполнено
[2026-02-19] [нюанс #2] Удалить DeactivateExpiredAccess, убрать временную логику имитации оплаты, восстановить кнопку КУПИТЬ на странице услуги — выполнено
[2026-02-19] [нюанс #3] <style> в email — оставлен как исключение (email-клиенты требуют inline CSS) — закрыто
[2026-02-19] [доработка] Платёжный flow: email убран из формы покупки, собирается Stripe/mock. Миграция purchases.email nullable. Webhook берёт email из customer_details — выполнено
[2026-02-19] [доработка] Кнопки: стиль обновлён на uppercase + font-bold, стрелки убраны со всех страниц — выполнено
[2026-02-19] [доработка] Карточка услуги: два состояния (Купить / Читать с таймером доступа), цветовая индикация по дням — выполнено
[2026-02-19] [доработка] Access-timer вынесен в blocks__access-timer, перемещён под крошки на странице материалов — выполнено
[2026-02-19] [доработка] Cookie-based доступ: токен сохраняется в cookie до expires_at, повторные заходы без ?token= работают — выполнено
[2026-02-19] [доработка] Страница /test почищена, теперь показывает все варианты кнопок — выполнено
[2026-02-19] [доработка] Страница success: кнопка «Перейти к материалам» вместо «На главную» — выполнено
[2026-02-19] [доработка] Mock-checkout: убрано поле Email (отображение), добавлено поле email в форму оплаты — выполнено

[2026-02-20] [A-1 / T-01] Проверка .env.example: все переменные из матрицы A2 присутствуют, SESSION_SECURE_COOKIE и PAYMENT_MOCK есть с комментариями, .gitignore в норме — выполнено
[2026-02-20] [A-2 / T-02] Аудит идемпотентности webhook: двойная защита — ProcessStripeWebhook проверяет purchase.status===paid, AccessGrantService проверяет Access по purchase_id в DB::transaction. Дублей нет — выполнено
[2026-02-20] [A-3 / T-03] Аудит безопасности токена: токен не пишется в логи, Referrer-Policy: no-referrer, cookie httpOnly+secure. Утечек нет — выполнено
[2026-02-20] [A-4 / T-05] Аудит FileController: найдены и исправлены два бага: (1) CheckServiceAccess не проверял cookie → добавлено чтение cookie access_{serviceId}; (2) downloads/examples использовали несуществующий route('material.download') → заменены на route('services.file') с blockId+fileIndex+?token=. content-blocks.blade.php передаёт $block, $service, $access в дочерние компоненты — выполнено
[2026-02-20] [A-5 / T-07] Проверка email-ссылки: AccessGrantedMail использует route() хелпер (APP_URL из конфига), не hardcode. Ссылка корректная — выполнено
[2026-02-20] [A5+A7] Email и Queue: БАГ найден и исправлен — emails/access-granted.blade.php использовал route('terms') вместо route('legal.terms'). После исправления job SendAccessEmail выполняется, письмо корректно пишется в лог (To, Subject, HTML-тело со ссылкой и токеном) — выполнено
[2026-02-20] [A-7 / T-04] deploy.sh создан: set -e, цветной вывод, staging/production режимы, TODO-метки для пути на VPS — выполнено
[2026-02-20] [инспекция] Pre-staging inspection: найдены и исправлены 4 проблемы: (1) email-ссылка вела на services.show вместо services.content — исправлено в AccessGrantedMail; (2) race condition потери доступа в job — status='paid' перенесён после grantAccess; (3) race condition в updateUserStatistics — заменён на атомарный increment+insertOrIgnore; (4) маршрут /test доступен в production — добавлен abort_if(isProduction). Бонус: обнаружено что config:cache ломает phpunit.xml env vars — очищен перед тестами. 45/45 тестов зелёные — выполнено

[2026-02-20] [A-6] Тесты: 45/45 зелёные. Исправлено: phpunit.xml пароль БД, тесты обновлены под архитектуру без email в форме покупки (email теперь на mock checkout), mockPay валидация email:rfc,dns→email:rfc — выполнено
