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

        // TEMPORARY: Check for temporary session access (for frontend development)
        $tempAccessKey = 'temp_access_' . $service->id;
        $hasAccess = $request->session()->get($tempAccessKey, false);

        return view('pages.services.show', compact('service', 'hasAccess'));
    }

    // TEMPORARY: Grant temporary access for frontend testing
    public function grantTempAccess(Request $request, string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $tempAccessKey = 'temp_access_' . $service->id;
        $request->session()->put($tempAccessKey, true);

        return redirect()->route('services.show', $slug);
    }

    // TEMPORARY: Show content page (will be protected by token later)
    public function showContent(Request $request, string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // TEMPORARY: Check temporary access
        $tempAccessKey = 'temp_access_' . $service->id;
        $hasAccess = $request->session()->get($tempAccessKey, false);

        if (!$hasAccess) {
            return redirect()->route('services.show', $slug)
                ->with('error', 'Доступ к материалам закрыт');
        }

        return view('pages.services.content', compact('service'));
    }

    // TEMPORARY: Revoke temporary access
    public function revokeTempAccess(Request $request, string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $tempAccessKey = 'temp_access_' . $service->id;
        $request->session()->forget($tempAccessKey);

        return redirect()->route('services.show', $slug)
            ->with('success', 'Доступ отозван');
    }
}
