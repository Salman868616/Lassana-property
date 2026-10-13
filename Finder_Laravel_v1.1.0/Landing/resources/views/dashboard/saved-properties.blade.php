<section class="card mb-4" id="saved-properties">
    <div class="card-header"><h2 class="h5 mb-0">Saved properties ({{ $savedProperties->total() }})</h2></div>
    <div class="card-body">
        @if(session('saved_message'))<div class="alert alert-success" role="status">{{ session('saved_message') }}</div>@endif
        @forelse($savedProperties as $bookmark)
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 border-bottom py-3">
                <div>
                    @if($bookmark->property)
                        <a class="fw-semibold" href="{{ route('properties.show',$bookmark->property->property_code) }}">{{ $bookmark->property->title }}</a>
                        <p class="mb-0">{{ $bookmark->property->city }}, {{ $bookmark->property->district }}</p>
                        <small>{{ $bookmark->property->priceLabel() }}</small>
                        @include('properties.card-highlights', ['property' => $bookmark->property])
                    @else
                        <span>This property is no longer available.</span>
                    @endif
                </div>
                <form method="POST" action="{{ route('buyer.saved.destroy',$bookmark->property_id) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-secondary btn-sm">Remove from saved</button>
                </form>
            </div>
        @empty
            <p>No saved properties yet. Open a property and choose <strong>Save property</strong>.</p>
            <a href="{{ route('properties.index') }}">Browse properties</a>
        @endforelse
        <div class="mt-3">{{ $savedProperties->withQueryString()->links('pagination::bootstrap-5') }}</div>
    </div>
</section>
