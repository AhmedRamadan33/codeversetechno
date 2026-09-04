@php
    $services = [
        [
            'title' => 'Web Platforms',
            'description' =>
                'Scalable web platforms and custom business applications designed for performance, usability, and long-term growth.',
            'svgPath' => 'M3 4h18v13H3V4Zm2 2v9h14V6H5Zm2 12h10v2H7v-2Z',
        ],

        [
            'title' => 'Mobile Applications',
            'description' =>
                'Modern mobile applications with responsive interfaces, secure APIs, real-time features, and seamless user experiences.',
            'svgPath' =>
                'M7 2h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm0 2v16h10V4H7Zm4 13h2v2h-2v-2Z',
        ],

        [
            'title' => 'Enterprise & ERP Solutions',
            'description' =>
                'End-to-end ERP and business management platforms covering finance, inventory, CRM, HR, and payroll.',
            'svgPath' => 'M4 21V8l8-5 8 5v13h-5v-7H9v7H4Zm7-9h2V8h-2v4Z',
        ],

        [
            'title' => 'Database Design',
            'description' =>
                'Efficient database architecture and optimized MySQL queries focused on data integrity, performance, and scalability.',
            'svgPath' =>
                'M12 2c-4.42 0-8 1.34-8 3v14c0 1.66 3.58 3 8 3s8-1.34 8-3V5c0-1.66-3.58-3-8-3Zm0 2c3.87 0 6 1.07 6 1.5S15.87 7 12 7 6 5.93 6 5.5 8.13 4 12 4Zm-6 4.02c1.36.63 3.5 1 6 1s4.64-.37 6-1v3.48c0 .43-2.13 1.5-6 1.5s-6-1.07-6-1.5V8.02Zm0 5.52c1.36.63 3.5 1 6 1s4.64-.37 6-1v3.46c0 .43-2.13 1.5-6 1.5s-6-1.07-6-1.5v-3.46Z',
        ],

        [
            'title' => 'System Integration',
            'description' =>
                'Third-party integrations including payment gateways, notifications, video streaming, external APIs, and real-time services.',
            'svgPath' =>
                'M8.5 7a4.5 4.5 0 1 0 0 9c1.06 0 2.03-.37 2.8-1L14 17.7A6.5 6.5 0 0 1 2 13.5 6.5 6.5 0 0 1 12.7 9.2L11 11.9a4.48 4.48 0 0 0-2.5-.9Zm10 3.2L21 12.7a6.5 6.5 0 0 1-10.7 4.3L12 15.3a4.5 4.5 0 0 0 6.5-4.1Z',
        ],

        [
            'title' => 'Security & Access Control',
            'description' =>
                'Secure authentication, authorization, and Role-Based Access Control (RBAC) built into every system we ship.',
            'svgPath' =>
                'M12 2 4 5v6c0 5.25 3.4 10.16 8 11.4 4.6-1.24 8-6.15 8-11.4V5l-8-3Zm0 9.99h6c-.49 3.5-2.9 6.68-6 7.9V12H6V6.3l6-2.25v8Z',
        ],
    ];
@endphp

<div class="reveal content grid max-xxl:px-4 xxl:px-2 py-10 md:py-15 lg:py-25" id="services">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">What We Do</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            We specialize in building reliable, secure, and high-performance systems that power real businesses.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($services as $service)
            <div
                class="group p-6 xs:p-8 bg-white hover:shadow-xl shadow-gray-300 ease-out duration-500 rounded-lg relative overflow-hidden">
                <p
                    class="bg-picto-primary absolute start-0 top-0 w-full h-0 group-hover:h-[3px] transition-all duration-300">
                </p>
                <div
                    class="w-12 h-12 bg-[#EDD8FF80] group-hover:bg-picto-primary center rounded-md transition-colors duration-500">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                        <path d="{{ $service['svgPath'] }}"
                            class="fill-picto-primary group-hover:fill-white transition-colors duration-500" />
                    </svg>
                </div>
                <p class="text-lg sm:text-xl font-semibold text-gray-900 pt-5 pb-2">{{ $service['title'] }}</p>
                <p class="text-[13px] sm:text-[15px] font-normal text-gray-600">{{ $service['description'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-10">
        <a href="#contact" class="btn btn-primary text-white md:py-3 md:px-6 text-[12px] sm:text-[16px] font-semibold">
            Get in Touch
        </a>
    </div>
</div>
