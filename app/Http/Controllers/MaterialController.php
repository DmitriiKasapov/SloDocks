<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $material = Material::with('activeBlocks')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('pages.materials.show', compact('material'));
    }
}
