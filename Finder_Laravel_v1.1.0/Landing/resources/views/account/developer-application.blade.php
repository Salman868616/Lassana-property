@extends('layouts.app')
@section('title','Developer company registration | Lassana Property')
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5" style="max-width:800px">
<a href="{{ route('account-profile') }}">Back to my profile</a><h1 class="h2 mt-4">Developer company registration</h1>
<p>Submit your company details for review. Our team manages company profiles and property links in the developer directory.</p>
@if(session('success'))<div class="alert alert-success" role="status">{{ session('success') }}</div>@endif
@if($errors->any())<div class="alert alert-danger" role="alert">@foreach($errors->all() as $error)<p class="mb-1">{{ $error }}</p>@endforeach</div>@endif
@if($application)<section class="border rounded p-4 mb-4"><h2 class="h5">Registration status: {{ ucfirst($application->status) }}</h2><p>Company: {{ $application->company_name }}</p>
@if($application->review_notes)<p style="white-space:pre-wrap;overflow-wrap:anywhere">{{ $application->review_notes }}</p>@endif
@if($application->status==='approved')<p>The company has been approved for a directory profile. Our team confirms the public details before publishing it.</p>@if($application->developer?->is_published)<a href="{{ route('developers.show',$application->developer) }}">View company profile</a>@endif
@elseif($application->status==='pending')<p class="mb-0">Your registration is awaiting admin review.</p>@endif</section>@endif
@if(!$application || $application->status==='rejected')
<form method="POST" action="{{ route('account.developer-application.store') }}" class="border rounded p-4">@csrf
<p class="small text-body-secondary">Your account name and email will be used for follow-up. The contact phone below is for our team; it is not automatically published.</p>
<div class="row g-3">@foreach(['company_name'=>['Company name','text',150],'city'=>['City','text',100],'phone'=>['Contact phone','tel',30],'website'=>['Company website (optional)','url',500]] as $field=>[$label,$type,$max])
<div class="col-md-6"><label class="form-label" for="company-{{ $field }}">{{ $label }}</label><input class="form-control" id="company-{{ $field }}" name="{{ $field }}" type="{{ $type }}" maxlength="{{ $max }}" value="{{ old($field,$application?->{$field} ?? ($field === 'phone' ? auth()->user()->phone : '')) }}" @required($field!=='website')></div>@endforeach
<div class="col-12"><label class="form-label" for="company-description">Tell us about your company and projects</label><textarea class="form-control" id="company-description" name="description" maxlength="5000" rows="5" required>{{ old('description',$application?->description) }}</textarea></div></div>
<button class="btn btn-primary mt-4" type="submit">Submit company registration</button>
</form>@endif
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
