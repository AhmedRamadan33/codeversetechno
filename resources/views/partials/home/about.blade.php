<div class="reveal relative mx-4 xxl:mx-auto xxl:max-w-[1320px] z-10 rounded-2xl bg-white drop-shadow-2xl max-xl:mb-5 shadow-white xl:p-28 lg:p-20 md:p-16 sm:p-10 p-4" id="about">
    <div class="flex max-md:flex-col justify-between items-center gap-6">
        <div class="xxl:max-w-106 w-auto h-auto xxl:max-h-126">
            <div class="max-w-106 aspect-[5/4] md:aspect-auto md:h-117 w-full overflow-hidden rounded-xl bg-soft-white center">
                @if ($company?->about_image_path)
                    <img class="h-full w-full object-cover" src="{{ asset('storage/' . $company->about_image_path) }}" alt="{{ $company->name }}">
                @else
                    <span class="text-6xl font-bold text-picto-primary/20">
                        {{ collect(explode(' ', $company->name ?? 'Y C'))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                    </span>
                @endif
            </div>
            <div class="relative bottom-9">
                <div class="flex justify-center">
                    <div class="px-6 max-w-66 py-3 z-50 text-center bg-white rounded-[4px] center shadow-2xl drop-shadow-2xl shadow-white">
                        <x-social-media :company="$company" />
                    </div>
                </div>
            </div>
        </div>

        <div class="max-sm:w-full w-[33rem]">
            <h2 class="text-2xl xxs:text-3xl sm:text-4xl lg:text-[38px] text-[min(24px,38px)] max-md:text-center font-semibold mb-8">
                About {{ $company->name ?? 'Us' }}
            </h2>
            <div class="text-xs xs:text-[16px] lg:text-lg font-normal text-gray-600">
                @if ($company?->about)
                    @foreach (explode("\n", $company->about) as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p class="mt-3 first:mt-0">{{ $paragraph }}</p>
                        @endif
                    @endforeach
                @else
                    <p>Company description coming soon — edit this from the admin panel.</p>
                @endif
            </div>

            @if ($company?->mission || $company?->vision)
                <div class="mt-8 grid gap-6 sm:grid-cols-2 border-t border-gray-100 pt-6">
                    @if ($company?->mission)
                        <div>
                            <p class="text-sm font-semibold text-picto-primary uppercase tracking-wide">Our Mission</p>
                            <p class="mt-2 text-xs xs:text-[15px] text-gray-600">{{ $company->mission }}</p>
                        </div>
                    @endif
                    @if ($company?->vision)
                        <div>
                            <p class="text-sm font-semibold text-picto-primary uppercase tracking-wide">Our Vision</p>
                            <p class="mt-2 text-xs xs:text-[15px] text-gray-600">{{ $company->vision }}</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
