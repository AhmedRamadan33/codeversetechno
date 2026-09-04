<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'industry',
        'tagline',
        'about',
        'mission',
        'vision',
        'founded_year',
        'projects_delivered',
        'client_rating',
        'support_hours',
        'navbar_logo_path',
        'footer_logo_path',
        'hero_image_path',
        'about_image_path',
        'brochure_path',
        'email',
        'phone',
        'location',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'twitter_url',
        'whatsapp_url',
        'github_url',
    ];

    protected function casts(): array
    {
        return [
            'founded_year' => 'integer',
            'projects_delivered' => 'integer',
            'client_rating' => 'float',
        ];
    }
}
