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
        'logo_path',
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
        ];
    }
}
