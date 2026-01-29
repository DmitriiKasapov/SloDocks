<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page - list of services
Route::get('/', function () {
    $services = \App\Models\Service::where('is_active', true)->get();
    return view('home', compact('services'));
})->name('home');

// Service page - public description + paid content (with token)
Route::get('/services/{slug}', [App\Http\Controllers\ServiceController::class, 'show'])
    ->middleware(\App\Http\Middleware\CheckServiceAccess::class)
    ->name('services.show');

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
*/

// Create Stripe Checkout Session
Route::post('/payment/create', [App\Http\Controllers\PaymentController::class, 'create'])
    ->name('payment.create');

// Payment success callback
Route::get('/payment/success', [App\Http\Controllers\PaymentController::class, 'success'])
    ->name('payment.success');

// Payment cancel callback
Route::get('/payment/cancel', [App\Http\Controllers\PaymentController::class, 'cancel'])
    ->name('payment.cancel');

// Mock payment routes (local testing only)
Route::get('/payment/mock/{purchase}', [App\Http\Controllers\PaymentController::class, 'mockCheckout'])
    ->name('payment.mock.checkout');
Route::post('/payment/mock/{purchase}/pay', [App\Http\Controllers\PaymentController::class, 'mockPay'])
    ->name('payment.mock.pay');

/*
|--------------------------------------------------------------------------
| Webhook Routes
|--------------------------------------------------------------------------
*/

// Stripe webhook endpoint
Route::post('/webhooks/stripe', [App\Http\Controllers\WebhookController::class, 'handleStripe'])
    ->name('webhooks.stripe');

/*
|--------------------------------------------------------------------------
| Legal Pages
|--------------------------------------------------------------------------
*/

Route::get('/terms', function () {
    return view('legal.terms');
})->name('legal.terms');

Route::get('/privacy', function () {
    return view('legal.privacy');
})->name('legal.privacy');

// Admin panel handled by Filament at /admin
