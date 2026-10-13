<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\SavedProperty;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::where('status', 'published')->where('is_featured', true)
            ->with(['images', 'details'])
            ->orderByDesc('featured_at')->orderByDesc('id')->limit(6)->get();
        $verifiedProperties = Property::where('status','published')->whereIn('verification_level',['basic','silver'])->with(['images','details'])->orderByDesc('published_at')->orderByDesc('id')->limit(3)->get();
        $latestProperties = Property::where('status', 'published')
            ->with(['images', 'details'])
            ->orderByDesc('published_at')->orderByDesc('id')->limit(6)->get();
        $savedPropertyIds = auth()->check() && auth()->user()->hasRole('buyer')
            ? SavedProperty::where('user_id', auth()->id())->whereIn('property_id', $latestProperties->merge($featuredProperties)->merge($verifiedProperties)->modelKeys())->pluck('property_id')->all()
            : [];
        $propertyCities = Property::where('status', 'published')->where('listing_type', 'sale')
            ->whereNotNull('city')->where('city', '<>', '')
            ->whereNotNull('district')->where('district', '<>', '')
            ->select('district', 'city')->selectRaw('COUNT(*) as property_count')
            ->groupBy('district', 'city')->orderByDesc('property_count')
            ->orderBy('district')->orderBy('city')->limit(6)->get();
        $agents = \App\Models\User::where('is_active', true)
            ->whereHas('roles', fn ($query) => $query->where('name', 'agent'))
            ->withCount(['assignedProperties as published_properties_count' => fn ($query) => $query->where('status', 'published')])
            ->orderBy('name')->orderBy('id')->limit(4)->get();
        $testimonials = \App\Models\Testimonial::published()->orderBy('display_order')->latest('id')->limit(6)->get();
        return view('home.home-real-estate', compact('testimonials', 'verifiedProperties', 'featuredProperties', 'latestProperties', 'savedPropertyIds', 'propertyCities', 'agents'));
    }
}
