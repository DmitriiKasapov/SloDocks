<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $service = Service::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $access = $this->resolveAccess($request, $service);
        $hasAccess = $access !== null;

        $response = response(view('pages.services.show', compact('service', 'hasAccess', 'access')));

        // Save token to cookie on first visit via link
        if ($access && $request->query('token')) {
            $minutes = (int) now()->diffInMinutes($access->expires_at);
            $response->cookie(
                "access_{$service->id}",
                $access->access_token,
                $minutes,
                '/',
                null,
                true,  // secure
                true   // httpOnly
            );
        }

        return $response;
    }

    public function showContent(Request $request, string $slug)
    {
        $service = Service::with('contentBlocks')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $access = $this->resolveAccess($request, $service);

        if (!$access) {
            return redirect()->route('services.show', $slug)
                ->with('error', 'Доступ к материалам закрыт');
        }

        $response = response(view('pages.services.content-blocks', compact('service', 'access')));

        // Save token to cookie on first visit via link
        if ($request->query('token')) {
            $minutes = (int) now()->diffInMinutes($access->expires_at);
            $response->cookie(
                "access_{$service->id}",
                $access->access_token,
                $minutes,
                '/',
                null,
                true,
                true
            );
        }

        return $response;
    }

    /**
     * Find valid access by query token or cookie token
     */
    private function resolveAccess(Request $request, Service $service): ?Access
    {
        $token = $request->query('token') ?? $request->cookie("access_{$service->id}");

        if (!$token) {
            return null;
        }

        return Access::where('service_id', $service->id)
            ->where('access_token', $token)
            ->where('is_active', true)
            ->where('expires_at', '>', now())
            ->first();
    }
}
