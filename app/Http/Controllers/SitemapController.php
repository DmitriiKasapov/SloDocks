<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $services = Service::where('is_active', true)
            ->orderBy('updated_at', 'desc')
            ->get();

        $xml = $this->generateSitemap($services);

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    private function generateSitemap($services): string
    {
        $baseUrl = config('app.url');
        $now = now()->toIso8601String();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Home page
        $xml .= $this->buildUrl($baseUrl, $now, '1.0', 'daily');

        // Active services
        foreach ($services as $service) {
            $url = $baseUrl . '/services/' . $service->slug;
            $lastmod = $service->updated_at->toIso8601String();
            $xml .= $this->buildUrl($url, $lastmod, '0.8', 'weekly');
        }

        // Legal pages
        $xml .= $this->buildUrl($baseUrl . '/terms', $now, '0.3', 'monthly');
        $xml .= $this->buildUrl($baseUrl . '/privacy', $now, '0.3', 'monthly');

        $xml .= '</urlset>';

        return $xml;
    }

    private function buildUrl(string $loc, string $lastmod, string $priority, string $changefreq): string
    {
        return sprintf(
            "  <url>\n    <loc>%s</loc>\n    <lastmod>%s</lastmod>\n    <changefreq>%s</changefreq>\n    <priority>%s</priority>\n  </url>\n",
            htmlspecialchars($loc),
            $lastmod,
            $changefreq,
            $priority
        );
    }
}
