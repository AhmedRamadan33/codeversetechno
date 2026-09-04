@props(['company' => null])
<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $company->name ?? config('app.name') }} — {{ $company->industry ?? 'Software Development Company' }}</title>
    <meta name="description" content="{{ $company->tagline ?? '' }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=work-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative bg-white text-gray-900 antialiased">

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
                    @if ($company?->logo_path)
                        <img class="h-8 w-8 sm:h-14 sm:w-14 shrink-0 rounded-2xl object-cover" src="{{ asset('storage/' . $company->logo_path) }}" alt="{{ $company->name }}">
                    @else
                        <span class="flex h-8 w-8 sm:h-14 sm:w-14 shrink-0 items-center justify-center rounded-2xl bg-picto-primary text-lg sm:text-2xl font-bold text-white">
                            {{ mb_substr($company->name ?? 'C', 0, 1) }}
                        </span>
                    @endif
                    <p class="truncate text-base xs:text-lg sm:text-2xl md:text-[32px] my-auto ms-[12px] font-semibold">{{ $company->name ?? 'Your Company' }}</p>
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
                        @if ($company?->logo_path)
                            <img class="h-10 w-10 sm:h-12 sm:w-12 rounded-2xl object-cover" src="{{ asset('storage/' . $company->logo_path) }}" alt="{{ $company->name }}">
                        @else
                            <span class="flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-2xl bg-picto-primary text-lg sm:text-xl font-bold text-white">
                                {{ mb_substr($company->name ?? 'C', 0, 1) }}
                            </span>
                        @endif
                        <p class="text-2xl sm:text-[26px] my-auto ms-[12px] font-semibold">{{ $company->name ?? 'Your Company' }}</p>
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
