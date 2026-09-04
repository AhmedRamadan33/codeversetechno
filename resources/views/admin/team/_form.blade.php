@php $member ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Name</label>
        <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('name')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Position</label>
        <input type="text" name="position" value="{{ old('position', $member->position ?? '') }}"
            placeholder="Founder & Lead Developer"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('position')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-zinc-400">Bio</label>
    <textarea name="bio" rows="4"
        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">{{ old('bio', $member->bio ?? '') }}</textarea>
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-3">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Email</label>
        <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('email')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">LinkedIn URL</label>
        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $member->linkedin_url ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('linkedin_url')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $member->order ?? 0) }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-zinc-400">Photo</label>
    @if (!empty($member->photo_path))
        <img src="{{ asset('storage/' . $member->photo_path) }}" class="mb-2 h-16 w-16 rounded-full object-cover">
    @endif
    <input type="file" name="photo" accept="image/*"
        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none file:mr-3 file:rounded-md file:border-0 file:bg-indigo-500 file:px-3 file:py-1.5 file:text-white">
    @error('photo')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-indigo-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
        Save
    </button>
    <a href="{{ route('admin.team.index') }}" class="text-sm text-zinc-500 hover:text-white">Cancel</a>
</div>
