<div class="reveal content px-2 pb-10 md:pb-15 lg:pb-25 max-xxl:px-4" id="milestones">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Our Journey</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            Key milestones along the way.
        </p>
    </div>

    @if ($milestones->isEmpty())
        <p class="text-center text-gray-400">Milestones will show up here once added from the admin panel.</p>
    @else
        <div class="mx-auto max-w-218 grid gap-6 sm:grid-cols-2">
            @foreach ($milestones as $milestone)
                <div class="p-4 xs:p-8 bg-white shadow-gray-300 shadow-lg rounded-lg">
                    <p class="text-[13px] font-medium text-gray-400">{{ $milestone->year }}</p>
                    <p class="mt-1 text-lg sm:text-xl font-semibold text-gray-900">{{ $milestone->title }}</p>
                    @if ($milestone->description)
                        <p class="mt-2 text-gray-600">{{ $milestone->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
