<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\MarketingCampaign;
class TrackPublicVisitors {
    public function handle(Request $request, Closure $next) {
        $response=$next($request);
        if (!config('marketing.enabled') || !$request->isMethod('GET') || $response->getStatusCode()!==200
            || !$request->routeIs('index','home-real-estate','properties.index','properties.show','listings-real-estate','agents.index','agents.show','about-us','contact-us')
            || $request->expectsJson() || $request->header('Purpose')==='prefetch' || $request->header('Sec-Purpose')==='prefetch'
            || preg_match('/bot|crawler|spider|slurp|preview|facebookexternalhit/i',$request->userAgent() ?? '')
            || $request->user()?->roles()->whereIn('name',['admin','sales','verification','seller','agent'])->exists()) return $response;
        // Random browser-session identity only. No IP, email, URL query or user-agent is stored.
        try {
            $token=$request->session()->get('visitor_token');
            if (!is_string($token)) { $token=(string)Str::uuid(); $request->session()->put('visitor_token',$token); }
            $key=['visited_on'=>now('Asia/Colombo')->toDateString(),'visitor_hash'=>hash_hmac('sha256',$token,config('app.key'))];
            DB::table('website_visitors')->insertOrIgnore($key+['page_views'=>0]);
            DB::table('website_visitors')->where($key)->increment('page_views');
            $code=$request->query('utm_campaign');
            if (is_string($code) && strlen($code)<=60) {
                $campaign=MarketingCampaign::where('code',$code)->where('is_active',true)->first();
                if ($campaign) $request->session()->put('marketing_touch',['id'=>$campaign->id,'at'=>now()->timestamp]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            // Reporting must not prevent customers from opening public listings.
            report($e);
        }
        return $response;
    }
}
