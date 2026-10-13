<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class PropertyController extends Controller
{
    private function eligibleOwners(): \Illuminate\Database\Eloquent\Builder
    {
        return User::where('is_active', true)
            ->whereHas('roles', fn ($roles) => $roles->where('name', 'seller'));
    }

    public function index(Request $request)
    {
        $filters = $request->validate([
            'queue'=>['nullable','in:review'],
            'status'=>['nullable','in:draft,submitted,under_review,approved,published,sold,archived'],
        ]);
        $reviewQueue = ($filters['queue'] ?? '') === 'review';
        $statuses = $reviewQueue ? ['submitted','under_review','approved'] : ['draft','submitted','under_review','approved','published','sold','archived'];
        $status = $filters['status'] ?? '';
        if ($status && ! in_array($status, $statuses, true)) {
            throw ValidationException::withMessages(['status'=>'Choose a status available in this queue.']);
        }
        $query = Property::with('owner');
        if ($reviewQueue) $query->whereIn('status', $statuses);
        if ($status) $query->where('status', $status);
        $properties = ($reviewQueue ? $query->orderBy('updated_at')->orderBy('id') : $query->orderByDesc('id'))
            ->paginate(15)->withQueryString();
        return view('admin.properties.index', compact('properties', 'reviewQueue', 'statuses', 'status'));
    }

    public function create()
    {
        $owners = $this->eligibleOwners()->orderBy('name')
            ->get(['id', 'name', 'email']);

        return view('admin.properties.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'owner_id' => ['bail', 'required', 'integer', function ($attribute, $value, $fail) {
                if (!$this->eligibleOwners()->whereKey($value)->exists()) $fail('Choose an active seller as the property owner.');
            }],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:10000'],
            'site_concerns' => ['nullable', 'string', 'max:3000'],
            'district' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:255'],

            'latitude' => [
    'nullable',
    'required_with:longitude',
    'numeric',
    'between:-90,90',
],
'longitude' => [
    'nullable',
    'required_with:latitude',
    'numeric',
    'between:-180,180',
],

              'price_per_perch' => [
    'nullable', 'numeric', 'decimal:0,2',
    'gt:0', 'max:999999999999.99',
],
'road_access' => ['nullable', 'string', 'max:255'],
'land_shape' => ['nullable', 'string', 'max:100'],
'facing_direction' => [
    'nullable',
    'in:north,northeast,east,southeast,south,southwest,west,northwest',
],
'electricity_available' => ['nullable', 'boolean'],
'water_available' => ['nullable', 'boolean'],
'survey_available' => ['nullable', 'boolean'],

            'land_size_perches' => [
                'nullable', 'numeric', 'decimal:0,4',
                'gt:0', 'max:9999999999.9999',
            ],
            'total_price' => [
                'nullable', 'numeric', 'decimal:0,2',
                'gt:0', 'max:999999999999.99',
            ],
            'images' => ['nullable', 'array', 'max:10'],
'images.*' => [
    'required',
    'image',
    'mimes:jpg,jpeg,png,webp',
    'max:2048',
    'dimensions:max_width=6000,max_height=6000',
],
        ]);
        

        $data = \App\Services\LocationCatalog::validate($data, $property ?? null);
    $ownerId = $data['owner_id'];
       unset($data['owner_id'], $data['images']);

        $property = new Property($data);

        // Set these internally, rather than accepting form values.
        $property->owner_id = $ownerId;
        $property->created_by = $request->user()->id;
        $property->currency = 'LKR';
        $property->status = 'draft';
        $property->verification_level = 'unverified';

$this->savePropertyWithImages($request, $property);

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Draft property created successfully.');
    }


    public function edit(Property $property)
{
    abort_unless($property->status === 'draft', 403, 'Return this listing to draft before editing.');
    $owners = $this->eligibleOwners()->orderBy('name')
        ->get(['id', 'name', 'email']);

    return view('admin.properties.edit', compact('property', 'owners'));
}

public function update(Request $request, Property $property)
{
    abort_unless($property->status === 'draft', 403, 'Return this listing to draft before editing.');
    $data = $request->validate([
        'owner_id' => ['bail', 'required', 'integer', function ($attribute, $value, $fail) {
                if (!$this->eligibleOwners()->whereKey($value)->exists()) $fail('Choose an active seller as the property owner.');
            }],
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string', 'max:10000'],
            'site_concerns' => ['nullable', 'string', 'max:3000'],
        'district' => ['nullable', 'string', 'max:100'],
        'city' => ['nullable', 'string', 'max:100'],
        'location' => ['nullable', 'string', 'max:255'],

        'latitude' => [
    'nullable',
    'required_with:longitude',
    'numeric',
    'between:-90,90',
],
'longitude' => [
    'nullable',
    'required_with:latitude',
    'numeric',
    'between:-180,180',
],

           'price_per_perch' => [
    'nullable', 'numeric', 'decimal:0,2',
    'gt:0', 'max:999999999999.99',
],
'road_access' => ['nullable', 'string', 'max:255'],
'land_shape' => ['nullable', 'string', 'max:100'],
'facing_direction' => [
    'nullable',
    'in:north,northeast,east,southeast,south,southwest,west,northwest',
],
'electricity_available' => ['nullable', 'boolean'],
'water_available' => ['nullable', 'boolean'],
'survey_available' => ['nullable', 'boolean'],
        'land_size_perches' => [
            'nullable', 'numeric', 'decimal:0,4',
            'gt:0', 'max:9999999999.9999',
        ],
        'total_price' => [
            'nullable', 'numeric', 'decimal:0,2',
            'gt:0', 'max:999999999999.99',
        ],
        'images' => ['nullable', 'array', 'max:10'],
'images.*' => [
    'required',
    'image',
    'mimes:jpg,jpeg,png,webp',
    'max:2048',
    'dimensions:max_width=6000,max_height=6000',
],
    ]);

    $data = \App\Services\LocationCatalog::validate($data, $property ?? null);
    $ownerId = $data['owner_id'];
    unset($data['owner_id'], $data['images']);;

   $property->fill($data);
$property->owner_id = $ownerId;
$this->savePropertyWithImages($request, $property);

    return redirect()
        ->route('admin.properties.index')
        ->with('success', 'Property details updated successfully.');
}

