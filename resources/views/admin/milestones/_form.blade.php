@php $milestone ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Title</label>
        <input type="text" name="title" value="{{ old('title', $milestone->title ?? '') }}"
            placeholder="Company founded"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('title')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Year</label>
        <input type="number" name="year" value="{{ old('year', $milestone->year ?? date('Y')) }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('year')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-zinc-400">Description</label>
    <textarea name="description" rows="4"
        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">{{ old('description', $milestone->description ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-zinc-400">Order</label>
    <input type="number" name="order" min="0" value="{{ old('order', $milestone->order ?? 0) }}"
        class="w-full max-w-40 rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-indigo-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
        Save
    </button>
    <a href="{{ route('admin.milestones.index') }}" class="text-sm text-zinc-500 hover:text-white">Cancel</a>
</div>
