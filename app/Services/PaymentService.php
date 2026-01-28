<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\Purchase;
use App\Models\Service;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentService
{
    public function __construct()
    {
        Stripe::setApiKey(config('stripe.secret'));
    }

    /**
     * Create Stripe Checkout Session for service purchase
     */
    public function createCheckoutSession(Service $service, string $email): string
    {
        // 1. Create pending purchase
        $purchase = Purchase::create([
            'service_id' => $service->id,
            'email' => $email,
            'payment_provider' => 'stripe',
            'payment_id' => null, // Will be updated by webhook
            'amount' => $service->price,
            'currency' => config('stripe.currency', 'EUR'),
            'status' => 'pending',
        ]);

        // 2. Log payment_started event
        ActivityLog::create([
            'event_type' => 'payment_started',
            'email' => $email,
            'service_id' => $service->id,
            'purchase_id' => $purchase->id,
            'metadata' => [
                'amount' => $service->price,
                'currency' => config('stripe.currency', 'EUR'),
            ],
        ]);

        // 3. Create Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => strtolower(config('stripe.currency', 'EUR')),
                    'unit_amount' => $service->price,
                    'product_data' => [
                        'name' => $service->title,
                        'description' => $service->description_public,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
            'customer_email' => $email,
            'metadata' => [
                'purchase_id' => $purchase->id,
                'service_id' => $service->id,
            ],
        ]);

        // 4. Update purchase with Stripe session ID (temporary tracking)
        $purchase->update([
            'payment_id' => $session->id,
        ]);

        return $session->url;
    }
}
