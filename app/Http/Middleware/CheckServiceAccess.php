<?php

namespace App\Http\Middleware;

use App\Services\AccessService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckServiceAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');

        // Resolve token from query param or cookie (cookie is set on first visit via link)
        $serviceId = \App\Models\Service::where('slug', $slug)->value('id');
        $token = $request->query('token') ?? ($serviceId ? $request->cookie("access_{$serviceId}") : null);

        // If no token provided, continue (will show public version)
        if (!$token) {
            return $next($request);
        }

        // Check access validity
        $accessService = app(AccessService::class);
        $result = $accessService->check($slug, $token);

        // Add access result to request attributes
        if ($result->isValid()) {
            $request->attributes->add([
                'access' => $result->access,
                'has_access' => true,
            ]);
        } else {
            // Token provided but invalid/expired
            $request->attributes->add([
                'access' => null,
                'has_access' => false,
                'access_error' => $result->status,
            ]);
        }

        return $next($request);
    }
}
