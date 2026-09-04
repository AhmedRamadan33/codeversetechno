@php
    $categoryLabels = [
        'backend' => 'Backend',
        'frontend' => 'Frontend',
        'database' => 'Database',
        'tools' => 'Tools & DevOps',
        'other' => 'Other',
    ];
@endphp
<div class="reveal content px-2 py-10 md:py-15 lg:py-25 max-xxl:px-4" id="technologies">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Technologies We Use</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            A modern, reliable stack our team uses to design, build, and ship production-ready systems.
        </p>
    </div>

    @if ($skills->isEmpty())
        <p class="text-center text-gray-400">Technologies will show up here once added from the admin panel.</p>
    @else
        <div class="mx-auto max-w-218 space-y-8">
            @foreach ($skills as $category => $items)
                <div>
                    <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-gray-400">{{ $categoryLabels[$category] ?? ucfirst($category) }}</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($items as $skill)
                            <span class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 shadow-sm hover:border-picto-primary hover:text-picto-primary transition-colors">
                                @if ($skill->icon)<span>{{ $skill->icon }}</span>@endif
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
