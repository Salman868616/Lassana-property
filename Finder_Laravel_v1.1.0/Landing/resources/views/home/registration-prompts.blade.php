<section class="container" aria-labelledby="home-registration-title">
<h2 class="h1 mb-4" id="home-registration-title">{{ __('Work with Lassana Property') }}</h2>
<div class="lp-conversion-grid lp-conversion-grid--two">
<article class="lp-conversion-card"><h3>{{ __('Are you a property agent?') }}</h3><p>{{ __('Tell us about your experience and the areas you serve. Agent applications are reviewed before access is approved.') }}</p><a class="btn btn-outline-primary" href="{{ route('account.agent-application') }}">{{ __('Apply as an agent') }}</a></article>
<article class="lp-conversion-card"><h3>{{ __('Represent a developer company?') }}</h3><p>{{ __('Submit your company and project details for review. Our team will help prepare your developer directory profile.') }}</p><a class="btn btn-outline-primary" href="{{ route('account.developer-application') }}">{{ __('Register your company') }}</a></article>
</div></section>
