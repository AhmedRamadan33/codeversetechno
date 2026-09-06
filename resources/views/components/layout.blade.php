@props(['company' => null])
@php
    $siteName = $company->name ?? config('app.name');
    $siteTagline = $company->industry ?? 'Software Development Company';
    $siteDescription = $company->tagline
        ?? 'We design, build, and scale reliable software for ambitious businesses.';
    $canonicalUrl = url()->current();
    $ogImagePath = $company?->hero_image_path
        ? asset('storage/' . $company->hero_image_path)
        : asset('img/codeverse-logo.png');
@endphp
<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>{{ $siteName }} — {{ $siteTagline }}</title>
    <meta name="description" content="{{ $siteDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    @if (config('services.google_site_verification'))
        <meta name="google-site-verification" content="{{ config('services.google_site_verification') }}">
    @endif
    @if (config('services.bing_site_verification'))
        <meta name="msvalidate.01" content="{{ config('services.bing_site_verification') }}">
    @endif

    {{-- Open Graph / Facebook / LinkedIn --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $siteName }} — {{ $siteTagline }}">
    <meta property="og:description" content="{{ $siteDescription }}">
    <meta property="og:image" content="{{ $ogImagePath }}">
    <meta property="og:locale" content="en_US">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $siteName }} — {{ $siteTagline }}">
    <meta name="twitter:description" content="{{ $siteDescription }}">
    <meta name="twitter:image" content="{{ $ogImagePath }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=work-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Organization structured data (helps Google understand and display this business) --}}
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $siteName,
            'url' => url('/'),
            'logo' => asset('img/codeverse-logo.png'),
            'description' => $company?->about ?? $siteDescription,
            'email' => $company?->email,
            'telephone' => $company?->phone,
            'address' => $company?->location ? [
                '@type' => 'PostalAddress',
                'addressLocality' => $company->location,
            ] : null,
            'sameAs' => array_values(array_filter([
                $company?->linkedin_url,
                $company?->github_url,
                $company?->facebook_url,
                $company?->instagram_url,
                $company?->twitter_url,
            ])),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
