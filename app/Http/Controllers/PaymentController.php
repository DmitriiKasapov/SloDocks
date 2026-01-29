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
                $service,
                $request->email
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

        return view('payment.mock-checkout', compact('purchase', 'service'));
    }

    /**
     * Process mock payment (simulate successful payment)
     */
    public function mockPay(Purchase $purchase, AccessGrantService $accessGrantService)
    {
        abort_unless(config('stripe.mock'), 404);
        abort_if($purchase->status !== 'pending', 410);

        $purchase->update(['status' => 'paid']);

        activity_log('payment_success', $purchase->email, [
            'purchase_id' => $purchase->id,
            'service_id' => $purchase->service_id,
            'amount' => $purchase->amount,
            'mock' => true,
        ]);

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

        return view('payment.success', [
            'sessionId' => $sessionId,
        ]);
    }

    /**
     * Payment cancel callback
     */
    public function cancel()
    {
        return view('payment.cancel');
    }
}
