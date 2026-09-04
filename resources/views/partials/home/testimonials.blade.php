@if ($testimonials->isNotEmpty())
<div class="reveal content px-2 py-10 md:py-15 lg:py-25 max-xxl:px-4" id="testimonials">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">What Clients Say</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            Feedback from the businesses we've worked with.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($testimonials as $testimonial)
            <div class="p-6 xs:p-8 bg-white shadow-gray-300 shadow-lg rounded-lg flex flex-col">
                @if ($testimonial->rating)
                    <div class="flex gap-0.5 mb-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 {{ $i <= $testimonial->rating ? 'fill-picto-primary' : 'fill-gray-200' }}">
                                <path d="m12 17.27 6.18 3.73-1.64-7.03L21.5 9.24l-7.19-.62L12 2 9.69 8.62l-7.19.62 5.96 4.73-1.64 7.03L12 17.27Z"/>
                            </svg>
                        @endfor
                    </div>
                @endif
                <p class="text-[14px] xs:text-[15px] text-gray-600 leading-relaxed grow">&ldquo;{{ $testimonial->quote }}&rdquo;</p>
                <div class="mt-6 flex items-center gap-3">
                    <div class="h-11 w-11 shrink-0 overflow-hidden rounded-full bg-soft-white center">
                        @if ($testimonial->avatar_path)
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $testimonial->avatar_path) }}" alt="{{ $testimonial->client_name }}">
                        @else
                            <span class="text-sm font-bold text-picto-primary/40">
                                {{ collect(explode(' ', $testimonial->client_name))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                            </span>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">{{ $testimonial->client_name }}</p>
                        <p class="text-xs text-gray-500">
                            {{ $testimonial->client_position }}
                            @if ($testimonial->client_company)
                                @if ($testimonial->client_position) &middot; @endif {{ $testimonial->client_company }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
