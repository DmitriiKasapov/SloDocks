<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Check if user has access (set by CheckServiceAccess middleware)
        $hasAccess = $request->attributes->get('has_access', false);
        $access = $request->attributes->get('access');
        $accessError = $request->attributes->get('access_error');

        return view('services.show', compact('service', 'hasAccess', 'access', 'accessError'));
    }
}
