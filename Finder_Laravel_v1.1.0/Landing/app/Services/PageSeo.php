<?php
namespace App\Services;
use Illuminate\Http\Request;
class PageSeo
{
    public static function forRequest(Request $request): array
    {
        $pages = [
            'index'=>['Lassana Property | Land, Houses & Apartments in Sri Lanka','Find land, houses and apartments in Sri Lanka. Explore properties by city and connect with Lassana Property.'],
            'home-real-estate'=>['Lassana Property | Land, Houses & Apartments in Sri Lanka','Find land, houses and apartments in Sri Lanka. Explore properties by city and connect with Lassana Property.'],
            'about-us'=>['About us | Lassana Property','Learn about Lassana Property and our property services across Sri Lanka.'],
            'verification-ranks'=>['Verification rankings | Lassana Property','Understand Lassana Property verification rankings: Basic and Silver checks, plus the planned Gold and Platinum levels.'],
            'contact-us'=>['Contact us | Lassana Property','Contact Lassana Property for property enquiries, listings and assistance from our team in Gampaha.'],
            'agents.index'=>['Our agents | Lassana Property','Meet Lassana Property agents and explore their available property listings.'],
        ];
        $route = $request->route()?->getName();
        $additional = [
            'guides.index'=>['Property guides','Practical guides to shortlisting a property, preparing for a viewing and planning a building enquiry.'],
            'services.index'=>['Property services','Explore property inspections, verification, overseas assistance and LGC services.'],
            'faqs'=>['Frequently asked questions','Help with property searches, accounts and service requests.'],
            'developers.index'=>['Developer companies','Explore developer companies and their published properties.'],
            'developers.show'=>['Developer company','Explore this company and its published properties.'],
            'properties.all'=>['All properties','Browse properties for sale and rent in Sri Lanka.'],
            'properties.verified'=>['Verified properties','Published listings with completed Basic or Silver checks.'],
            'properties.land'=>['Land for sale','Explore land for sale in Sri Lanka.'],
            'properties.houses'=>['Houses for sale','Explore houses for sale in Sri Lanka.'],
            'properties.apartments-villas'=>['Apartments & villas','Explore apartments and villas for sale in Sri Lanka.'],
            'properties.commercial'=>['Commercial properties','Explore commercial properties for sale in Sri Lanka.'],
        ];
        foreach ($additional as $key=>[$heading,$intro]) $pages[$key]=[__($heading).' | Lassana Property',__($intro)];
        if ($route==='services.show' && ($page=config('public_pages.'.$request->route('page')))) {
            $pages[$route]=[__($page['title']).' | Lassana Property',__($page['intro'])];
        }
        if ($route==='guides.show' && ($guide=config('property_guides.'.$request->route('guide')))) {
            $pages[$route]=[__($guide['title']).' | Lassana Property',__($guide['summary'])];
        }
        [$title,$description] = $pages[$route] ?? ['Lassana Property','Find land, houses and apartments with Lassana Property.'];
        $url = $request->url();
        $public = isset($pages[$route]) || in_array($route,['properties.index','properties.rent','listings-real-estate','agents.show','properties.show']);
        $robots = $public ? 'index, follow' : 'noindex, nofollow';
        if (in_array($route,['index','home-real-estate'])) $url = route('index');
        if (in_array($route,['properties.index','properties.rent','listings-real-estate'])) {
            $types = ['land'=>'Land','house'=>'Houses','apartment'=>'Apartments','villa'=>'Villas','apartments-villas'=>'Apartments & villas','commercial'=>'Commercial properties'];
            $type = $types[$request->query('category','')] ?? 'Properties';
            $location = collect([$request->query('city'),$request->query('district')])->filter()->unique()->implode(', ');
            $location = $location ?: 'Sri Lanka';
            if ($route === 'properties.rent') $type .= ' for rent';
            $title = $type.' in '.$location.' | Lassana Property';
            $description = 'Browse '.strtolower($type).' in '.$location.'. Compare prices, photos and key features, and enquire with Lassana Property.';
            $params = array_filter($request->only(['category','district','city','location','min_price','max_price','bedrooms','min_land_size','max_land_size','min_floor_area','max_floor_area','sort','page']),fn($v)=>is_scalar($v) && $v!=='');
            $url = route($route === 'properties.rent' ? 'properties.rent' : 'properties.index',$params);
            if ($request->hasAny(['location','min_price','max_price','bedrooms','min_land_size','max_land_size','min_floor_area','max_floor_area','sort']) || $request->integer('page',1)>1) $robots='noindex, follow';
        }
        if (in_array($route,['agents.index','developers.index','developers.show']) && $request->integer('page',1)>1) {
            $url=$request->url().'?page='.$request->integer('page');
            $robots='noindex, follow';
        }
        if (isset($additional[$route]) && str_starts_with($route,'properties.')) {
            $params=array_filter($request->query(),fn($value)=>is_scalar($value) && $value!=='');
            if ($params) { $url=$request->url().'?'.http_build_query($params); $robots='noindex, follow'; }
        }
        return compact('title','description','url','robots');
    }
}
