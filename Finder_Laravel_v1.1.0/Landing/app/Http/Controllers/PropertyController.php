<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    private function savedIds($properties): array
    {
        if (!auth()->check() || !auth()->user()->hasRole('buyer')) return [];
        return \App\Models\SavedProperty::where('user_id',auth()->id())
            ->whereIn('property_id',$properties->getCollection()->modelKeys())
            ->pluck('property_id')->all();
    }
public function index(Request $request)
{
    $fixedCategory = match ($request->route()?->getName()) {
        'properties.land'=>'land', 'properties.houses'=>'house',
        'properties.apartments-villas'=>'apartments-villas', 'properties.commercial'=>'commercial', default=>null,
    };
    if ($fixedCategory) $request->merge(['category'=>$fixedCategory]);
    $filters = $request->validate([
        'location' => ['nullable', 'string', 'max:100'],
        'district' => ['nullable', 'string', 'max:100'],
        'city' => ['nullable', 'string', 'max:100'],
        'category' => ['nullable', 'in:land,house,apartment,villa,commercial,apartments-villas'],
        'min_price' => ['nullable', 'numeric', 'min:0'],
        'max_price' => ['nullable', 'numeric', 'min:0', ...($request->filled('min_price') ? ['gte:min_price'] : [])],
        'bedrooms' => ['exclude_if:category,land,commercial', 'nullable', 'integer', 'min:0', 'max:100'],
        'min_land_size' => ['exclude_if:category,apartment,commercial,apartments-villas', 'nullable', 'numeric', 'min:0'],
        'max_land_size' => ['exclude_if:category,apartment,commercial,apartments-villas', 'nullable', 'numeric', 'min:0', ...($request->filled('min_land_size') ? ['gte:min_land_size'] : [])],
        'min_floor_area' => ['exclude_if:category,land', 'nullable', 'numeric', 'min:0'],
        'max_floor_area' => ['exclude_if:category,land', 'nullable', 'numeric', 'min:0', ...($request->filled('min_floor_area') ? ['gte:min_floor_area'] : [])],
        'sort' => ['nullable', 'in:newest,price_asc,price_desc'],
    ]);

    $location = trim($filters['location'] ?? '');
    $category = $filters['category'] ?? '';
    $minPrice = (float) ($filters['min_price'] ?? 0);
    $sort = $filters['sort'] ?? 'newest';

    $rentalPage = $request->routeIs('properties.rent');
    $verifiedPage = $request->routeIs('properties.verified');
    $allPage = $request->routeIs('properties.all');
    $listingRoute = in_array($request->route()?->getName(), ['properties.rent','properties.all','properties.verified','properties.land','properties.houses','properties.apartments-villas','properties.commercial']) ? $request->route()->getName() : 'properties.index';
    $pageHeading = match ($listingRoute) {
        'properties.rent'=>'Properties for rent', 'properties.all'=>'All properties', 'properties.verified'=>'Verified properties',
        'properties.land'=>'Land for sale', 'properties.houses'=>'Houses for sale',
        'properties.apartments-villas'=>'Apartments & villas', 'properties.commercial'=>'Commercial properties', default=>'Properties',
    };
    if ($fixedCategory) $listingRoute = 'properties.index';
    $query = Property::query()
        ->where('status', 'published')
        ->when(!$allPage && !$verifiedPage, fn ($query) => $query->where('listing_type', $rentalPage ? 'rent' : 'sale'))
        ->when($verifiedPage, fn ($query) => $query->whereIn('verification_level', ['basic','silver']))
        ->with(['images','details']);

    foreach (['district', 'city'] as $field) {
        if (!empty($filters[$field])) $query->whereRaw('LOWER('.$field.') = ?', [strtolower(trim($filters[$field]))]);
    }

    if ($location !== '') {
        $query->where(function ($query) use ($location) {
            $query->where('district', 'like', '%' . $location . '%')
                ->orWhere('city', 'like', '%' . $location . '%')
                ->orWhere('location', 'like', '%' . $location . '%');
        });
    }

    if ($category !== '') {
        $query->whereIn('category', $category === 'apartments-villas' ? ['apartment', 'villa'] : [$category]);
    }

    // Apply every supplied bound, including zero; unknown values do not match.
    foreach (['price' => 'total_price', 'land_size' => 'land_size_perches'] as $filter => $column) {
        foreach (['min' => '>=', 'max' => '<='] as $bound => $operator) {
            $value = $filters[$bound.'_'.$filter] ?? null;
            if ($value !== null) $query->where($column, $operator, $value);
        }
    }
    if (($filters['bedrooms'] ?? null) !== null) {
        $query->whereIn('category', ['house', 'apartment', 'villa'])
            ->whereHas('details', fn ($details) => $details->where('bedrooms', $filters['bedrooms']));
    }
    if (($filters['min_floor_area'] ?? null) !== null || ($filters['max_floor_area'] ?? null) !== null) {
        $query->whereIn('category', ['house', 'apartment', 'villa', 'commercial'])
            ->whereHas('details', function ($details) use ($filters) {
                if (($filters['min_floor_area'] ?? null) !== null) $details->where('floor_area', '>=', $filters['min_floor_area']);
                if (($filters['max_floor_area'] ?? null) !== null) $details->where('floor_area', '<=', $filters['max_floor_area']);
            });
    }

    if ($sort === 'price_asc' || $sort === 'price_desc') {
        $query->orderByRaw('total_price IS NULL')
            ->orderBy(
                'total_price',
                $sort === 'price_asc' ? 'asc' : 'desc'
            )
            ->orderByDesc('id');
    } else {
        $query->orderByDesc('published_at')
            ->orderByDesc('id');
    }

    $properties = $query->paginate(6)->appends($filters);
    $savedPropertyIds = $this->savedIds($properties);

    return view('properties.index', compact(
        'properties',
        'savedPropertyIds',
        'location',
        'category',
        'minPrice',
        'sort',
        'rentalPage',
        'listingRoute',
        'pageHeading',
        'verifiedPage'
    ));
}
public function finderIndex(Request $request)
{
    return $this->index($request);
}

