@if(filled($property->site_concerns))
    <section class="mb-5" aria-labelledby="site-concerns-heading">
        <h2 id="site-concerns-heading" class="h4 mb-3">{{ __('Restrictions / site concerns') }}</h2>
        <p class="mb-0" style="white-space:pre-line;overflow-wrap:anywhere">{{ $property->site_concerns }}</p>
    </section>
@endif
