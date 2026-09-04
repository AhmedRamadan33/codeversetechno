<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $company = Company::first();
        $skills = Skill::ordered()->get()->groupBy('category');
        $projects = Project::ordered()->get();
        $testimonials = Testimonial::ordered()->get();

        $stats = [
            'years' => $company?->founded_year ? max(1, (int) date('Y') - (int) $company->founded_year) : null,
            'projects' => $company->projects_delivered,
            'technologies' => Skill::count(),
            'industries' => $projects->pluck('industry')->filter()->unique()->count(),
            'rating' => $company->client_rating,
            'support' => $company->support_hours,
        ];

        return view('home', compact('company', 'skills', 'projects', 'testimonials', 'stats'));
    }
}
