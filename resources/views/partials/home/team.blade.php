<div class="reveal content px-2 py-10 md:py-15 lg:py-25 max-xxl:px-4" id="team">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Our Team</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            The people behind {{ $company->name ?? 'our company' }}, building products our clients rely on.
        </p>
    </div>

    @if ($team->isEmpty())
        <p class="text-center text-gray-400">Team members will show up here once added from the admin panel.</p>
    @else
        <div class="mx-auto grid gap-6 sm:grid-cols-2 lg:grid-cols-3 max-w-218">
            @foreach ($team as $member)
                <div class="group p-4 xs:p-8 bg-white shadow-gray-300 shadow-lg ease-out duration-500 rounded-lg text-center">
                    <div class="mx-auto h-28 w-28 overflow-hidden rounded-full bg-soft-white center">
                        @if ($member->photo_path)
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}">
                        @else
                            <span class="text-3xl font-bold text-picto-primary/30">
                                {{ collect(explode(' ', $member->name))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                            </span>
                        @endif
                    </div>
                    <p class="mt-4 text-lg font-semibold text-gray-900">{{ $member->name }}</p>
                    <p class="text-picto-primary font-medium">{{ $member->position }}</p>
                    @if ($member->bio)
                        <p class="mt-3 text-[13px] sm:text-[14px] font-normal text-gray-600 leading-relaxed">{{ $member->bio }}</p>
                    @endif
                    @if ($member->linkedin_url || $member->email)
                        <div class="mt-4 flex justify-center gap-3">
                            @if ($member->linkedin_url)
                                <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener" title="LinkedIn"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-gray-200 text-gray-500 transition hover:border-picto-primary hover:text-picto-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                                        <path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.34 7.43a2.07 2.07 0 1 1 0-4.13 2.07 2.07 0 0 1 0 4.13ZM7.12 20.45H3.56V9h3.56v11.45Z"/>
                                    </svg>
                                </a>
                            @endif
                            @if ($member->email)
                                <a href="mailto:{{ $member->email }}" title="Email"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-gray-200 text-gray-500 transition hover:border-picto-primary hover:text-picto-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
