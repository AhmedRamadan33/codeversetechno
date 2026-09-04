<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Maps each upload input name to the Company column it fills.
     */
    private const IMAGE_FIELDS = [
        'navbar_logo' => 'navbar_logo_path',
        'footer_logo' => 'footer_logo_path',
        'hero_image' => 'hero_image_path',
        'about_image' => 'about_image_path',
    ];

    public function edit(): View
    {
        $company = Company::firstOrNew();

        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'about' => ['nullable', 'string', 'max:5000'],
            'mission' => ['nullable', 'string', 'max:2000'],
            'vision' => ['nullable', 'string', 'max:2000'],
            'founded_year' => ['nullable', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'projects_delivered' => ['nullable', 'integer', 'min:0'],
            'client_rating' => ['nullable', 'numeric', 'min:0', 'max:5'],
            'support_hours' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'location' => ['nullable', 'string', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'whatsapp_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'navbar_logo' => ['nullable', 'image', 'max:4096'],
            'footer_logo' => ['nullable', 'image', 'max:4096'],
            'hero_image' => ['nullable', 'image', 'max:4096'],
            'about_image' => ['nullable', 'image', 'max:4096'],
            'brochure' => ['nullable', 'mimes:pdf', 'max:8192'],
        ]);

        $company = Company::firstOrNew();

        foreach (self::IMAGE_FIELDS as $input => $column) {
            if ($request->hasFile($input)) {
                if ($company->{$column}) {
                    Storage::disk('public')->delete($company->{$column});
                }
                $data[$column] = $request->file($input)->store('company', 'public');
            }
        }

        if ($request->hasFile('brochure')) {
            if ($company->brochure_path) {
                Storage::disk('public')->delete($company->brochure_path);
            }
            $data['brochure_path'] = $request->file('brochure')->store('company', 'public');
        }

        $company->fill($data)->save();

        if ($request->filled('new_password')) {
            $request->validate([
                'new_password' => ['confirmed', 'min:8'],
            ]);

            Auth::user()->update([
                'password' => Hash::make($request->input('new_password')),
            ]);
        }

        return back()->with('status', 'Company info updated.');
    }
}
