@php
    $statCards = array_filter([
        ($stats['years'] ?? 0) > 0 ? ['value' => $stats['years'].'+', 'label' => 'Years Building Software'] : null,
        ($stats['projects'] ?? 0) > 0 ? ['value' => $stats['projects'].'+', 'label' => 'Projects Delivered'] : null,
        ($stats['rating'] ?? 0) > 0 ? ['value' => number_format($stats['rating'], 1).'/5', 'label' => 'Client Rating'] : null,
        !empty($stats['support']) ? ['value' => $stats['support'], 'label' => 'Technical Support'] : null,
    ]);
@endphp

@if (!empty($statCards))
<div class="reveal bg-[#132238]">
    <div class="content py-16 md:py-20 px-2 max-xxl:px-4">
        <div class="flex flex-wrap justify-center gap-x-16 md:gap-x-24 gap-y-10 text-center">
            @foreach ($statCards as $card)
                <div class="min-w-32">
                    <p class="text-4xl md:text-5xl font-bold text-white">{{ $card['value'] }}</p>
                    <p class="mt-2 text-xs md:text-sm text-[#A5ACB5]">{{ $card['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
