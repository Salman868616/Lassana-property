@if($featuredProperties->isNotEmpty())
<section class="container py-5" aria-labelledby="featured-properties-title">
    <div class="mb-4">
        <h2 id="featured-properties-title" class="h1 mb-2">{{ __('Featured properties') }}</h2>
        <p class="text-body-secondary mb-0">{{ __('Explore properties selected by our team.') }}</p>
    </div>
    <div class="row g-4">
        @foreach($featuredProperties as $property)
            <div class="col-md-6 col-xl-4">
                @include('home.property-card', ['featured' => true])
            </div>
        @endforeach
    </div>
</section>
@endif
