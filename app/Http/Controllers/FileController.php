<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    private const ALLOWED_FIELDS = [
        'hidden_file_path_1',
        'hidden_file_path_2',
    ];

    public function download(Request $request, string $slug, string $field): StreamedResponse
    {
        if (!in_array($field, self::ALLOWED_FIELDS, true)) {
            abort(404);
        }

        if (!$request->attributes->get('has_access', false)) {
            abort(403);
        }

        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $filePath = $service->{$field};

        if (!$filePath || !Storage::disk('local')->exists($filePath)) {
            abort(404);
        }

        return Storage::disk('local')->download(
            $filePath,
            basename($filePath),
            ['Content-Type' => 'application/pdf']
        );
    }
}
