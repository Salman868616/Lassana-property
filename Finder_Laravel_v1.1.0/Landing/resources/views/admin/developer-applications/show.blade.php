@extends('layouts.dashboard')
@section('content')
<a href="{{ route('admin.developer-applications.index') }}">Back to registrations</a>
<section class="card p-4 mt-4" style="overflow-wrap:anywhere"><h2 class="h4">{{ $application->company_name }}</h2><p>Status: {{ ucfirst($application->status) }}</p><p>Applicant: {{ $application->user->name }} · {{ $application->user->email }}</p><p>City: {{ $application->city }}</p><p>Contact phone: {{ $application->phone }}</p>@if($application->website)<p>Website: <a href="{{ $application->website }}" target="_blank" rel="noopener noreferrer">{{ $application->website }}</a></p>@endif
<p style="white-space:pre-wrap">{{ $application->description }}</p>
@if($application->status==='pending')
<form method="POST" action="{{ route('admin.developer-applications.review',$application) }}">@csrf
<label class="form-label" for="review-decision">Decision</label><select class="form-select mb-3" id="review-decision" name="decision" required><option value="">Choose decision</option><option value="approved" @selected(old('decision')==='approved')>Approve and create draft company profile</option><option value="rejected" @selected(old('decision')==='rejected')>Reject</option></select>
<label class="form-label" for="review-notes">Notes shared with the applicant</label><textarea class="form-control" id="review-notes" name="review_notes" rows="3" maxlength="2000" required>{{ old('review_notes') }}</textarea>
<p class="form-text">Approval creates a draft directory profile. It does not publish contact information or grant a new account role. Manage the public details from Developer profiles.</p><button type="submit" class="btn btn-lp mt-3">Save decision</button>
</form>@else<p style="white-space:pre-wrap">{{ $application->review_notes }}</p><p class="small">Reviewed by {{ $application->reviewer?->name }} · {{ $application->reviewed_at?->format('d M Y') }}</p>@if($application->developer)<a href="{{ route('admin.developers.edit',$application->developer) }}">Manage company profile</a>@endif @endif
</section>
@endsection
