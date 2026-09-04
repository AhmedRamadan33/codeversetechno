@php
    $statCards = array_filter([
        ($stats['years'] ?? 0) > 0 ? ['value' => $stats['years'].'+', 'label' => 'Years Building Software'] : null,
        ($stats['projects'] ?? 0) > 0 ? ['value' => $stats['projects'].'+', 'label' => 'Projects Delivered'] : null,
        ($stats['technologies'] ?? 0) > 0 ? ['value' => $stats['technologies'].'+', 'label' => 'Technologies Mastered'] : null,
        ($stats['industries'] ?? 0) > 0 ? ['value' => $stats['industries'], 'label' => 'Industries Served'] : null,
    ]);
@endphp

@if (!empty($statCards))
<div class="reveal bg-[#132238]">
    <div class="content py-16 md:py-20 px-2 max-xxl:px-4">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach ($statCards as $card)
                <div>
                    <p class="text-4xl md:text-5xl font-bold text-white">{{ $card['value'] }}</p>
                    <p class="mt-2 text-xs md:text-sm text-[#A5ACB5]">{{ $card['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
