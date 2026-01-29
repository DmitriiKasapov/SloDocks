<?php

namespace App\Jobs;

use App\Models\Purchase;
use App\Services\AccessGrantService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessStripeWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 60;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $eventType,
        public array $eventData,
        public string $eventId
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Processing Stripe webhook', [
            'event_id' => $this->eventId,
            'event_type' => $this->eventType,
        ]);

        match ($this->eventType) {
            'payment_intent.succeeded' => $this->handlePaymentSucceeded(),
            'payment_intent.payment_failed' => $this->handlePaymentFailed(),
            'checkout.session.completed' => $this->handleCheckoutCompleted(),
            default => Log::info('Unhandled Stripe webhook event', ['type' => $this->eventType])
        };
    }

    /**
     * Handle successful payment
     */
    private function handlePaymentSucceeded(): void
    {
        $paymentIntentId = $this->eventData['id'];

        // Find purchase by payment_id
        $purchase = Purchase::where('payment_id', $paymentIntentId)->first();

        if (!$purchase) {
            Log::warning('Purchase not found for payment intent', [
                'payment_intent_id' => $paymentIntentId,
            ]);
            return;
        }

        // Check if already processed (idempotency)
        if ($purchase->status === 'paid') {
            Log::info('Purchase already marked as paid', ['purchase_id' => $purchase->id]);
            return;
        }

        // Update purchase status
        $purchase->update(['status' => 'paid']);

        // Log activity
        activity_log('payment_success', $purchase->email, [
            'purchase_id' => $purchase->id,
            'service_id' => $purchase->service_id,
            'amount' => $purchase->amount,
            'payment_id' => $paymentIntentId,
        ]);

        // Grant access
        $accessGrantService = app(AccessGrantService::class);
        $accessGrantService->grantAccess($purchase);

        Log::info('Payment processed successfully', [
            'purchase_id' => $purchase->id,
            'email' => $purchase->email,
        ]);
    }

    /**
     * Handle failed payment
     */
    private function handlePaymentFailed(): void
    {
        $paymentIntentId = $this->eventData['id'];

        $purchase = Purchase::where('payment_id', $paymentIntentId)->first();

        if (!$purchase) {
            Log::warning('Purchase not found for failed payment', [
                'payment_intent_id' => $paymentIntentId,
            ]);
            return;
        }

        // Update purchase status
        $purchase->update(['status' => 'failed']);

        // Log activity
        activity_log('payment_failed', $purchase->email, [
            'purchase_id' => $purchase->id,
            'service_id' => $purchase->service_id,
            'payment_id' => $paymentIntentId,
            'error' => $this->eventData['last_payment_error'] ?? null,
        ]);

        Log::info('Payment failed', [
            'purchase_id' => $purchase->id,
            'email' => $purchase->email,
        ]);
    }

    /**
     * Handle checkout session completed
     */
    private function handleCheckoutCompleted(): void
    {
        $sessionId = $this->eventData['id'];
        $paymentIntentId = $this->eventData['payment_intent'] ?? null;

        Log::info('Checkout session completed', [
            'session_id' => $sessionId,
            'payment_intent_id' => $paymentIntentId,
        ]);

        // The actual payment processing happens in payment_intent.succeeded
        // This event is logged for tracking purposes
    }
}
