<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Stripe API Keys
    |--------------------------------------------------------------------------
    |
    | Here you may specify your Stripe API keys. You can obtain these keys
    | from your Stripe dashboard: https://dashboard.stripe.com/apikeys
    |
    */

    'key' => env('STRIPE_KEY'),
    'secret' => env('STRIPE_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Stripe Webhook Secret
    |--------------------------------------------------------------------------
    |
    | The webhook secret is used to verify that webhooks are coming from
    | Stripe. You can find this in your Stripe webhook settings.
    |
    */

    'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    |
    | The default currency for payments.
    |
    */

    'currency' => env('STRIPE_CURRENCY', 'EUR'),
];
