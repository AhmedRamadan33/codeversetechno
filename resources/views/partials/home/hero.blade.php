<div class="flex max-lg:flex-col-reverse sm:justify-between pt-10 lg:mb-27.5 max-xl:gap-2 p-2 max-xxl:px-4 xxl:max-w-[1320px] xxl:mx-auto introduction-profile-background" id="introduction">
    <div class="w-full flex flex-col justify-start max-lg:text-center">
        <div class="pt-12 lg:pt-24 me-31.5 w-full lg:w-auto transition-all duration-500">
            <p class="text-picto-primary font-semibold text-sm xxs:text-base mb-3 tracking-wide uppercase">
                {{ $company->name ?? 'Your Company' }} &middot; {{ $company->industry ?? 'Software Development' }}
            </p>
            <p class="text-3xl xxs:text-4xl sm:max-xl:text-5xl xl:text-6xl font-semibold w-full leading-tight">
                We Engineer Software That Powers Your Business
            </p>
            <p class="text-xs xxs:text-lg lg:text-[18px] my-6 text-gray-600">
                {{ $company->tagline ?? 'We design, build, and scale reliable backend systems and web platforms for ambitious businesses.' }}
                @if ($company?->location)
                    Based in <span class="bg-highlight">{{ $company->location }}</span>, working with clients everywhere.
                @endif
            </p>
            <div class="flex max-md:justify-center gap-4">
                <a class="btn xxs:btn-lg px-6 max-xs:px-2 xxs:py-3 btn-primary text-xs xxs:text-[14px] sm:text-[16px]" href="#contact">
                    Start a Project
                </a>
                <a class="btn xxs:btn-lg px-6 max-xs:px-2 xxs:py-3 hover:border-picto-primary bg-white duration-300 transition-all hover:text-picto-primary text-xs xxs:text-[14px] sm:text-[16px]" href="#portfolio">
                    View Our Work
                </a>
            </div>
            @if ($company?->brochure_path)
                <p class="mt-4 text-center lg:text-start">
                    <a href="{{ asset('storage/' . $company->brochure_path) }}" target="_blank"
                        class="inline-flex items-center gap-1.5 text-xs xxs:text-sm text-gray-500 hover:text-picto-primary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 15V3m0 12-4-4m4 4 4-4M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/>
                        </svg>
                        Download Company Profile
                    </a>
                </p>
            @endif
        </div>

        @php
            $heroStatCards = array_filter([
                ($stats['years'] ?? 0) > 0 ? ['value' => $stats['years'].'+', 'label' => 'Years Building Software'] : null,
                ($stats['projects'] ?? 0) > 0 ? ['value' => $stats['projects'].'+', 'label' => 'Projects Delivered'] : null,
                ($stats['rating'] ?? 0) > 0 ? ['value' => number_format($stats['rating'], 1).'/5', 'label' => 'Client Rating'] : null,
            ]);
        @endphp
        @if (!empty($heroStatCards))
            <div class="mt-10 lg:mt-16 flex max-lg:justify-center gap-8 xs:gap-12 flex-wrap">
                @foreach ($heroStatCards as $card)
                    <div>
                        <p class="text-2xl xxs:text-3xl font-bold text-[#132238]">{{ $card['value'] }}</p>
                        <p class="text-xs xxs:text-sm text-gray-500">{{ $card['label'] }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="max-w-134 w-full h-full max-lg:mx-auto aspect-[536/636] relative">
        <div class="shadow-2xl shadow-gray-200 w-full h-full absolute bottom-0 bg-gradient-to-br from-picto-primary/15 to-[#c4f5e9] rounded-3xl center overflow-hidden">
            @if ($company?->logo_path)
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $company->logo_path) }}" alt="{{ $company->name }}">
            @else
                <span class="text-8xl font-bold text-picto-primary/30">
                    {{ collect(explode(' ', $company->name ?? 'Y C'))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                </span>
            @endif
        </div>
    </div>
</div>
