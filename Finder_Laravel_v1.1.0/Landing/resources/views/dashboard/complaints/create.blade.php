@extends('layouts.dashboard')
@section('content')
<a href="{{ route('complaints.index') }}">My complaints</a>
<form method="POST" action="{{ route('complaints.store') }}" class="card p-4 mt-3">
@csrf
<label for="complaint-category" class="form-label">Complaint about</label>
<select id="complaint-category" name="category" class="form-select mb-3"><option value="service" @selected(old('category')==='service')>Service</option><option value="property" @selected(old('category')==='property')>Property</option></select>
<label for="complaint-property" class="form-label">Property reference (required for a property complaint)</label><input id="complaint-property" name="property_reference" value="{{ old('property_reference') }}" maxlength="100" class="form-control mb-3">
<label for="complaint-subject" class="form-label">Subject</label><input id="complaint-subject" name="subject" value="{{ old('subject') }}" maxlength="200" class="form-control mb-3" required>
<label for="complaint-message" class="form-label">Describe the issue</label><textarea id="complaint-message" name="message" rows="5" maxlength="5000" class="form-control mb-3" required>{{ old('message') }}</textarea>
<button class="btn btn-lp align-self-start">Submit complaint</button></form>
@endsection
