<section class="container" aria-labelledby="home-guides-title">
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4"><h2 class="h1 mb-0" id="home-guides-title">{{ __('Property guides') }}</h2><a class="btn btn-outline-primary" href="{{ route('guides.index') }}">{{ __('All property guides') }}</a></div>
<div class="lp-conversion-grid">@foreach(config('property_guides') as $slug=>$article)<article class="lp-conversion-card"><h3>{{ __($article['title']) }}</h3><p>{{ __($article['summary']) }}</p><a href="{{ route('guides.show',$slug) }}">{{ __('Read guide') }} <span class="visually-hidden">{{ __($article['title']) }}</span></a></article>@endforeach</div>
</section>
