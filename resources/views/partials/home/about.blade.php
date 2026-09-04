@php
    $whyChooseUs = [
        'Clean, well-tested code following MVC and modern architecture principles',
        'Secure by design — authentication, authorization, and role-based access control on every project',
        'Scalable systems built to grow with your business, from MVP to enterprise scale',
        'Direct communication with the engineers building your product, start to finish',
    ];
@endphp
<div class="reveal relative mx-4 xxl:mx-auto xxl:max-w-[1320px] -bottom-20 lg:-bottom-28 z-10 rounded-2xl bg-white drop-shadow-2xl max-xl:mb-5 shadow-white xl:p-28 lg:p-20 md:p-16 sm:p-10 p-4" id="about">
    <div class="flex max-md:flex-col justify-between items-center gap-6">
        <div class="xxl:max-w-106 w-auto h-auto xxl:max-h-126">
            <div class="max-w-106 h-117 w-full overflow-hidden rounded-xl bg-soft-white center">
                @if ($company?->logo_path)
                    <img class="h-full w-full object-cover" src="{{ asset('storage/' . $company->logo_path) }}" alt="{{ $company->name }}">
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

            <div class="mt-8 space-y-3">
                @foreach ($whyChooseUs as $point)
                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 shrink-0 flex h-5 w-5 items-center justify-center rounded-full bg-picto-primary/15 text-picto-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5"/>
                            </svg>
                        </span>
                        <p class="text-[13px] xs:text-[15px] text-gray-600">{{ $point }}</p>
                    </div>
                @endforeach
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