</head>
<body class="relative bg-white text-gray-900 antialiased overflow-x-hidden">

    <div id="page-loader" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center gap-6 bg-white" role="status" aria-live="polite">
        <img src="{{ asset('img/codeverse-logo.png') }}" alt="{{ $company->name ?? 'CodeVerse' }}" class="loader-logo w-56 xxs:w-64 sm:w-72">
        <div class="loader-bar">
            <div class="loader-bar-fill"></div>
        </div>
        <span class="sr-only">Loading…</span>
    </div>
    <script>
        // Fallback: force-hide the loader even if the main bundle fails to load.
        setTimeout(function () {
            var loader = document.getElementById('page-loader');
            if (loader) {
                loader.classList.add('loader-hidden');
            }
        }, 5000);
    </script>

    @php
        $navItems = [
            ['id' => 1, 'name' => 'Home', 'url' => 'introduction'],
            ['id' => 2, 'name' => 'About', 'url' => 'about'],
            ['id' => 3, 'name' => 'Why Us', 'url' => 'why-us'],
            ['id' => 4, 'name' => 'Services', 'url' => 'services'],
            ['id' => 5, 'name' => 'Work', 'url' => 'portfolio'],
            ['id' => 6, 'name' => 'Contact', 'url' => 'contact'],
        ];
    @endphp

    <div id="navbar" class="sticky top-0 bg-white z-50 transition-all duration-500">
        <div class="navbar flex justify-between mx-auto content gap-2">
            <div class="flex min-w-0 items-center gap-3">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0" class="menu menu-lg dropdown-content rounded-box z-1 mt-3 w-56 p-2 shadow font-semibold flex-nowrap bg-white text-black">
                        @foreach ($navItems as $item)
                            <li><a data-nav-link data-menu-link href="#{{ $item['url'] }}" class="hover:text-picto-primary px-5 py-3 mx-1">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <a href="#introduction" class="flex items-center border-0 min-w-0 xl:max-xxl:ps-5">
                        <img class="h-10 xs:h-12 sm:h-16 lg:h-[80px]" src="{{ asset('storage/' . $company->navbar_logo_path) }}" alt="{{ $company->name }}">
                </a>
            </div>

            <div class="xl:flex items-center shrink-0">
                <ul class="hidden xl:flex menu menu-horizontal text-[15px] font-medium shrink-0">
                    @foreach ($navItems as $item)
                        <li><a data-nav-link href="#{{ $item['url'] }}" class="hover:text-picto-primary px-3 py-3">{{ $item['name'] }}</a></li>
                    @endforeach
                </ul>
                <p class="">
                    <a href="#contact" class="btn btn-sm xs:btn-md sm:btn-lg btn-primary">Contact Us</a>
                </p>
            </div>
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    <div class="bg-[#2A374A]">
        @php
            $footerCompanyLinks = [
                ['name' => 'About Us', 'url' => 'about'],
                ['name' => 'Why Us', 'url' => 'why-us'],
                ['name' => 'How We Work', 'url' => 'work-process'],
                ['name' => 'Contact', 'url' => 'contact'],
            ];
            $footerWorkLinks = [
                ['name' => 'Services', 'url' => 'services'],
                ['name' => 'Technologies', 'url' => 'technologies'],
                ['name' => 'Case Studies', 'url' => 'portfolio'],
            ];
        @endphp
        <div class="pt-25 md:pt-32 pb-10 content max-2xl:px-3 text-neutral-200">
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
                <div class="lg:col-span-2">
                    <a href="#introduction" class="flex items-center border-0 w-fit">
                            <img class="h-12" src="{{ asset('storage/' . $company->footer_logo_path) }}" alt="{{ $company->name }}">

                    </a>
                    <p class="mt-4 max-w-sm text-sm text-neutral-400">{{ $company->tagline ?? 'We design, build, and scale reliable software for ambitious businesses.' }}</p>
                    <div class="flex gap-1 mt-5 -ms-2.5">
                        <x-social-media :company="$company" class="!text-white hover:!bg-white hover:!text-[#2A374A]" />
                    </div>
                </div>

                <div>
                    <p class="text-sm font-semibold text-white mb-4">Company</p>
                    <ul class="space-y-3">
                        @foreach ($footerCompanyLinks as $item)
                            <li><a class="text-sm text-neutral-400 hover:text-white transition-colors" href="#{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p class="text-sm font-semibold text-white mb-4">Work</p>
                    <ul class="space-y-3 mb-6">
                        @foreach ($footerWorkLinks as $item)
                            <li><a class="text-sm text-neutral-400 hover:text-white transition-colors" href="#{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>

                    @if ($company?->email || $company?->phone || $company?->location)
                        <p class="text-sm font-semibold text-white mb-4">Contact</p>
                        <ul class="space-y-3 text-sm text-neutral-400">
                            @if ($company?->email)<li>{{ $company->email }}</li>@endif
                            @if ($company?->phone)<li>{{ $company->phone }}</li>@endif
                            @if ($company?->location)<li>{{ $company->location }}</li>@endif
                        </ul>
                    @endif
                </div>
            </div>

            <div class="mt-14 pt-6 border-t border-white/10 text-center">
                <p class="text-[12px] sm:text-sm text-neutral-400">Copyright &copy; {{ date('Y') }} {{ $company->name ?? 'Your Company' }}. All rights reserved.</p>
            </div>
        </div>
    </div>

    <div class="flex justify-end relative sm:me-10 z-10">
        <a id="scroll-to-top"
            class="fixed bottom-10 me-5 w-10 h-10 sm:w-12.5 sm:h-12.5 lg:w-15 lg:h-15 flex justify-center items-center rounded-full transition delay-150 duration-500 ease-in-out hover:scale-120 hover:cursor-pointer bg-picto-primary hover:bg-picto-primary-dark text-white scale-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m18 15-6-6-6 6"/>
            </svg>
        </a>
    </div>
</body>
</html>
