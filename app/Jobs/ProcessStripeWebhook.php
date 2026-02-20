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
    public $backoff = [10, 30, 60]; // Retry after 10s, 30s, 60s

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
     * Handle successful payment intent (logging only).
     * Access granting happens in handleCheckoutCompleted.
     */
    private function handlePaymentSucceeded(): void
    {
        Log::info('Payment intent succeeded', [
            'payment_intent_id' => $this->eventData['id'],
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
            'payment_id' => $paymentIntentId,
            'error' => $this->eventData['last_payment_error'] ?? null,
        ], serviceId: $purchase->service_id, purchaseId: $purchase->id);

        Log::info('Payment failed', [
            'purchase_id' => $purchase->id,
            'email' => $purchase->email,
        ]);
    }

    /**
     * Handle checkout session completed — primary event for granting access.
     * Session ID matches the payment_id stored in Purchase.
     */
    private function handleCheckoutCompleted(): void
    {
        $sessionId = $this->eventData['id'];

        $purchase = Purchase::where('payment_id', $sessionId)->first();

        if (!$purchase) {
            Log::warning('Purchase not found for checkout session', [
                'session_id' => $sessionId,
            ]);
            return;
        }

        if ($purchase->status === 'paid') {
            Log::info('Purchase already processed', ['purchase_id' => $purchase->id]);
            return;
        }

        // Collect email from Stripe customer details
        $email = $this->eventData['customer_details']['email'] ?? null;
        if ($email) {
            $purchase->update(['email' => $email]);
        }

        // Verify payment amount matches expected amount
        $amountPaid = $this->eventData['amount_total'] ?? 0; // in cents
        $expectedAmount = $purchase->amount;

        if ($amountPaid !== $expectedAmount) {
            Log::error('Payment amount mismatch!', [
                'purchase_id' => $purchase->id,
                'expected_amount' => $expectedAmount,
                'paid_amount' => $amountPaid,
                'session_id' => $sessionId,
            ]);

            activity_log('payment_amount_mismatch', $purchase->email, [
                'expected' => $expectedAmount,
                'paid' => $amountPaid,
                'session_id' => $sessionId,
            ], serviceId: $purchase->service_id, purchaseId: $purchase->id);

            // Mark as failed to prevent access grant
            $purchase->update(['status' => 'failed']);
            return;
        }

        activity_log('payment_success', $purchase->email, [
            'amount' => $purchase->amount,
            'session_id' => $sessionId,
        ], serviceId: $purchase->service_id, purchaseId: $purchase->id);

        $accessGrantService = app(AccessGrantService::class);
        $accessGrantService->grantAccess($purchase);

        // Mark as paid only after access is successfully granted
        // This ensures job retry can re-grant access if it failed mid-process
        $purchase->update(['status' => 'paid']);

        Log::info('Checkout completed, access granted', [
            'purchase_id' => $purchase->id,
            'email' => $purchase->email,
        ]);
    }
}
