@extends('layouts.dashboard')
@section('content')
<a href="{{ route('admin.agent-applications.index') }}">Back to applications</a>
<section class="card p-4 my-4"><h2 class="h5">{{ $application->user->name }}</h2><p>{{ $application->user->email }}</p>
<dl><dt>Phone</dt><dd>{{ $application->phone }}</dd><dt>Agency</dt><dd>{{ $application->agency_name ?: 'Independent agent' }}</dd><dt>Service areas</dt><dd>{{ $application->service_areas }}</dd><dt>Professional introduction</dt><dd style="white-space:pre-line">{{ $application->bio }}</dd><dt>Status</dt><dd>{{ ucfirst($application->status) }}</dd></dl>
@if($application->status==='pending')
<form method="POST" action="{{ route('admin.agent-applications.review',$application) }}">@csrf
<label class="form-label" for="review-notes">Review notes (visible to applicant)</label><textarea class="form-control mb-3" id="review-notes" name="review_notes" maxlength="2000" required>{{ old('review_notes') }}</textarea>
<button class="btn btn-lp" type="submit" name="decision" value="approved">Approve agent</button> <button class="btn btn-outline-danger" type="submit" name="decision" value="rejected">Reject application</button></form>
@else <p>Reviewed by {{ $application->reviewer?->name ?? 'Administrator' }} · {{ $application->reviewed_at?->timezone('Asia/Colombo')->format('d M Y h:i A') }}</p><p style="white-space:pre-line">{{ $application->review_notes }}</p> @endif
</section>
@endsection
