<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentRequest;
use App\Models\Purchase;
use App\Models\Service;
use App\Services\AccessGrantService;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService
    ) {}

    /**
     * Create checkout session (Stripe or mock)
     */
    public function create(CreatePaymentRequest $request)
    {
        $service = Service::findOrFail($request->service_id);

        if (!$service->is_active) {
            return back()->with('error', 'Услуга временно недоступна');
        }

        try {
            $checkoutUrl = $this->paymentService->createCheckoutSession(
                $service
            );

            return redirect($checkoutUrl);
        } catch (\Exception $e) {
            logger()->error('Payment creation failed', [
                'service_id' => $service->id,
                'email' => $request->email,
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Не удалось создать платёж. Попробуйте позже.');
        }
    }

    /**
     * Mock checkout page (local payment simulation)
     */
    public function mockCheckout(Purchase $purchase)
    {
        abort_unless(config('stripe.mock'), 404);
        abort_if($purchase->status !== 'pending', 410);

        $service = $purchase->service;

        return view('pages.payment.mock-checkout', compact('purchase', 'service'));
    }

    /**
     * Process mock payment (simulate successful payment)
     */
    public function mockPay(Request $request, Purchase $purchase, AccessGrantService $accessGrantService)
    {
        abort_unless(config('stripe.mock'), 404);
        abort_if($purchase->status !== 'pending', 410);

        // Use rfc-only validation for mock endpoint (dns check can fail in non-production envs)
        $request->validate(['email' => ['required', 'email:rfc', 'max:255']]);

        $purchase->update(['status' => 'paid', 'email' => $request->email]);

        activity_log('payment_success', $purchase->email, [
            'amount' => $purchase->amount,
            'mock' => true,
        ], serviceId: $purchase->service_id, purchaseId: $purchase->id);

        $access = $accessGrantService->grantAccess($purchase);

        return redirect()->route('payment.success', [
            'session_id' => $purchase->payment_id,
            'token' => $access->access_token,
        ]);
    }

    /**
     * Payment success callback
     */
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $token = $request->query('token');

        // Try to find the access and related service for the "go to materials" link
        $access = null;
        if ($token) {
            $access = \App\Models\Access::with('service')
                ->where('access_token', $token)
                ->where('is_active', true)
                ->first();
        }

        return view('pages.payment.success', [
            'sessionId' => $sessionId,
            'access' => $access,
        ]);
    }

    /**
     * Payment cancel callback
     */
    public function cancel()
    {
        return view('pages.payment.cancel');
    }
}
