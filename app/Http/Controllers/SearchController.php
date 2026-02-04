<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display search results page
     */
    public function index(Request $request)
    {
        $query = $request->input('q', '');
        $query = trim($query);

        // If no query provided, show empty search page
        if (empty($query)) {
            return view('pages.search', [
                'query' => '',
                'results' => collect(),
                'total' => 0,
            ]);
        }

        // Validate query length
        $request->validate([
            'q' => 'string|min:2|max:100',
        ], [
            'q.min' => 'Запрос должен содержать минимум 2 символа',
            'q.max' => 'Запрос слишком длинный (максимум 100 символов)',
        ]);

        // Search for services
        $results = $this->searchServices($query);

        return view('pages.search', [
            'query' => $query,
            'results' => $results,
            'total' => $results->total(),
        ]);
    }

    /**
     * Search services by query
     */
    private function searchServices(string $query)
    {
        // Escape special characters for LIKE query
        $searchTerm = $this->escapeLike($query);

        return Service::query()
            ->with(['category', 'tags'])
            ->where('is_active', true)
            ->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('seo_title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description_public', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('seo_description', 'LIKE', "%{$searchTerm}%")
                  // Search in category name
                  ->orWhereHas('category', function ($categoryQuery) use ($searchTerm) {
                      $categoryQuery->where('name', 'LIKE', "%{$searchTerm}%");
                  })
                  // Search in tags
                  ->orWhereHas('tags', function ($tagQuery) use ($searchTerm) {
                      $tagQuery->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            })
            // Ranking: title matches first, then seo_title, then descriptions
            ->orderByRaw(
                "CASE
                    WHEN title LIKE ? THEN 1
                    WHEN seo_title LIKE ? THEN 2
                    ELSE 3
                END",
                ["%{$searchTerm}%", "%{$searchTerm}%"]
            )
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString(); // Preserve query parameters in pagination
    }

    /**
     * Escape special LIKE characters to prevent SQL injection
     */
    private function escapeLike(string $value): string
    {
        return str_replace(
            ['%', '_', '\\'],
            ['\\%', '\\_', '\\\\'],
            $value
        );
    }
}
