<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentRequest;
use App\Models\Service;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService
    ) {}

    /**
     * Create Stripe Checkout Session
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
