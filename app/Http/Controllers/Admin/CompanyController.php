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
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'location' => ['nullable', 'string', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'whatsapp_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'logo' => ['nullable', 'image', 'max:4096'],
            'brochure' => ['nullable', 'mimes:pdf', 'max:8192'],
        ]);

        $company = Company::firstOrNew();

        if ($request->hasFile('logo')) {
            if ($company->logo_path) {
                Storage::disk('public')->delete($company->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('company', 'public');
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
