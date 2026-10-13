@php($agentCarousel = ($carousel ?? false) && $agents->isNotEmpty())
@if($agentCarousel)
<div class="swiper lp-agent-carousel" aria-label="{{ __('Browse agents') }}" data-swiper='{"slidesPerView":1,"slidesPerGroup":1,"spaceBetween":24,"watchOverflow":true,"pagination":{"el":".swiper-pagination","clickable":true,"bulletElement":"button"},"keyboard":{"enabled":true,"onlyInViewport":true},"breakpoints":{"576":{"slidesPerView":2,"slidesPerGroup":2},"992":{"slidesPerView":4,"slidesPerGroup":4}}}'>
@endif
<div class="{{ $agentCarousel ? 'swiper-wrapper' : 'row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4' }}">
    @forelse($agents as $agent)
    <div class="{{ $agentCarousel ? 'swiper-slide' : 'col' }}">
        <article class="card h-100 p-4 text-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:88px;height:88px;background:#f6e9eb;color:#8B1E24;font-size:32px" aria-hidden="true">@if($photoUrl = $agent->profilePhotoUrl())<img src="{{ $photoUrl }}" class="rounded-circle w-100 h-100 object-fit-cover" alt="" loading="lazy">@else{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($agent->name, 0, 1)) }}@endif</div>
            <h3 class="h5 text-break"><a href="{{ route('agents.show', $agent) }}" style="color:#8B1E24">{{ $agent->name }}</a></h3>
            <p class="small text-body-secondary text-break mb-2">{{ $agent->agency_name ?: 'Lassana Property agent' }}</p>
            @if($agent->city)<p class="small text-break mb-2">{{ $agent->city }}</p>@endif
            <p class="small mt-auto">{{ $agent->published_properties_count }} {{ $agent->published_properties_count == 1 ? 'published property' : 'published properties' }}</p>
            <a href="{{ route('agents.show', $agent) }}" class="btn btn-outline-primary btn-sm">{{ __('View profile') }}</a>
        </article>
    </div>
    @empty
    <div class="col w-100"><p class="border rounded p-4 mb-0">{{ __('No agents available at the moment.') }} <a href="{{ route('contact-us') }}">{{ __('Contact our team') }}</a> {{ __('for assistance.') }}</p></div>
    @endforelse
</div>
@if($agentCarousel)
    <div class="swiper-pagination position-static mt-4"></div>
</div>
@endif
