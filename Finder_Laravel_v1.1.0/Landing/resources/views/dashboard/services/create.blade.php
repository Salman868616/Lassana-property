@extends('layouts.dashboard')
@section('content')
<a class="d-inline-block mb-3" href="{{ route('buyer.services.index') }}">My service requests</a>
<form class="card p-4" method="POST" action="{{ route('buyer.services.store') }}">
@csrf
<input type="hidden" name="type" value="{{ $type }}">
<p>{{ $type === 'inspection' ? 'Request an inspection of a listed property. Our team will contact you to agree the details.' : 'Describe the LGC service you need and where it is needed. Our team will contact you to discuss your request.' }}</p>
<p class="text-secondary">Your account name and email will be used for follow-up. A preferred date is a request, not a confirmed appointment.</p>
<div class="row g-3">
<div class="col-md-6">
    <label class="form-label" for="property-code">Property reference{{ $type === 'lgc_service' ? ' (optional)' : '' }}</label>
    <input class="form-control" id="property-code" name="property_code" maxlength="100" value="{{ old('property_code', $property?->property_code) }}" @required($type === 'inspection') aria-describedby="property-code-help">
    <div class="form-text" id="property-code-help">{{ $property?->title ?? 'Use the reference shown on the property listing, or open the request from its detail page.' }}</div>
    @error('property_code')<p class="text-danger" role="alert">{{ $message }}</p>@enderror
</div>
<div class="col-md-6"><label class="form-label" for="phone">Contact phone</label><input class="form-control" type="tel" id="phone" name="phone" maxlength="30" value="{{ old('phone', auth()->user()->phone) }}" required>@error('phone')<p class="text-danger" role="alert">{{ $message }}</p>@enderror</div>
@if($type === 'lgc_service')
<div class="col-12"><label class="form-label" for="service">Service</label><select class="form-select" name="service" id="service">@foreach(\App\Models\BuyerServiceRequest::SERVICES as $key=>$label)<option value="{{ $key }}" @selected(old('service',$service ?? 'general') === $key)>{{ $label }}</option>@endforeach</select>@error('service')<p class="text-danger" role="alert">{{ $message }}</p>@enderror</div>
<div class="col-12"><label class="form-label" for="location">Area / address</label><input class="form-control" id="location" name="location" maxlength="255" value="{{ old('location') }}"><div class="form-text">Required when no property reference is provided.</div>@error('location')<p class="text-danger" role="alert">{{ $message }}</p>@enderror</div>
@endif
<div class="col-md-6"><label class="form-label" for="preferred-date">Preferred date (optional, Sri Lanka time)</label><input class="form-control" type="date" id="preferred-date" name="preferred_date" min="{{ now('Asia/Colombo')->toDateString() }}" value="{{ old('preferred_date') }}">@error('preferred_date')<p class="text-danger" role="alert">{{ $message }}</p>@enderror</div>
<div class="col-12"><label class="form-label" for="message">{{ $type === 'inspection' ? 'Inspection requirements' : 'Service required and details' }}</label><textarea class="form-control" id="message" name="message" rows="4" maxlength="5000" required>{{ old('message') }}</textarea>@error('message')<p class="text-danger" role="alert">{{ $message }}</p>@enderror</div>
</div>
<div class="mt-4"><button class="btn btn-lp" type="submit">Submit request</button></div>
</form>
@endsection
