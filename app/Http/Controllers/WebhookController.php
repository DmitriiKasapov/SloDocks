<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessStripeWebhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class WebhookController extends Controller
{
    /**
     * Handle incoming Stripe webhooks
     */
    public function handleStripe(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = config('stripe.webhook_secret');

        try {
            // Verify webhook signature
            $event = Webhook::constructEvent(
                $payload,
                $sigHeader,
                $webhookSecret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            Log::error('Stripe webhook invalid payload', [
                'error' => $e->getMessage(),
            ]);
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (SignatureVerificationException $e) {
            // Invalid signature
            Log::error('Stripe webhook signature verification failed', [
                'error' => $e->getMessage(),
            ]);
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Check for duplicate processing (idempotency)
        $eventId = $event->id;
        $cacheKey = "stripe_webhook_{$eventId}";

        if (cache()->has($cacheKey)) {
            Log::info('Stripe webhook already processed', ['event_id' => $eventId]);
            return response()->json(['status' => 'already_processed'], 200);
        }

        // Mark event as processing (24 hour expiry)
        cache()->put($cacheKey, true, now()->addDay());

        // Dispatch job for async processing
        ProcessStripeWebhook::dispatch($event->type, $event->data->object->toArray(), $eventId);

        Log::info('Stripe webhook received and queued', [
            'event_id' => $eventId,
            'event_type' => $event->type,
        ]);

        return response()->json(['status' => 'success'], 200);
    }
}
