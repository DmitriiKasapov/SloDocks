<?php

namespace App\Services;

use App\Models\Access;
use App\Models\Service;
use Carbon\Carbon;

class AccessService
{
    public function check(string $serviceSlug, ?string $token): AccessResult
    {
        if (!$token) {
            return AccessResult::noToken();
        }

        $service = Service::where('slug', $serviceSlug)
            ->where('is_active', true)
            ->first();

        if (!$service) {
            return AccessResult::invalidService();
        }

        $access = Access::where('service_id', $service->id)
            ->where('access_token', $token)
            ->first();

        if (!$access) {
            return AccessResult::invalidToken();
        }

        if (!$access->is_active) {
            return AccessResult::inactive();
        }

        if (Carbon::now()->greaterThanOrEqualTo($access->expires_at)) {
            return AccessResult::expired($access);
        }

        return AccessResult::valid($access);
    }
}
