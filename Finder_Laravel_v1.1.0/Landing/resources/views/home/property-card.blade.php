<article class="card h-100 overflow-hidden" @if($featured ?? false) data-featured-property="{{ $property->id }}" @elseif(($cardContext ?? 'latest') === 'latest') data-latest-property="{{ $property->id }}" @endif>
    <div class="position-relative">
        <a href="{{ route('properties.show', $property->property_code) }}" class="ratio ratio-4x3 bg-body-tertiary" aria-label="View {{ $property->title }}">
            @if($property->images->isNotEmpty())
                <img src="{{ asset('storage/'.$property->images->first()->path) }}" alt="{{ $property->title }}" class="object-fit-cover" loading="lazy">
            @else
                <span class="d-flex align-items-center justify-content-center text-body-secondary">{{ __('Photo coming soon') }}</span>
            @endif
        </a>
        @include('properties.category-badge')
        @include('properties.saved-badge')
        @include('properties.negotiable-label')
    </div>
    <div class="card-body">
        @if($featured ?? false)
            <span class="badge rounded-pill mb-2" style="background:#F7EACB;color:#5A1015;border:1px solid #C89B3C">{{ __('Featured') }}</span>
        @endif
        <div class="h5">{{ $property->priceLabel() }}</div>
        <h3 class="h6"><a href="{{ route('properties.show', $property->property_code) }}" class="text-body">{{ $property->title }}</a></h3>
        <p class="small text-body-secondary mb-2">{{ $property->property_code }}</p>
        <p class="small mb-2">{{ collect([$property->city, $property->district])->filter()->implode(', ') }}</p>
        @include('properties.card-highlights')
    </div>
    <div class="card-footer bg-transparent border-0 pt-0">
        <a href="{{ route('properties.show', $property->property_code) }}" class="btn btn-outline-primary btn-sm">{{ __('View property') }}</a>
    </div>
</article>
