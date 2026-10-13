<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class SetPublicLocale {
    public function handle(Request $request, Closure $next) {
        $public = $request->routeIs('index','home-real-estate','properties.*','listings-real-estate','agents.*','developers.*','services.*','guides.*','about-us','contact-us','verification-ranks','faqs','terms-and-conditions','privacy-policy','disclaimer','language.update');
        $locale = $public ? $request->session()->get('public_locale','en') : 'en';
        app()->setLocale(in_array($locale,['en','si','ta'],true) ? $locale : 'en');
        return $next($request);
    }
}
