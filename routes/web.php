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
})->name('terms');

Route::get('/privacy', function () {
    return view('legal.privacy');
})->name('privacy');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Protected by admin middleware (to be implemented)
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return "Admin Dashboard";
    })->name('dashboard');

    // Services CRUD
    Route::get('/services', function () {
        return "Admin Services List";
    })->name('services.index');

    Route::get('/services/create', function () {
        return "Admin Create Service";
    })->name('services.create');

    Route::get('/services/{id}/edit', function ($id) {
        return "Admin Edit Service {$id}";
    })->name('services.edit');

    // Purchases
    Route::get('/purchases', function () {
        return "Admin Purchases List";
    })->name('purchases.index');

    // Accesses
    Route::get('/accesses', function () {
        return "Admin Accesses List";
    })->name('accesses.index');

    Route::post('/accesses/{id}/resend-email', function ($id) {
        return "Resend email for access {$id}";
    })->name('accesses.resend');

    Route::post('/accesses/{id}/deactivate', function ($id) {
        return "Deactivate access {$id}";
    })->name('accesses.deactivate');
});
