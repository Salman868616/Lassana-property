<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyCategory;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SellerPropertyController extends Controller
{
    protected function workspaceRole(): string { return 'seller'; }

    public function create(Request $request)
    {
        return $this->form($request, new Property());
    }

    public function edit(Request $request, int $property)
    {
        return $this->form($request, $this->draft($request, $property));
    }

    private function form(Request $request, Property $property)
    {
        $roles = app(DashboardAccess::class)->roles($request->user());
        $role = $this->workspaceRole();
        $title = $property->exists ? 'Edit draft property' : 'Add property';
        return view('dashboard.seller-form', compact('roles', 'role', 'title', 'property'));
    }

    private function draft(Request $request, int $id, bool $lock = false): Property
    {
        $query = app(DashboardAccess::class)->properties($request->user(), $this->workspaceRole());
        if ($lock) {
            $query->lockForUpdate();
        }
        $property = $query->findOrFail($id);
        abort_unless($property->status === 'draft', 403, 'Only draft properties can be changed.');

        return $property;
    }

    public function store(Request $request)
    {
        return $this->save($request);
    }

    public function update(Request $request, int $property)
    {
        // Check ownership before returning any validation information.
        $this->draft($request, $property);
        return $this->save($request, $property);
    }

    private function save(Request $request, ?int $id = null)
    {
        $data = $request->validate($this->rules());
        $data = \App\Services\LocationCatalog::validate($data, $id ? $this->draft($request, $id) : null);
        unset($data['images']);
        $upload = new \App\Services\PropertyVideoUpload();
        $videoData = $upload->validate($request);
        $storedPaths = [];
        try {
            $property = DB::transaction(function () use ($request, $data, $id, &$storedPaths, $upload, $videoData) {
                $property = $id === null ? new Property() : $this->draft($request, $id, true);
                if ($id === null) {
                    if ($this->workspaceRole() === 'agent') {
                        $request->validate(['seller_email'=>['required','email','max:255']]);
                        $owner = \App\Models\User::where('email', $request->input('seller_email'))
                            ->where('is_active', true)->whereHas('roles', fn ($q) => $q->where('name', 'seller'))
                            ->lockForUpdate()->first();
                        if (!$owner) throw ValidationException::withMessages(['seller_email'=>'Enter the email of an active registered seller. Contact the administrator if the owner needs an account.']);
                        $property->owner_id = $owner->id;
                        $property->agent_id = $request->user()->id;
                    } else {
                        $property->owner_id = $request->user()->id;
                    }
                    $property->created_by = $request->user()->id;


                    $property->currency = 'LKR';
                    $property->status = 'draft';
                    $property->verification_level = 'unverified';
                }
                $files = $request->file('images', []);
                $existing = $property->exists ? $property->images()->count() : 0;
                if ($existing + count($files) > 10) {
                    throw ValidationException::withMessages(['images' => 'A listing can have up to 10 photos in total.']);
                }
                $property->fill($data);
                $categoryFields = app(\App\Services\PropertyCategoryFields::class);
                $details = $categoryFields->prepare($request, $property);
                $property->save();
                if ($id === null) \App\Models\PropertyStatusHistory::record($property, null, $request->user());
                $categoryFields->save($property, $details);
                $order = (int) $property->images()->max('sort_order');
                foreach ($files as $file) {
                    $path = $file->store('properties/'.$property->id, 'public');
                    if ($path === false) {
                        throw new \RuntimeException('Could not save the photo.');
                    }
                    $storedPaths[] = $path;
                    $property->images()->create(['path' => $path, 'sort_order' => ++$order]);
                }
                $upload->save($request, $property, $videoData);
                return $property;
            });
        } catch (\Throwable $error) {
            $upload->rollback();
            foreach ($storedPaths as $path) {
                Storage::disk('public')->delete($path);
            }
            throw $error;
        }
        $upload->committed();
        return redirect()->route('dashboard.property', ['role' => $this->workspaceRole(), 'property' => $property->id])
            ->with('success', 'Your draft property has been saved.');
    }

    public function submit(Request $request, int $property)
    {
        DB::transaction(function () use ($request, $property) {
            $listing = $this->draft($request, $property, true);
            if ($this->workspaceRole() === 'agent' && !\App\Models\User::whereKey($listing->owner_id)->where('is_active', true)->whereHas('roles', fn ($q) => $q->where('name', 'seller'))->exists()) {
                throw ValidationException::withMessages(['owner'=>'The owner must be an active seller before submission. Ask the administrator to correct the owner.']);
            }
            Validator::make([
                'description' => $listing->description,
                'district' => $listing->district,
                'city' => $listing->city,
                'location' => $listing->location,
                'land_size_perches' => $listing->land_size_perches,
                'total_price' => $listing->total_price,
                'photos' => $listing->images()->count(),
            ], [
                'description' => ['required'],
                'district' => ['required'],
                'city' => ['required'],
                'location' => ['required'],
                'land_size_perches' => $listing->category === 'land' ? ['required', 'numeric', 'gt:0'] : ['nullable'],
                'total_price' => ['required', 'numeric', 'gt:0'],
                'photos' => ['integer', 'min:1'],
            ], ['photos.min' => 'Add at least one photo before submitting for review.'])->validate();
            app(\App\Services\PropertyCategoryFields::class)->validateComplete($listing);
            $listing->status = 'submitted';
            $listing->save();
            \App\Models\PropertyStatusHistory::record($listing, 'draft', $request->user());
        });
        return redirect()->route('dashboard.property', ['role' => $this->workspaceRole(), 'property' => $property])
            ->with('success', 'Property submitted for review. Editing is locked while it is being reviewed.');
    }

    private function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:10000'],
            'site_concerns' => ['nullable', 'string', 'max:3000'],
            'district' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:255'],
            'latitude' => ['nullable', 'required_with:longitude', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'required_with:latitude', 'numeric', 'between:-180,180'],
            'land_size_perches' => ['nullable', 'numeric', 'decimal:0,4', 'gt:0', 'max:9999999999.9999'],
            'price_per_perch' => ['nullable', 'numeric', 'decimal:0,2', 'gt:0', 'max:999999999999.99'],
            'total_price' => ['nullable', 'numeric', 'decimal:0,2', 'gt:0', 'max:999999999999.99'],
            'road_access' => ['nullable', 'string', 'max:255'],
            'land_shape' => ['nullable', 'string', 'max:100'],
            'facing_direction' => ['nullable', 'in:north,northeast,east,southeast,south,southwest,west,northwest'],
            'electricity_available' => ['nullable', 'boolean'],
            'water_available' => ['nullable', 'boolean'],
            'survey_available' => ['nullable', 'boolean'],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048', 'dimensions:max_width=6000,max_height=6000'],
        ];
    }
}
