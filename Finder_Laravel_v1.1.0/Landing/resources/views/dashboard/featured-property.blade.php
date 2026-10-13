@if($role === 'admin')
<section class="card p-4 mb-4" aria-labelledby="featured-property-title">
    <h2 class="h5" id="featured-property-title">Featured on homepage</h2>
    @if($property->status === 'published')
        <p>{{ $property->is_featured ? 'This property is selected for the Featured properties section.' : 'Highlight this property in the homepage Featured properties section.' }}</p>
        <p class="text-secondary">Up to six most recently featured properties are shown. A property is removed from the selection when it is unpublished, sold or archived.</p>
        <form method="POST" action="{{ route('admin.properties.featured', $property) }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="is_featured" value="{{ $property->is_featured ? '0' : '1' }}">
            <button type="submit" class="btn {{ $property->is_featured ? 'btn-outline-secondary' : 'btn-lp' }}">{{ $property->is_featured ? 'Remove from featured' : 'Feature on homepage' }}</button>
        </form>
    @else
        <p class="mb-0">Publish this property before featuring it on the homepage.</p>
    @endif
</section>
@endif
