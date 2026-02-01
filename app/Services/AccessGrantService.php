<?php

namespace App\Services;

use App\Jobs\SendAccessEmail;
use App\Models\Access;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AccessGrantService
{
    /**
     * Grant access to a service after successful payment
     */
    public function grantAccess(Purchase $purchase): Access
    {
        return DB::transaction(function () use ($purchase) {
            // Check if access already exists (idempotency)
            $existingAccess = Access::where('purchase_id', $purchase->id)->first();

            if ($existingAccess) {
                Log::info('Access already granted', [
                    'purchase_id' => $purchase->id,
                    'access_id' => $existingAccess->id,
                ]);
                return $existingAccess;
            }

            // Generate unique access token
            $accessToken = $this->generateAccessToken();

            // Get service to determine access duration
            $service = $purchase->service;

            // Create access record
            $access = Access::create([
                'service_id' => $purchase->service_id,
                'purchase_id' => $purchase->id,
                'email' => $purchase->email,
                'access_token' => $accessToken,
                'starts_at' => now(),
                'expires_at' => now()->addDays($service->access_duration_days),
                'is_active' => true,
            ]);

            // Update or create User statistics
            $this->updateUserStatistics($purchase->email);

            // Log activity
            activity_log('access_granted', $purchase->email, [
                'access_id' => $access->id,
                'expires_at' => $access->expires_at->toDateTimeString(),
            ], serviceId: $service->id, purchaseId: $purchase->id);

            // Dispatch email job
            SendAccessEmail::dispatch($access);

            Log::info('Access granted successfully', [
                'access_id' => $access->id,
                'email' => $purchase->email,
                'expires_at' => $access->expires_at,
            ]);

            return $access;
        });
    }

    /**
     * Generate a secure unique access token
     */
    private function generateAccessToken(): string
    {
        do {
            $token = Str::random(64);
        } while (Access::where('access_token', $token)->exists());

        return $token;
    }

    /**
     * Update user statistics
     */
    private function updateUserStatistics(string $email): void
    {
        $user = User::firstOrNew(['email' => $email]);

        if ($user->exists) {
            // Update existing user
            $user->increment('purchases_count');
            $user->last_purchase_at = now();
        } else {
            // Create new user record
            $user->first_purchase_at = now();
            $user->last_purchase_at = now();
            $user->purchases_count = 1;
        }

        $user->save();
    }
}
