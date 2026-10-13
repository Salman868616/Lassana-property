<section class="container py-5" aria-labelledby="verified-properties-title">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4"><div><h2 id="verified-properties-title" class="h1 mb-2">{{ __('Verified properties') }}</h2><p class="text-body-secondary mb-0">{{ __('Published listings with completed Basic or Silver checks.') }}</p></div><a class="btn btn-outline-primary" href="{{ route('properties.verified') }}">{{ __('Browse verified properties') }}</a></div>
    <div class="row g-4">@forelse($verifiedProperties as $property)<div class="col-md-6 col-xl-4">@include('home.property-card',['featured'=>false, 'cardContext'=>'directory'])</div>@empty<div class="col-12"><p class="border rounded-3 p-4">{{ __('No verified properties are published right now.') }}</p></div>@endforelse</div>
    <p class="small mt-3 mb-0"><a href="{{ route('verification-ranks') }}">{{ __('See what each verification level covers') }}</a></p>
</section>
