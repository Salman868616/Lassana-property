@extends('layouts.app')
@section('title', $agent->name.' | Agent | Lassana Property')
@section('meta-description', 'Explore properties listed by '.$agent->name.($agent->city ? ' in '.$agent->city : '').' and contact them through Lassana Property.')
@push('styles')
<style>
    .lp-agent-cover {height:240px;background:linear-gradient(90deg,#30151855,#30151811),url('{{ asset('assets/img/listings/real-estate/vendor-cover.jpg') }}') center/cover}
    .lp-agent-profile {position:relative;margin-top:-64px;background:#fff;border:1px solid #eadcde;border-radius:16px;padding:36px}
    .lp-agent-avatar {width:112px;height:112px;flex:0 0 112px;display:flex;align-items:center;justify-content:center;border-radius:50%;background:#f6e9eb;color:#8B1E24;font-size:44px;border:5px solid white}
    .lp-agent-page .btn-primary {background:#8B1E24;border-color:#8B1E24}
    .lp-agent-page .btn-primary:hover {background:#5A1015;border-color:#5A1015}
    .lp-agent-bio {white-space:pre-line;overflow-wrap:anywhere}
    @media(max-width:575.98px) {.lp-agent-cover{height:160px}.lp-agent-profile{padding:24px;margin-top:-40px}.lp-agent-avatar{width:80px;height:80px;flex-basis:80px;font-size:32px}}
</style>
@endpush
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="lp-agent-page">
    <div class="lp-agent-cover" aria-hidden="true"></div>
    <div class="container pb-5">
        <section class="lp-agent-profile mb-5" aria-labelledby="agent-name">
            <a href="{{ route('agents.index') }}" class="small d-inline-block mb-4">{{ __('All agents') }}</a>
            <div class="d-flex flex-wrap align-items-center gap-4">
                <div class="lp-agent-avatar" aria-hidden="true">@if($photoUrl = $agent->profilePhotoUrl())<img src="{{ $photoUrl }}" class="rounded-circle w-100 h-100 object-fit-cover" alt="" loading="lazy">@else{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($agent->name, 0, 1)) }}@endif</div>
                <div class="flex-grow-1" style="min-width:0">
                    <span class="small fw-semibold" style="color:#8B1E24">{{ __('Property agent') }}</span>
                    <h1 class="h2 mt-2 text-break" id="agent-name">{{ $agent->name }}</h1>
                    @if($agent->agency_name)<p class="mb-1 text-break">{{ $agent->agency_name }}</p>@endif
                    @if($agent->city)<p class="text-body-secondary mb-0 text-break">{{ $agent->city }}</p>@endif
                </div>
                <div class="d-flex flex-wrap gap-2">
                    @if($agent->phone && preg_match('/^[+0-9\s().-]+$/', $agent->phone))
                    <a class="btn btn-primary" href="tel:{{ preg_replace('/[^+0-9]/', '', $agent->phone) }}">{{ __('Call agent') }}</a>
                    @endif
                    <a class="btn btn-outline-primary" href="mailto:{{ $agent->email }}">{{ __('Send email') }}</a>
                </div>
            </div>
            <div class="row g-4 border-top mt-4 pt-2">
                <div class="col-md-8">
                    <h2 class="h5">About {{ $agent->name }}</h2>
                    <p class="lp-agent-bio mb-0">{{ $agent->bio ?: 'Contact this agent to discuss your property requirements.' }}</p>
                    @if($agent->service_areas)<h3 class="h6 mt-4">{{ __('Areas served') }}</h3><p class="text-break mb-0">{{ $agent->service_areas }}</p>@endif
                </div>
                <div class="col-md-4">
                    <div class="rounded-3 p-4" style="background:#fbf7f3">
                        <strong class="h2 d-block" style="color:#8B1E24">{{ $properties->total() }}</strong>
                        <span>Published {{ $properties->total() == 1 ? 'property' : 'properties' }}</span>
                    </div>
                </div>
            </div>
        </section>
        <section aria-labelledby="agent-properties">
            <h2 class="h3 mb-4" id="agent-properties">{{ __('Available properties') }}</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                @forelse($properties as $property)
                <div class="col"><article class="card h-100 overflow-hidden">
                    <div class="position-relative">
                    <a class="ratio ratio-4x3 bg-body-tertiary" href="{{ route('properties.show', $property->property_code) }}" aria-label="View {{ $property->title }}">
                        @if($property->images->isNotEmpty())
                        <img src="{{ asset('storage/'.$property->images->first()->path) }}" class="object-fit-cover" alt="{{ $property->title }}" loading="lazy">
                        @else
                        <span class="d-flex align-items-center justify-content-center text-body-secondary">{{ __('No photo available') }}</span>
                        @endif
                    </a>
                    @include('properties.category-badge')
                    </div>
                    <div class="card-body">
                        <p class="h5" style="color:#8B1E24">{{ $property->priceLabel() }}</p>
                        <h3 class="h6"><a class="text-body" href="{{ route('properties.show', $property->property_code) }}">{{ $property->title }}</a></h3>
                        <p class="small text-body-secondary">{{ collect([$property->city, $property->district])->filter()->implode(', ') }}</p>
                        @include('properties.card-highlights')
                    </div>
                    <div class="card-footer border-0 bg-transparent"><a href="{{ route('properties.show', $property->property_code) }}" class="btn btn-outline-primary btn-sm">{{ __('View property') }}</a></div>
                </article></div>
                @empty
                <div class="col w-100"><p class="border rounded-3 p-4">{{ __('This agent has no published properties at the moment.') }} <a href="{{ route('properties.index') }}">{{ __('Browse all properties') }}</a>.</p></div>
                @endforelse
            </div>
            <div class="mt-4">{{ $properties->links() }}</div>
        </section>
    </div>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts')
@vite(['resources/js/app.js'])
@endpush
