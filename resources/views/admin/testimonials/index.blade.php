<x-admin-layout title="Testimonials">
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.testimonials.create') }}" class="rounded-lg bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400">
            Add testimonial
        </a>
    </div>

    <p class="mb-6 text-xs text-zinc-500">The testimonials section on the site stays hidden until you add at least one entry here — only add real client feedback.</p>

    @if ($testimonials->isEmpty())
        <p class="text-sm text-zinc-500">No testimonials yet.</p>
    @else
        <div class="divide-y divide-white/5 rounded-2xl border border-white/10 bg-white/[0.03]">
            @foreach ($testimonials as $testimonial)
                <div class="flex items-center justify-between gap-4 px-5 py-4">
                    <div>
                        <p class="text-sm font-medium text-white">{{ $testimonial->client_name }}</p>
                        <p class="text-xs text-zinc-500">
                            {{ $testimonial->client_position }}
                            @if ($testimonial->client_company)
                                &middot; {{ $testimonial->client_company }}
                            @endif
                        </p>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-zinc-400 hover:text-white">Edit</a>
                        <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Delete this testimonial?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-400 hover:text-rose-300">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-admin-layout>