private function savePropertyWithImages(
    Request $request,
    Property $property
): void {
    $upload = new \App\Services\PropertyVideoUpload();
    $videoData = $upload->validate($request);
    $storedPaths = [];

    try {
        DB::transaction(function () use (
            $request,
            $property,
            &$storedPaths, $upload, $videoData
        ) {
            if ($property->exists) {
                $locked = Property::lockForUpdate()->findOrFail($property->id);
                abort_unless($locked->status === 'draft', 403, 'Return this listing to draft before editing.');
                $property->video_path = $locked->video_path;
                $property->video_url = $locked->video_url;
            }
            $existingPhotos = $property->exists ? $property->images()->count() : 0;
            if ($existingPhotos + count($request->file('images', [])) > 10) {
                throw ValidationException::withMessages(['images'=>'A listing can have up to 10 photos in total.']);
            }
            $categoryFields = app(\App\Services\PropertyCategoryFields::class);
            $details = $categoryFields->prepare($request, $property);
            $creating = ! $property->exists;
            $property->save();
            if ($creating) \App\Models\PropertyStatusHistory::record($property, null, $request->user());
            $categoryFields->save($property, $details);

            $upload->save($request, $property, $videoData);
            $sortOrder = (int) $property->images()->max('sort_order');

            foreach ($request->file('images', []) as $image) {
                $path = $image->store(
                    'properties/'.$property->id,
                    'public'
                );

                if ($path === false) {
                    throw new \RuntimeException('Could not save the photo.');
                }

                $storedPaths[] = $path;

                $property->images()->create([
                    'path' => $path,
                    'sort_order' => ++$sortOrder,
                ]);
            }
        });
    } catch (\Throwable $exception) {
        $upload->rollback();
        foreach ($storedPaths as $path) {
            Storage::disk('public')->delete($path);
        }

        throw $exception;
    }
    $upload->committed();
}
public function destroyImage(Property $property, int $image)
{
    DB::transaction(function () use ($property, $image) {
        $listing = Property::lockForUpdate()->findOrFail($property->id);
        abort_unless($listing->status === 'draft', 403, 'Return this listing to draft before removing photos.');
        $photo = $listing->images()->whereKey($image)->firstOrFail();
        if (! Storage::disk('public')->delete($photo->path)) {
            throw ValidationException::withMessages(['images'=>'The photo could not be removed.']);
        }
        $photo->delete();
    });
    return redirect()->route('admin.properties.edit', $property)->with('success', 'Photo removed successfully.');
}
public function submit(Request $request, Property $property)
{
    app(\App\Services\PropertyReviewWorkflow::class)->submit($property->id, $request->user());

    return redirect()
        ->route('admin.properties.index')
        ->with('success', 'Property submitted for review.');
}
public function startReview(Request $request, Property $property)
{
    app(\App\Services\PropertyReviewWorkflow::class)->start($property->id, $request->user());
    return redirect()->route('dashboard.property', ['role'=>'admin','property'=>$property->id])
        ->with('success', 'Property sent for verification.');
}

public function approve(Request $request, Property $property)
{
    app(\App\Services\PropertyReviewWorkflow::class)->approve($property->id, $request->user());
    return redirect()->route('dashboard.property', ['role'=>'admin','property'=>$property->id])
        ->with('success', 'Listing approved. It is ready to publish.');
}

public function returnToDraft(Request $request, Property $property)
{
    $data = $request->validate(['remarks'=>['required','string','max:5000']]);
    app(\App\Services\PropertyReviewWorkflow::class)->returnForCorrections($property->id, $request->user(), $data['remarks'], true);
    return redirect()->route('dashboard.property', ['role'=>'admin','property'=>$property->id])
        ->with('success', 'Property returned to draft. Previous verification is no longer valid.');
}

public function markSold(Request $request, Property $property)
{
    app(\App\Services\PropertyReviewWorkflow::class)->markSold($property->id, $request->user());
    return redirect()->route('dashboard.property', ['role'=>'admin','property'=>$property->id])
        ->with('success', 'Property marked as sold. It is no longer listed publicly.');
}

public function archive(Request $request, Property $property)
{
    app(\App\Services\PropertyReviewWorkflow::class)->archive($property->id, $request->user());
    return redirect()->route('dashboard.property', ['role'=>'admin','property'=>$property->id])
        ->with('success', 'Property archived. Its records are retained and the listing is no longer public.');
}

public function unpublish(Request $request, Property $property)
{
    $data = $request->validate(['remarks'=>['required','string','max:5000']]);
    app(\App\Services\PropertyReviewWorkflow::class)->unpublish($property->id, $request->user(), $data['remarks']);
    return redirect()->route('dashboard.property', ['role'=>'admin','property'=>$property->id])
        ->with('success', 'Property unpublished. It remains approved and can be published again.');
}

public function publish(Request $request, Property $property)
{
    app(\App\Services\PropertyReviewWorkflow::class)->publish($property->id, $request->user());
    return redirect()->route('dashboard.property', ['role'=>'admin','property'=>$property->id])
        ->with('success', 'Property published successfully.');
}
}
