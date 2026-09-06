<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SeoController extends Controller
{
    public function robots(): Response
    {
        $lines = [
            'User-agent: *',
            'Disallow: /admin',
            'Allow: /',
            '',
            'Sitemap: ' . url('/sitemap.xml'),
        ];

        return response(implode("\n", $lines) . "\n")
            ->header('Content-Type', 'text/plain');
    }

    public function sitemap(): Response
    {
        $lastmod = Project::query()->max('updated_at')
            ?? Company::query()->max('updated_at')
            ?? now();

        $xml = view('sitemap', [
            'lastmod' => Carbon::parse($lastmod)->toAtomString(),
        ])->render();

        return response($xml)->header('Content-Type', 'application/xml');
    }
}
