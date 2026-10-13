@extends('layouts.dashboard')
@section('content')
<a class="d-inline-block mb-3" href="{{ route('dashboard.role','buyer') }}">Back to dashboard</a>
<form class="card p-4" method="POST" action="{{ route('buyer.requests.store') }}">
@csrf
<p>Tell our sales team what you are looking for. Your account name and email will be used to contact you.</p>
<div class="row g-3">
<div class="col-md-6"><label class="form-label" for="category">Property type</label><select class="form-select" id="category" name="category" required><option value="">Choose property type</option>@foreach($categories as $category)<option value="{{ $category->slug }}" @selected(old('category')===$category->slug)>{{ $category->name }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label" for="phone">Contact phone (optional)</label><input class="form-control" id="phone" name="phone" type="tel" maxlength="30" value="{{ old('phone') }}"></div>
<div class="col-12"><x-location-fields :required="true" /></div>
<div class="col-md-6"><label class="form-label" for="budget-min">Minimum budget (LKR, optional)</label><input class="form-control" id="budget-min" name="budget_min" type="number" min="0" max="999999999999.99" step="0.01" value="{{ old('budget_min') }}"></div>
<div class="col-md-6"><label class="form-label" for="budget-max">Maximum budget (LKR)</label><input class="form-control" id="budget-max" name="budget_max" type="number" min="1" max="999999999999.99" step="0.01" value="{{ old('budget_max') }}" required></div>
<div class="col-md-6"><label class="form-label" for="bedrooms">Minimum bedrooms (optional)</label><input class="form-control" id="bedrooms" name="bedrooms" type="number" min="0" max="50" value="{{ old('bedrooms') }}"><div class="form-text">For houses and apartments only.</div></div>
<div class="col-12"><label class="form-label" for="requirements">Other requirements</label><textarea class="form-control" id="requirements" name="requirements" rows="4" maxlength="5000" placeholder="For example: a house near schools, with parking for two vehicles." required>{{ old('requirements') }}</textarea></div>
</div>
<div class="mt-4"><button class="btn btn-lp" type="submit">Submit property request</button></div>
</form>
@endsection
