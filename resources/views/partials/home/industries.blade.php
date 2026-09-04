@php
    $industryMeta = [
        'Enterprise & Business' => [
            'description' => 'ERP, CRM, and internal operations platforms that streamline finance, inventory, and workflow management.',
            'svgPath' => 'M4 21V8l8-5 8 5v13h-5v-7H9v7H4Z',
        ],
        'Education' => [
            'description' => 'Learning management systems with course delivery, assessments, certification, and live class integrations.',
            'svgPath' => 'M12 3 1 9l11 6 9-4.91V17h2V9L12 3Zm0 13.35L4 12.1V17c0 2.21 3.58 4 8 4s8-1.79 8-4v-4.9l-8 4.25Z',
        ],
        'Healthcare' => [
            'description' => 'Clinic and patient management platforms covering scheduling, records, and diagnostics with strict data privacy.',
            'svgPath' => 'M19 8h-3V5a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v3H5a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h3v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3h3a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1Z',
        ],
        'Legal' => [
            'description' => 'Case and practice management systems for law firms, with client portals and document workflows.',
            'svgPath' => 'M12 3 2 8l10 5 8-4v6h2V8L12 3ZM4 15v3c0 1.66 3.58 3 8 3s8-1.34 8-3v-3l-8 4-8-4Z',
        ],
    ];

    $industries = $projects->pluck('industry')->filter()->unique()->values();
@endphp

@if ($industries->isNotEmpty())
<div class="reveal content px-2 pt-20 md:pt-30 pb-10 md:pb-15 max-xxl:px-4">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Industries We Serve</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            Real platforms delivered for real businesses across these sectors.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($industries as $industry)
            @php $meta = $industryMeta[$industry] ?? ['description' => 'Custom software solutions tailored to this sector.', 'svgPath' => 'M4 21V8l8-5 8 5v13h-5v-7H9v7H4Z']; @endphp
            <div class="p-6 bg-white shadow-gray-300 shadow-lg rounded-lg text-center">
                <div class="mx-auto w-14 h-14 bg-[#EDD8FF80] center rounded-md">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                        <path d="{{ $meta['svgPath'] }}" class="fill-picto-primary" />
                    </svg>
                </div>
                <p class="mt-4 font-semibold text-gray-900">{{ $industry }}</p>
                <p class="mt-2 text-[13px] text-gray-500 leading-relaxed">{{ $meta['description'] }}</p>
            </div>
        @endforeach
    </div>
</div>
@endif
