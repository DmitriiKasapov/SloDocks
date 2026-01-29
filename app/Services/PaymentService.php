<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\Purchase;
use App\Models\Service;
use Illuminate\Support\Str;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentService
{
    public function __construct()
    {
        if (!config('stripe.mock')) {
            Stripe::setApiKey(config('stripe.secret'));
        }
    }

    /**
     * Create checkout session (Stripe or mock) for service purchase
     */
    public function createCheckoutSession(Service $service, string $email): string
    {
        $purchase = $this->createPurchase($service, $email);

        if (config('stripe.mock')) {
            return $this->createMockCheckoutUrl($purchase);
        }

        return $this->createStripeCheckoutUrl($service, $email, $purchase);
    }

    /**
     * Create pending purchase record and log event
     */
    private function createPurchase(Service $service, string $email): Purchase
    {
        $isMock = config('stripe.mock');

        $purchase = Purchase::create([
            'service_id' => $service->id,
            'email' => $email,
            'payment_provider' => $isMock ? 'mock' : 'stripe',
            'payment_id' => $isMock ? 'mock_' . Str::uuid() : null,
            'amount' => $service->price,
            'currency' => config('stripe.currency', 'EUR'),
            'status' => 'pending',
        ]);

        ActivityLog::create([
            'event_type' => 'payment_started',
            'email' => $email,
            'service_id' => $service->id,
            'purchase_id' => $purchase->id,
            'metadata' => [
                'amount' => $service->price,
                'currency' => config('stripe.currency', 'EUR'),
                'mock' => $isMock,
            ],
        ]);

        return $purchase;
    }

    /**
     * Return URL to local mock checkout page
     */
    private function createMockCheckoutUrl(Purchase $purchase): string
    {
        return route('payment.mock.checkout', $purchase);
    }

    /**
     * Create Stripe Checkout Session and return its URL
     */
    private function createStripeCheckoutUrl(Service $service, string $email, Purchase $purchase): string
    {
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

        $purchase->update(['payment_id' => $session->id]);

        return $session->url;
    }
}
