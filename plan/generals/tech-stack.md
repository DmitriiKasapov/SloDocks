# Tech Stack — SloDocs

## Backend
- Laravel 12

## Frontend
- Blade (SSR, без SPA)
- Tailwind CSS 4
- Alpine.js — только для интерактивных UI элементов (модалки, меню)
- Vite — сборка assets

## Admin
- Filament v5 — /admin (guard: admin, модель: AdminUser)

## Database
- PostgreSQL (dev + production)

## Payments
- Stripe (Checkout Session + webhooks)
- Mock режим: PAYMENT_MOCK=true (только local, не production)

## Email
- Brevo SMTP (staging + production)
- Mailtrap или log driver (local)

## Queue
- Database driver

## Hosting
- VPS: Hetzner или DigitalOcean

Зафиксировано для MVP.
