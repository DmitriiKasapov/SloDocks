<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page - list of services
Route::get('/', function () {
    $categories = \App\Models\Category::with(['services' => function ($query) {
        $query->where('is_active', true);
    }])
    ->whereHas('services', function ($query) {
        $query->where('is_active', true);
    })
    ->orderBy('order', 'asc')
    ->get();

    // Legacy variable for backward compatibility
    $services = \App\Models\Service::where('is_active', true)->get();

    return view('pages.home', compact('categories', 'services'));
})->name('home');

// Search page
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])
    ->name('search');

// Service page - public description
Route::get('/services/{slug}', [App\Http\Controllers\ServiceController::class, 'show'])
    ->name('services.show');

// TEMPORARY: Grant temporary access for frontend testing
Route::post('/services/{slug}/grant-temp-access', [App\Http\Controllers\ServiceController::class, 'grantTempAccess'])
    ->name('services.grant-temp-access');

// TEMPORARY: Content page (will be protected by token later)
Route::get('/services/{slug}/content', [App\Http\Controllers\ServiceController::class, 'showContent'])
    ->name('services.content');

// TEMPORARY: Revoke temporary access
Route::post('/services/{slug}/revoke-temp-access', [App\Http\Controllers\ServiceController::class, 'revokeTempAccess'])
    ->name('services.revoke-temp-access');

// Protected file download (requires valid access token)
Route::get('/services/{slug}/file/{blockId}/{fileIndex}', [App\Http\Controllers\FileController::class, 'download'])
    ->middleware(\App\Http\Middleware\CheckServiceAccess::class)
    ->name('services.file');

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
*/

// Create Stripe Checkout Session
Route::post('/payment/create', [App\Http\Controllers\PaymentController::class, 'create'])
    ->middleware('throttle:10,1')
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
    return view('pages.legal.terms');
})->name('legal.terms');

Route::get('/privacy', function () {
    return view('pages.legal.privacy');
})->name('legal.privacy');

// Test page for button comparison
Route::get('/test', function () {
    return view('pages.test');
})->name('test');

/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
*/

Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])
    ->name('sitemap');

// Admin panel handled by Filament at /admin
