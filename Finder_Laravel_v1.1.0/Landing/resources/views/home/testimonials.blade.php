@if($testimonials->isNotEmpty())
<section class="container" aria-labelledby="home-testimonials-title"><h2 class="h1 mb-4" id="home-testimonials-title">{{ __('What our customers say') }}</h2><div class="lp-conversion-grid">
@foreach($testimonials as $testimonial)<figure class="lp-conversion-card mb-0"><blockquote class="lp-conversion-quote"><p>{{ $testimonial->quote }}</p><footer><strong>{{ $testimonial->customer_name }}</strong>@if($testimonial->context)<br>{{ $testimonial->context }}@endif</footer></blockquote></figure>@endforeach
</div></section>
@endif
