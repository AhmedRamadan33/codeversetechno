<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Milestone;
use App\Models\Project;
use App\Models\Skill;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $company = Company::first();
        $skills = Skill::ordered()->get()->groupBy('category');
        $projects = Project::ordered()->get();
        $team = TeamMember::ordered()->get();
        $milestones = Milestone::ordered()->get();
        $testimonials = Testimonial::ordered()->get();

        $stats = [
            'years' => $company?->founded_year ? max(1, (int) date('Y') - (int) $company->founded_year) : null,
            'projects' => $projects->count(),
            'technologies' => Skill::count(),
            'industries' => $projects->pluck('industry')->filter()->unique()->count(),
        ];

        return view('home', compact('company', 'skills', 'projects', 'team', 'milestones', 'testimonials', 'stats'));
    }
}
