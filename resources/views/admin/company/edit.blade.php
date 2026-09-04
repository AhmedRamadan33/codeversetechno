<x-admin-layout title="Company">
    <form method="POST" action="{{ route('admin.company.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Company name</label>
                <input type="text" name="name" value="{{ old('name', $company->name) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                @error('name')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Industry</label>
                <input type="text" name="industry" value="{{ old('industry', $company->industry) }}"
                    placeholder="Software Development & Digital Solutions"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                @error('industry')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label class="mb-1 block text-xs font-medium text-zinc-400">Tagline</label>
            <input type="text" name="tagline" value="{{ old('tagline', $company->tagline) }}"
                class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        </div>

        <div>
            <label class="mb-1 block text-xs font-medium text-zinc-400">About us</label>
            <textarea name="about" rows="5"
                class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">{{ old('about', $company->about) }}</textarea>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Mission</label>
                <textarea name="mission" rows="3"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">{{ old('mission', $company->mission) }}</textarea>
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Vision</label>
                <textarea name="vision" rows="3"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">{{ old('vision', $company->vision) }}</textarea>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-4">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Founded year</label>
                <input type="number" name="founded_year" value="{{ old('founded_year', $company->founded_year) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Email</label>
                <input type="email" name="email" value="{{ old('email', $company->email) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $company->phone) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Location</label>
                <input type="text" name="location" value="{{ old('location', $company->location) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-3">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Facebook URL</label>
                <input type="url" name="facebook_url" value="{{ old('facebook_url', $company->facebook_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Instagram URL</label>
                <input type="url" name="instagram_url" value="{{ old('instagram_url', $company->instagram_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">LinkedIn URL</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $company->linkedin_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Twitter/X URL</label>
                <input type="url" name="twitter_url" value="{{ old('twitter_url', $company->twitter_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">WhatsApp URL</label>
                <input type="url" name="whatsapp_url" value="{{ old('whatsapp_url', $company->whatsapp_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $company->github_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Logo</label>
                @if ($company->logo_path)
                    <img src="{{ asset('storage/' . $company->logo_path) }}" class="mb-2 h-16 w-16 rounded-full object-cover">
                @endif
                <input type="file" name="logo" accept="image/*"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none file:mr-3 file:rounded-md file:border-0 file:bg-indigo-500 file:px-3 file:py-1.5 file:text-white">
                @error('logo')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Company brochure (PDF)</label>
                @if ($company->brochure_path)
                    <a href="{{ asset('storage/' . $company->brochure_path) }}" target="_blank" class="mb-2 block text-sm text-indigo-400 hover:text-indigo-300">Current brochure</a>
                @endif
                <input type="file" name="brochure" accept="application/pdf"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none file:mr-3 file:rounded-md file:border-0 file:bg-indigo-500 file:px-3 file:py-1.5 file:text-white">
                @error('brochure')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="border-t border-white/10 pt-6">
            <h2 class="mb-4 text-sm font-semibold text-white">Change admin password</h2>
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="mb-1 block text-xs font-medium text-zinc-400">New password</label>
                    <input type="password" name="new_password"
                        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                    @error('new_password')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-xs font-medium text-zinc-400">Confirm new password</label>
                    <input type="password" name="new_password_confirmation"
                        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                </div>
            </div>
            <p class="mt-2 text-xs text-zinc-500">Leave blank to keep your current password.</p>
        </div>

        <button type="submit" class="rounded-lg bg-indigo-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
            Save changes
        </button>
    </form>
</x-admin-layout>
