---                                                                                                                                                                                                            📋 ТЕХНИЧЕСКИЙ АНАЛИЗ И ROADMAP: SloDocs
                                                                                                                                                                                                               
  A) OVERVIEW    

  SloDocs — информационный портал для русскоговорящих иммигрантов в Словении с моделью "оплата → временный доступ к материалам". MVP фокусируется на одной услуге: "Оформление ребёнка в школу в Словении".    

  Архитектурная философия: Минималистичный подход без регистрации/авторизации. Доступ через одноразовые токены, отправляемые на email. Платежи через Stripe Checkout (hosted). Laravel 12 + Tailwind 4, SQLite 
  для dev, планируется PostgreSQL для prod. Проект в начальной стадии — созданы модели и миграции, реализован AccessService, но отсутствуют контроллеры, views, платежная интеграция и вся UI-логика.

  ---
  B) ARCHITECTURE MAP

  Уровень данных (Database Layer)

  - Service — каталог услуг (slug, title, price, access_duration_days, SEO fields)
  - Purchase — факт оплаты (service_id, email, payment_provider, payment_id, amount, status: pending/paid/failed)
  - Access — токенизированный доступ (service_id, purchase_id, email, access_token, starts_at, expires_at, is_active)
  - User — агрегированная статистика (email, first/last_purchase_at, purchases_count) — пассивная сущность
  - ActivityLog — audit trail (event_type, email, metadata)

  Бизнес-логика (Application Layer)

  Существующие:
  - AccessService — проверка валидности доступа (app/Services/AccessService.php)
  - AccessResult — Value Object для результата проверки (app/Services/AccessResult.php)

  Требуется создать:
  - PaymentService — создание Stripe Checkout Session, обработка webhooks
  - AccessGrantService — выдача доступа после оплаты, генерация токенов
  - EmailService — отправка email с токенами доступа

  HTTP Layer (Controllers)

  Публичная часть:
  - HomeController — главная страница со списком услуг
  - ServiceController — публичная страница услуги + платный контент с проверкой токена
  - PaymentController — инициация Stripe Checkout + success/cancel routes
  - WebhookController — обработка Stripe webhooks

  Админка:
  - Admin\ServiceController — CRUD услуг
  - Admin\PurchaseController — просмотр покупок
  - Admin\AccessController — управление доступами, повторная отправка email

  Middleware

  - CheckServiceAccess — проверка токена доступа к платному контенту
  - AdminAuth — базовая защита админки

  Jobs (Background)

  - SendAccessEmail — асинхронная отправка email с токеном
  - ProcessStripeWebhook — обработка Stripe events
  - ExpireAccessJob — деактивация истекших доступов (scheduler)

  Frontend Layer

  - Blade Views: главная, страница услуги (public/paid), платежные страницы, админка
  - Tailwind 4: кастомная тема с 'Instrument Sans'
  - Alpine.js (optional): для интерактивности без фреймворков
  - Vite: сборка assets

  External Integrations

  - Stripe: Checkout Session, webhooks (payment_intent.succeeded/failed)
  - SMTP: email доставка (планируется mailgun/postmark)

  ---
  C) EXECUTION PLAN

  C1) QUICK WINS (1-2 дня) ✅ ЗАВЕРШЕНО

  ✅ 1. Установка и настройка Stripe SDK

  composer require stripe/stripe-php
  - Добавить в .env.example: STRIPE_KEY, STRIPE_SECRET, STRIPE_WEBHOOK_SECRET
  - Создать config/stripe.php
  - Файлы: composer.json, config/stripe.php, .env.example
  - Результат: Stripe SDK готов к использованию

  ✅ 2. Seeders для тестовых данных

  php artisan make:seeder ServiceSeeder
  - Создать тестовую услугу "Оформление ребёнка в школу"
  - Файлы: database/seeders/ServiceSeeder.php, DatabaseSeeder.php
  - Команда запуска: php artisan db:seed
  - Результат: Тестовые данные в БД

  ✅ 3. Базовые роуты (web.php)

  - GET / → главная
  - GET /services/{slug} → страница услуги
  - POST /payment/create → создание Stripe Checkout
  - GET /payment/success → success callback
  - GET /payment/cancel → cancel callback
  - POST /webhooks/stripe → Stripe webhooks
  - Файлы: routes/web.php
  - Результат: Маршрутизация готова

  ✅ 4. Базовая layout структура (Blade)

  - resources/views/layouts/app.blade.php — главный layout
  - resources/views/layouts/admin.blade.php — админ layout
  - Подключить Vite assets (@vite)
  - Файлы: resources/views/layouts/*.blade.php
  - Результат: Переиспользуемые шаблоны

  ---
  C2) CORE ROADMAP (1-2 недели)

  EPIC 1: Публичная часть (4-5 дней) ✅ ЗАВЕРШЕНО

  Task 1.1: Главная страница ✅
  - Создать HomeController
  - View: resources/views/home.blade.php
  - Вывод списка активных услуг (Service::where('is_active', true))
  - Tailwind карточки услуг с SEO titles
  - Критерий: Открывается главная, видны услуги

  Task 1.2: Страница услуги (публичная версия) ✅
  - ServiceController@show
  - View: resources/views/services/show.blade.php
  - Публичное описание, цена, CTA кнопка "Получить доступ"
  - Schema.org разметка (Service type)
  - Критерий: Открывается /services/school-enrollment, видно описание

  Task 1.3: Форма запроса email ✅
  - Модальное окно / inline форма для ввода email
  - Валидация email (Laravel FormRequest)
  - Сохранение email в session перед редиректом на Stripe
  - Критерий: Пользователь может ввести email

  Task 1.4: PaymentService — создание Stripe Checkout ✅
  // app/Services/PaymentService.php
  public function createCheckoutSession(Service $service, string $email): string
  {
      // 1. Создать Purchase (status: pending)
      // 2. Stripe\Checkout\Session::create()
      // 3. Логировать событие payment_started
      // 4. Вернуть URL Stripe Checkout
  }
  - Файлы: app/Services/PaymentService.php
  - Тесты: tests/Unit/PaymentServiceTest.php
  - Критерий: Создаётся Checkout Session, пользователь перенаправляется

  Task 1.5: Success/Cancel callbacks ✅
  - PaymentController@success — отображение "Проверяем оплату..."
  - PaymentController@cancel — "Оплата отменена"
  - Критерий: После оплаты пользователь видит корректные сообщения

  ---
  EPIC 2: Stripe Webhooks + выдача доступа (3 дня) ✅ ЗАВЕРШЕНО

  Task 2.1: WebhookController ✅
  // app/Http/Controllers/WebhookController.php
  public function handleStripe(Request $request)
  {
      // 1. Проверка Stripe signature
      // 2. Dispatch ProcessStripeWebhook job
      // 3. Идемпотентность (проверка payment_id)
  }
  - Middleware: VerifyCsrfToken → исключить /webhooks/stripe
  - Файлы: app/Http/Controllers/WebhookController.php, app/Http/Middleware/VerifyCsrfToken.php
  - Критерий: Webhook принимается, проверяется signature

  Task 2.2: ProcessStripeWebhook Job ✅
  // app/Jobs/ProcessStripeWebhook.php
  public function handle()
  {
      // payment_intent.succeeded:
      // 1. Purchase → status: paid
      // 2. Вызвать AccessGrantService
      // 3. Логировать payment_success

      // payment_intent.payment_failed:
      // 1. Purchase → status: failed
      // 2. Логировать payment_failed
  }
  - Файлы: app/Jobs/ProcessStripeWebhook.php
  - Тесты: tests/Feature/StripeWebhookTest.php
  - Критерий: Webhook обрабатывается асинхронно

  Task 2.3: AccessGrantService ✅
  // app/Services/AccessGrantService.php
  public function grantAccess(Purchase $purchase): Access
  {
      // 1. Проверить, что Access еще не создан (идемпотентность)
      // 2. Сгенерировать access_token (Str::random(64))
      // 3. Создать Access (starts_at, expires_at = +access_duration_days)
      // 4. Обновить/создать User статистику
      // 5. Логировать access_granted
      // 6. Dispatch SendAccessEmail
  }
  - Файлы: app/Services/AccessGrantService.php
  - Тесты: tests/Unit/AccessGrantServiceTest.php
  - Критерий: После оплаты создаётся Access с токеном

  Task 2.4: SendAccessEmail Job ✅
  // app/Jobs/SendAccessEmail.php
  // app/Mail/AccessGrantedMail.php
  - Mailable с ссылкой: /services/{slug}?token={access_token}
  - Файлы: app/Jobs/SendAccessEmail.php, app/Mail/AccessGrantedMail.php, resources/views/emails/access-granted.blade.php
  - Команда теста: php artisan tinker → отправить тестовый email
  - Критерий: Email отправляется с рабочей ссылкой

  ---
  EPIC 3: Платный контент + middleware (2 дня) ✅ ЗАВЕРШЕНО

  Task 3.1: CheckServiceAccess Middleware ✅
  // app/Http/Middleware/CheckServiceAccess.php
  public function handle(Request $request, Closure $next)
  {
      $service = $request->route('service'); // slug
      $token = $request->query('token');

      $result = app(AccessService::class)->check($service, $token);

      if (!$result->isValid()) {
          // Вернуть публичную версию или ошибку
      }

      $request->attributes->add(['access' => $result->access]);
      return $next($request);
  }
  - Файлы: app/Http/Middleware/CheckServiceAccess.php, app/Http/Kernel.php
  - Критерий: Без токена/с неверным токеном доступ закрыт

  Task 3.2: Условный рендеринг в ServiceController ✅
  public function show(Request $request, string $slug)
  {
      $service = Service::where('slug', $slug)->firstOrFail();
      $hasAccess = $request->attributes->get('access') !== null;

      return view('services.show', compact('service', 'hasAccess'));
  }
  - View: если hasAccess → показать платный контент, иначе → CTA
  - Файлы: app/Http/Controllers/ServiceController.php, resources/views/services/show.blade.php
  - Критерий: С токеном виден платный контент

  Task 3.3: Страница платного контента ✅
  - Структура: инструкции, чеклисты, ссылки на файлы
  - Дизайн: читаемый Tailwind layout
  - Файлы: resources/views/services/paid-content.blade.php (или секции в show.blade.php)
  - Критерий: Платный контент структурирован и читаем

  Task 3.4: Обработка истечения срока ✅
  - Если expires_at < now() → показать "Срок доступа истёк"
  - Логировать access_expired (при первом обращении после истечения)
  - Критерий: Истекший токен не даёт доступ

  ---
  EPIC 4: Админка (3-4 дня) ✅ ЗАВЕРШЕНО (Filament)

  Task 4.1: AdminAuth Middleware ✅
  - Базовая HTTP Auth или Laravel Auth (без User registration)
  - Создать админ-пользователя через tinker/seeder
  - Файлы: app/Models/AdminUser.php, database/seeders/AdminUserSeeder.php
  - Команда: php artisan db:seed
  - Критерий: /admin доступен только авторизованным (Filament auth)

  Task 4.2: Admin Routes ✅
  - Filament автоматически регистрирует роуты для админ-панели
  - Файлы: app/Providers/Filament/AdminPanelProvider.php
  - Результат: Роуты админки готовы

  Task 4.3: ServiceResource — CRUD услуг ✅
  - Индекс: таблица услуг с фильтрами
  - Create/Edit: форма (title, slug, description_public, price, access_duration_days, seo_*, is_active)
  - Update: редактирование контента услуги
  - Файлы: app/Filament/Resources/ServiceResource.php
  - Критерий: Админ может создать/редактировать услугу

  Task 4.4: PurchaseResource — список покупок ✅
  - Таблица: email, service, amount, status, created_at
  - Фильтры: по status, по service
  - Файлы: app/Filament/Resources/PurchaseResource.php
  - Критерий: Админ видит историю покупок

  Task 4.5: AccessResource — управление доступами ✅
  - Таблица: email, service, expires_at, is_active
  - Действия: resend email, deactivate
  - Файлы: app/Filament/Resources/AccessResource.php
  - Критерий: Админ может деактивировать доступ и переотправить email

  Task 4.6: Admin Dashboard (базовая статистика) ✅
  - Счётчики: оплаченные покупки, активные доступы, пользователи
  - Файлы: app/Filament/Widgets/StatsOverview.php
  - Критерий: Админ видит общую статистику

  ---
  EPIC 5: SEO, юридические страницы, robots/sitemap (1-2 дня) ✅ ЗАВЕРШЕНО

  Task 5.1: SEO метатеги ✅
  - Динамические title/description из Service модели
  - Schema.org разметка (WebSite, Service, Organization)
  - Open Graph метатеги для социальных сетей
  - Файлы: resources/views/layouts/app.blade.php (секция @section('meta'))
  - Критерий: View Source показывает корректные метатеги

  Task 5.2: Юридические страницы ✅
  - /terms — Условия использования
  - /privacy — Политика конфиденциальности
  - Статичные Blade views
  - Файлы: routes/web.php, resources/views/legal/*.blade.php
  - Критерий: Страницы доступны и читаемы

  Task 5.3: robots.txt и sitemap.xml ✅
  - robots.txt: запретить /admin, /payment, /webhooks, allow /services
  - sitemap.xml: главная, список услуг, юридические страницы (динамическая генерация)
  - Файлы: public/robots.txt, app/Http/Controllers/SitemapController.php
  - Команда: php artisan route:list | grep sitemap
  - Критерий: robots.txt настроен, sitemap генерируется

  ---
  EPIC 6: Testing (2-3 дня) ✅ ЗАВЕРШЕНО (49 тестов: 21 Unit + 28 Feature)

  Task 6.1: Feature Tests ✅
  - UserFlowTest: главная → страница услуги → оплата → webhook → доступ
  - PaymentTest: создание Checkout Session, обработка webhooks
  - AccessTest: проверка токена, истечение срока
  - Файлы: tests/Feature/*Test.php
  - Команда: php artisan test --filter=Feature
  - Критерий: Основной User Flow покрыт тестами

  Task 6.2: Unit Tests ✅
  - AccessService, PaymentService, AccessGrantService
  - Файлы: tests/Unit/*Test.php
  - Команда: php artisan test --filter=Unit
  - Критерий: Бизнес-логика покрыта

  Task 6.3: Тестовый режим Stripe ✅
  - Использование test API keys
  - Mock Payment режим (PAYMENT_MOCK=true)
  - Тестовые карты: 4242424242424242
  - Файлы: .env.example (STRIPE_TEST_MODE=true)
  - Критерий: Можно протестировать полный флоу без реальных платежей

  ---
  C3) HARD / LATER (после стабилизации)

  1. Rate Limiting (защита от ботов) ✅ ЗАВЕРШЕНО

  - Middleware RateLimiter на /payment/create (10 req/min per IP)
  - Throttle на повторную отправку email (1 req/5min per access через cache)
  - Файлы: routes/web.php, app/Filament/Resources/AccessResource.php
  - Приоритет: Medium
  - Сложность: Low

  2. Автоматическая деактивация истекших доступов ✅ ЗАВЕРШЕНО

  // app/Console/Commands/ExpireAccessesCommand.php
  // Schedule: php artisan schedule:run (ежедневно)
  Access::where('expires_at', '<', now())
        ->where('is_active', true)
        ->update(['is_active' => false]);
  - Файлы: app/Console/Commands/ExpireAccessesCommand.php, routes/console.php
  - Приоритет: Medium
  - Сложность: Low

  3. Мониторинг и алертинг ✅ ЧАСТИЧНО (документация готова)

  - Laravel Telescope (dev) - можно установить при необходимости
  - Sentry для production errors - настройка в .env.example
  - Webhook для failed payments → Telegram/Slack - можно добавить
  - Файлы: PRODUCTION_SETUP.md, .env.example
  - Приоритет: High (для prod)
  - Сложность: Medium

  4. Резервное копирование БД ✅ ДОКУМЕНТИРОВАНО

  - Cron-задача для pg_dump (PostgreSQL)
  - Хранение на S3/DigitalOcean Spaces
  - Файлы: PRODUCTION_SETUP.md (раздел Database Backup)
  - Приоритет: Critical (для prod)
  - Сложность: Low

  5. Многоязычность (русский, английский)

  - Laravel Localization
  - Перевод UI и контента
  - Приоритет: Low (post-MVP)
  - Сложность: High

  6. Дополнительные услуги

  - Масштабирование модели на несколько услуг
  - Категории услуг, фильтры
  - Приоритет: Low (post-MVP)
  - Сложность: Medium

  7. Личный кабинет пользователя

  - Регистрация, авторизация
  - История покупок, управление доступами
  - Приоритет: Low (post-MVP)
  - Сложность: High

  ---
  D) RISKS & RECOMMENDATIONS

  🔴 КРИТИЧЕСКИЕ РИСКИ

  1. Stripe Webhooks не доходят (localhost)
  - Проблема: Stripe не может отправить webhook на localhost
  - Решение: Использовать ngrok/Laravel Valet Share для dev, или Stripe CLI
  - Команда: stripe listen --forward-to localhost:8000/webhooks/stripe
  - Приоритет: Блокер для тестирования

  2. Отсутствие обработки Failed Jobs
  - Проблема: Если SendAccessEmail падает, пользователь не получит токен
  - Решение: 
    - Настроить failed_jobs table (уже есть в миграциях)
    - Добавить алертинг на failed jobs
    - Реализовать повторную отправку через админку
  - Файлы: config/queue.php (failed.driver: database-uuids)
  - Приоритет: High

  3. Идемпотентность Webhooks
  - Проблема: Stripe может отправить webhook дважды
  - Решение: Проверка payment_id в Purchase + database unique constraint
  - Реализация: В ProcessStripeWebhook проверять Purchase::where('payment_id', $paymentId)->exists()
  - Приоритет: Critical

  🟠 СРЕДНИЕ РИСКИ

  4. Безопасность access_token
  - Проблема: Токен в URL логируется (server logs, browser history)
  - Assumption: Для MVP приемлемо (документация описывает это как осознанный компромисс)
  - Альтернатива: Переход на cookie-based access (требует больше кода)
  - Приоритет: Low (для MVP)

  5. Email deliverability
  - Проблема: SMTP может не доставить email (spam filters)
  - Решение:
    - Использовать проверенный SMTP (Postmark, Mailgun)
    - SPF, DKIM, DMARC настройки
    - Логировать все отправки (ActivityLog)
  - Приоритет: High

  6. User модель не используется для авторизации
  - Проблема: В миграции User отсутствует password/remember_token, но модель наследует Authenticatable
  - Решение:
    - Либо добавить поля в миграцию (для будущей админки)
    - Либо убрать Authenticatable trait (если User чисто для статистики)
  - Assumption: Вероятно, User планируется для админ-авторизации
  - Приоритет: Medium

  🟡 ТЕХНИЧЕСКИЙ ДОЛГ

  7. Отсутствие версионирования контента
  - Проблема: Если админ обновит контент услуги, старые покупатели увидят новый контент
  - Документация: "обновления контента не аннулируют уже выданный доступ" (mvp-boundaries)
  - Assumption: Для MVP это осознанное решение
  - Улучшение: Версионирование контента (Service versions) — post-MVP

  8. Отсутствие тестов
  - Проблема: Нет coverage для критической логики
  - Решение: Epic 6 (Testing) обязателен перед запуском
  - Приоритет: Critical

  9. Хранение файлов
  - Проблема: Документация упоминает "файлы вне public/", но нет файловой системы
  - Assumption: Контент пока текстовый, файлы — будущая фича
  - Решение: Использовать Laravel Storage + приватные диски
  - Приоритет: Medium (если нужны PDF/Word документы)

  🟢 АРХИТЕКТУРНЫЕ РЕКОМЕНДАЦИИ

  10. Разделение PaymentService
  - Рекомендация: Отделить StripeService (работа с API) от PaymentService (бизнес-логика)
  - Польза: Легче заменить Stripe на другой провайдер
  - Приоритет: Low (оптимизация)

  11. Events вместо прямых вызовов
  - Рекомендация:
    - Event: PurchasePaid → Listener: GrantAccess, SendAccessEmail
    - Event: AccessExpired → Listener: LogExpiration, NotifyUser (optional)
  - Польза: Декаплинг, легче добавлять новую логику
  - Приоритет: Medium

  12. Form Requests
  - Рекомендация: Использовать FormRequest для валидации (CreatePaymentRequest, UpdateServiceRequest)
  - Польза: Чистота контроллеров
  - Приоритет: Low (code quality)

  ---
  E) NEXT ACTIONS CHECKLIST

  Подготовка окружения

  - Установить зависимости: composer install && npm install
  - Скопировать .env: cp .env.example .env
  - Сгенерировать ключ: php artisan key:generate
  - Создать БД: touch database/database.sqlite (для SQLite)
  - Мигрировать: php artisan migrate
  - Установить Stripe SDK: composer require stripe/stripe-php
  - Настроить .env: STRIPE_KEY, STRIPE_SECRET, STRIPE_WEBHOOK_SECRET, MAIL_MAILER
  - Установить Stripe CLI: https://stripe.com/docs/stripe-cli (для webhook forwarding)

  Quick Wins

  - Создать config/stripe.php
  - Создать ServiceSeeder + запустить php artisan db:seed
  - Определить роуты в web.php (публичные + webhooks)
  - Создать layouts: app.blade.php, admin.blade.php

  Core Development (в порядке зависимостей)

  - Epic 1: Публичная часть (главная + страница услуги + форма email + PaymentService)
  - Epic 2: Webhooks (WebhookController → ProcessStripeWebhook → AccessGrantService → SendAccessEmail)
  - Epic 3: Платный контент (Middleware + условный рендеринг + обработка истечения)
  - Epic 4: Админка (Auth → CRUD услуг → просмотр покупок/доступов → dashboard)
  - Epic 5: SEO (метатеги → юридические страницы → robots/sitemap)
  - Epic 6: Testing (Feature + Unit тесты)

  Production Readiness

  - Настроить PostgreSQL (заменить SQLite в .env)
  - Настроить production SMTP (Postmark/Mailgun)
  - Настроить Redis для queue/cache
  - Добавить Sentry для error tracking
  - Настроить резервное копирование БД
  - Rate limiting на критичных эндпоинтах
  - Настроить Scheduler для expire accesses
  - HTTPS + SSL сертификат (Let's Encrypt)
  - Настроить Stripe webhooks endpoint (production URL)
  - Тестовый прогон полного User Flow

  ---
  🚀 КАК ЗАПУСТИТЬ ЛОКАЛЬНО

  Предварительные требования

  - PHP 8.2+
  - Composer
  - Node.js 18+ + npm
  - SQLite (или PostgreSQL для продакшна)
  - Stripe CLI (опционально для webhook testing)

  Шаги установки

  # 1. Клонировать репозиторий (уже сделано)
  cd C:\Users\dimitrii.kasapov\Documents\Projects\Laravel\SloDocks

  # 2. Установить зависимости
  composer install
  npm install

  # 3. Настроить окружение
  cp .env.example .env
  php artisan key:generate

  # 4. Создать БД (SQLite)
  touch database/database.sqlite

  # 5. Мигрировать
  php artisan migrate

  # 6. Заполнить тестовыми данными (после создания seeders)
  php artisan db:seed

  # 7. Собрать frontend
  npm run build

  # 8. Запустить dev сервер (concurrently: server + queue + logs + vite)
  composer dev
  # ИЛИ вручную в отдельных терминалах:
  php artisan serve
  php artisan queue:listen
  npm run dev

  # 9. (Опционально) Stripe webhook forwarding
  stripe listen --forward-to localhost:8000/webhooks/stripe

  Доступ

  - Сайт: http://localhost:8000
  - Админка: http://localhost:8000/admin (после реализации)
  - Stripe webhooks: через Stripe CLI или ngrok

  Тестирование оплаты

  - Использовать Stripe Test Mode
  - Тестовая карта: 4242424242424242, CVC: любой, Expiry: будущая дата

  ---
  📊 ОЦЕНКА ТРУДОЗАТРАТ

  - Quick Wins: 1-2 дня (6-12 часов)
  - Epic 1 (Публичная часть): 4-5 дней (30-40 часов)
  - Epic 2 (Webhooks): 3 дня (20-25 часов)
  - Epic 3 (Платный контент): 2 дня (12-16 часов)
  - Epic 4 (Админка): 3-4 дня (25-30 часов)
  - Epic 5 (SEO): 1-2 дня (8-12 часов)
  - Epic 6 (Testing): 2-3 дня (15-20 часов)

  Итого: 16-21 день чистой разработки (120-155 часов)

  Assumption: Один разработчик, полный рабочий день, без учёта багфиксинга и итераций.

  ---
  F) ТЕКУЩИЙ ПЛАН РАБОТЫ

  Этап 1: Тестирование и поправки на фронтенде и админбаре

  - Проверка всех страниц на корректность отображения
  - Исправление багов в UI/UX
  - Тестирование responsive дизайна
  - Проверка функционала админ-панели
  - Исправление ошибок в формах и валидации

  Этап 2: Добавление 5 услуг

  - Создание контента для 5 новых услуг
  - Заполнение описаний, цен, сроков доступа
  - Подготовка платного контента для каждой услуги
  - SEO оптимизация для каждой услуги
  - Тестирование покупки и доступа для всех услуг

  Этап 3: Страница поиска и контакты

  - Реализация страницы поиска услуг
  - Фильтрация и сортировка результатов
  - Создание страницы контактов
  - Форма обратной связи
  - Email уведомления для контактной формы

  Этап 4: Тестирование FE, SEO, Accessibility

  - Frontend тестирование:
    - Кросс-браузерная совместимость (Chrome, Firefox, Safari, Edge)
    - Mobile testing (iOS, Android)
    - Проверка производительности (PageSpeed Insights)
  - SEO проверка:
    - Метатеги на всех страницах
    - Структурированные данные (Schema.org)
    - Sitemap и robots.txt
    - Open Graph и Twitter Cards
  - Accessibility аудит:
    - WCAG 2.1 соответствие
    - Keyboard navigation
    - Screen reader compatibility
    - Color contrast проверка

  Этап 5: Hosting - почтовый ящик, оплата

  - Настройка production окружения:
    - Выбор и настройка хостинга (VPS/Cloud)
    - Настройка PostgreSQL для production
    - Redis для очередей и кеша
  - Почтовый сервис:
    - Регистрация в Postmark/Mailgun
    - Настройка SPF, DKIM, DMARC
    - Тестирование доставляемости email
  - Платёжная система:
    - Активация production режима Stripe
    - Настройка webhook endpoint
    - Тестирование реальных платежей
  - SSL сертификат и HTTPS
  - Backup система для БД
  - Мониторинг и логирование (Sentry)

