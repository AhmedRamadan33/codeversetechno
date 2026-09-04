@php
    $reasons = [
        [
            'title' => 'Secure by Design',
            'description' => 'Authentication, authorization, and Role-Based Access Control (RBAC) are built into every project from day one, not bolted on later.',
            'svgPath' => 'M12 2 4 5v6c0 5.25 3.4 10.16 8 11.4 4.6-1.24 8-6.15 8-11.4V5l-8-3Zm0 9.99h6c-.49 3.5-2.9 6.68-6 7.9V12H6V6.3l6-2.25v8Z',
        ],
        [
            'title' => 'Scalable Architecture',
            'description' => 'Clean MVC foundations and well-structured code that grow with your business, from first release to enterprise scale.',
            'svgPath' => 'M4 21V8l8-5 8 5v13h-5v-7H9v7H4Zm7-9h2V8h-2v4Z',
        ],
        [
            'title' => 'Direct Communication',
            'description' => "You work directly with the engineers building your product from start to finish — no account managers in between.",
            'svgPath' => 'M20 2H4a2 2 0 0 0-2 2v18l4-4h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2Zm-2 12H6v-2h12v2Zm0-3H6V9h12v2Zm0-3H6V6h12v2Z',
        ],
        [
            'title' => 'Proven Across Industries',
            'description' => 'Real platforms delivered for enterprise, education, healthcare, and legal businesses — not just demos.',
            'svgPath' => 'M12 3 2 8l10 5 8-4v6h2V8L12 3ZM4 15v3c0 1.66 3.58 3 8 3s8-1.34 8-3v-3l-8 4-8-4Z',
        ],
        [
            'title' => 'Modern, Reliable Stack',
            'description' => 'Laravel, PHP, and MySQL — chosen for long-term maintainability and performance, not short-lived trends.',
            'svgPath' => 'M8 3H4a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1Zm12 0h-4a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1ZM8 15H4a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1Zm12 0h-4a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1Z',
        ],
        [
            'title' => 'Client-First Delivery',
            'description' => 'Every engagement is backed by real client feedback — see what businesses we\'ve worked with have to say.',
            'svgPath' => 'M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.34 7.43a2.07 2.07 0 1 1 0-4.13 2.07 2.07 0 0 1 0 4.13ZM7.12 20.45H3.56V9h3.56v11.45Z',
        ],
    ];
@endphp
<div class="reveal content px-2 pt-20 md:pt-30 pb-10 md:pb-15 lg:pb-25 max-xxl:px-4" id="why-us">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Why {{ $company->name ?? 'CodeVerse' }}</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            What sets us apart when you're choosing a team to build with.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($reasons as $reason)
            <div class="group p-6 xs:p-8 bg-white hover:shadow-xl shadow-gray-300 ease-out duration-500 rounded-lg relative overflow-hidden">
                <p class="bg-picto-primary absolute start-0 top-0 w-full h-0 group-hover:h-[3px] transition-all duration-300"></p>
                <div class="w-12 h-12 bg-[#EDD8FF80] group-hover:bg-picto-primary center rounded-md transition-colors duration-500">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                        <path d="{{ $reason['svgPath'] }}" class="fill-picto-primary group-hover:fill-white transition-colors duration-500" />
                    </svg>
                </div>
                <p class="text-lg sm:text-xl font-semibold text-gray-900 pt-5 pb-2">{{ $reason['title'] }}</p>
                <p class="text-[13px] sm:text-[15px] font-normal text-gray-600">{{ $reason['description'] }}</p>
            </div>
        @endforeach
    </div>
</div>
