@php
    $industryMeta = [
        'Enterprise & Business' => [
            'description' => 'ERP, CRM, and internal operations platforms that streamline finance, inventory, and workflow management.',
            'svgPath' => 'M4 21V8l8-5 8 5v13h-5v-7H9v7H4Z',
        ],

        'Education' => [
            'description' => 'Learning management systems with course delivery, assessments, certification, and live class integrations.',
            'svgPath' => 'M12 3 1 9l11 6 9-4.91V17h2V9L12 3Zm0 13.35L4 12.1V17c0 2.21 3.58 4 8 4s8-1.79 8-4v-4.9l-8 4.25Z',
        ],

        'Healthcare' => [
            'description' => 'Clinic and patient management platforms covering scheduling, records, and diagnostics with strict data privacy.',
            'svgPath' => 'M19 8h-3V5a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v3H5a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h3v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3h3a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1Z',
        ],

        'Legal' => [
            'description' => 'Case and practice management systems for law firms, with client portals and document workflows.',
            'svgPath' => 'M12 3 2 8l10 5 8-4v6h2V8L12 3ZM4 15v3c0 1.66 3.58 3 8 3s8-1.34 8-3v-3l-8 4-8-4Z',
        ],

        // New Industries

        'Real Estate' => [
            'description' => 'Property management and real estate platforms for listings, properties, clients, agents, contracts, and transactions.',
            'svgPath' => 'M3 21h18v-2H3v2Zm2-4h4V9H5v8Zm5 0h4V5h-4v12Zm5 0h4V2h-4v15Z',
        ],

        'E-Commerce' => [
            'description' => 'Scalable e-commerce platforms with product catalogs, orders, payments, inventory, customers, and promotional workflows.',
            'svgPath' => 'M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2ZM1 2v2h2l3.6 7.59-1.35 2.45C5.09 14.32 5 14.65 5 15c0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03L20.88 5H5.21l-.94-2H1Zm16 16c-1.1 0-1.99.9-1.99 2S15.9 22 17 22s2-.9 2-2-.9-2-2-2Z',
        ],

        'Finance & Banking' => [
            'description' => 'Financial management platforms for accounts, transactions, payments, reporting, invoices, and business operations.',
            'svgPath' => 'M12 2 2 7v2h20V7L12 2Zm-8 9v8H2v2h20v-2h-2v-8h-3v8h-3v-8h-4v8H7v-8H4Z',
        ],

        'Logistics & Transportation' => [
            'description' => 'Logistics and transportation systems for shipments, fleet management, deliveries, drivers, tracking, and operations.',
            'svgPath' => 'M3 6h11v9H3V6Zm11 3h4l3 3v3h-7V9Zm-8 8a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm10 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z',
        ],

        'Hospitality' => [
            'description' => 'Hotel and hospitality platforms covering reservations, guests, rooms, services, payments, and operational management.',
            'svgPath' => 'M4 18v-6c0-2.21 1.79-4 4-4h8c2.21 0 4 1.79 4 4v6h-2v-2H6v2H4Zm2-4h12v-2c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v2Z',
        ],

        'Restaurants' => [
            'description' => 'Restaurant management platforms for menus, orders, reservations, branches, payments, delivery, and daily operations.',
            'svgPath' => 'M7 2v8c0 1.66 1.34 3 3 3v9h2v-9c1.66 0 3-1.34 3-3V2h-2v6h-1V2h-2v6H9V2H7Zm10 0v20h2v-8h2V8c0-3.31-1.34-6-4-6Z',
        ],

        'Government & Public Sector' => [
            'description' => 'Digital platforms for public services, internal administration, citizen workflows, records, and secure data management.',
            'svgPath' => 'M12 2 2 7v2h20V7L12 2Zm-7 9v8H3v2h18v-2h-2v-8H5Zm2 0h2v8H7v-8Zm4 0h2v8h-2v-8Zm4 0h2v8h-2v-8Z',
        ],

        'Media & Entertainment' => [
            'description' => 'Content and media platforms for digital publishing, subscriptions, media management, users, and content workflows.',
            'svgPath' => 'M4 4h16v16H4V4Zm2 3v10h12V7H6Zm3 2 6 3-6 3V9Z',
        ],
    ];

@endphp

@if (!empty($industryMeta))
<div class="reveal content px-2 py-10 md:py-15 max-xxl:px-4">

    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Industries We Serve</p>

        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            Software solutions tailored to the way each of these sectors actually works.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

        @foreach ($industryMeta as $industry => $meta)

            <div class="p-6 bg-white shadow-gray-300 shadow-lg rounded-lg text-center">

                <div class="mx-auto w-14 h-14 bg-[#EDD8FF80] center rounded-md">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                    >
                        <path
                            d="{{ $meta['svgPath'] }}"
                            class="fill-picto-primary"
                        />
                    </svg>

                </div>

                <p class="mt-4 font-semibold text-gray-900">
                    {{ $industry }}
                </p>

                <p class="mt-2 text-[13px] text-gray-500 leading-relaxed">
                    {{ $meta['description'] }}
                </p>

            </div>

        @endforeach

    </div>
</div>
@endif