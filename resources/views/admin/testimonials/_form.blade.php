@php $testimonial ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Client name</label>
        <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('client_name')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Client company</label>
        <input type="text" name="client_company" value="{{ old('client_company', $testimonial->client_company ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('client_company')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-zinc-400">Client position</label>
    <input type="text" name="client_position" value="{{ old('client_position', $testimonial->client_position ?? '') }}"
        placeholder="CEO, Product Manager..."
        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-zinc-400">Quote</label>
    <textarea name="quote" rows="4"
        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">{{ old('quote', $testimonial->quote ?? '') }}</textarea>
    @error('quote')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-3">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Rating (1-5)</label>
        <input type="number" name="rating" min="1" max="5" value="{{ old('rating', $testimonial->rating ?? 5) }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $testimonial->order ?? 0) }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-zinc-400">Client photo</label>
    @if (!empty($testimonial->avatar_path))
        <img src="{{ asset('storage/' . $testimonial->avatar_path) }}" class="mb-2 h-16 w-16 rounded-full object-cover">
    @endif
    <input type="file" name="avatar" accept="image/*"
        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none file:mr-3 file:rounded-md file:border-0 file:bg-indigo-500 file:px-3 file:py-1.5 file:text-white">
    @error('avatar')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-indigo-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
        Save
    </button>
    <a href="{{ route('admin.testimonials.index') }}" class="text-sm text-zinc-500 hover:text-white">Cancel</a>
</div>