public function mapMarkers()
{
    $markers = Property::query()
        ->where('status', 'published')
        ->where('listing_type', 'sale')
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        ->with(['images','details'])
        ->get()
        ->map(function (Property $property) {
            return [
                'id' => $property->id,
                'image' => $property->images->first()
                    ? asset('storage/'.$property->images->first()->path)
                    : null,
                'price' => $property->total_price !== null
                    ? number_format($property->total_price, 2)
                    : 'On request',
                'address' => collect([
                    $property->location,
                    $property->city,
                    $property->district,
                ])->filter()->implode(', '),
                'coordinates' => [
                    'lat' => (float) $property->latitude,
                    'lng' => (float) $property->longitude,
                ],
            ];
        })
        ->values();

    return response()->json($markers);
}

    public function show(string $propertyCode)
    {
        $property = Property::query()
            ->where('status', 'published')
            ->where(function ($query) use ($propertyCode) {
                $query->where('property_code', $propertyCode)
                    ->orWhereIn('id', \Illuminate\Support\Facades\DB::table('property_code_aliases')
                        ->select('property_id')->where('code', $propertyCode));
            })
            ->with(['images','details','developer','owner:id,name','agent:id,name,is_active'])
            ->firstOrFail();

        if ($property->property_code !== $propertyCode) {
            return redirect()->route('properties.show', $property->property_code, 301);
        }

        $saved = auth()->check() && auth()->user()->hasRole('buyer')
            && \App\Models\SavedProperty::where('user_id',auth()->id())->where('property_id',$property->id)->exists();
        $location = collect([$property->city, $property->district])->filter()->implode(', ');
        $price = $property->priceLabel();
        $excerpt = preg_replace('/\s+/u', ' ', strip_tags($property->description ?? ''));
        $share = [
            'url' => route('properties.show', $property->property_code),
            'title' => $property->title.' | Lassana Property',
            'description' => \Illuminate\Support\Str::limit(collect([$location, $price, trim($excerpt)])->filter()->implode(' — '), 200),
            'image' => $property->images->first()
                ? asset('storage/'.$property->images->first()->path)
                : asset('assets/img/lassana-property-logo.png'),
        ];
        $share['text'] = $property->title."\n".$location."\n".$price."\n".$property->property_code;
        $share['whatsapp'] = 'https://wa.me/?text='.rawurlencode($share['text']."\n".$share['url']);
        $contact = app(\App\Services\PropertyContact::class)->forProperty($property);
        return view('properties.show', compact('property','saved','share','contact'));
    }
}
