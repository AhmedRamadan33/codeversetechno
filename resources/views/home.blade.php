<x-layout :company="$company">
    <div class="relative">
        @include('partials.home.hero')
        @include('partials.home.about')
        @include('partials.home.why-us')
        @include('partials.home.industries')
        <div class="bg-soft-white">
            @include('partials.home.services')
            @include('partials.home.work-process')
        </div>
        @include('partials.home.skills')
        @include('partials.home.projects')
        @include('partials.home.stats')
        @include('partials.home.testimonials')
        @include('partials.home.work-together')
        @include('partials.home.contact')
    </div>
</x-layout>
