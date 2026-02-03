<?php

namespace App\Http\Controllers;

use App\Models\MaterialBlock;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    public function download(Request $request, string $slug, int $blockId, int $fileIndex): StreamedResponse
    {
        if (!$request->attributes->get('has_access', false)) {
            abort(403);
        }

        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $block = MaterialBlock::where('id', $blockId)
            ->where('service_id', $service->id)
            ->whereIn('type', [MaterialBlock::TYPE_DOWNLOADS, MaterialBlock::TYPE_EXAMPLES])
            ->firstOrFail();

        $content = $block->content;

        // Extract file path from block content
        $files = $content['files'] ?? $content['examples'] ?? [];

        if (!isset($files[$fileIndex]['file'])) {
            abort(404);
        }

        $filePath = $files[$fileIndex]['file'];

        if (!$filePath || !Storage::disk('local')->exists($filePath)) {
            abort(404);
        }

        return Storage::disk('local')->download(
            $filePath,
            basename($filePath)
        );
    }
}
