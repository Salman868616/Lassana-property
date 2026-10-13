@extends('layouts.dashboard')
@section('content')
<a href="{{ route($admin ? 'admin.complaints.index' : 'complaints.index') }}">Back to complaints</a>
<section class="card p-4 my-3"><h2 class="h5">#{{ $item->id }} · {{ $item->subject }}</h2><p>{{ \App\Models\Complaint::STATUSES[$item->status] }} · {{ ucfirst($item->category) }}</p>
@if($admin)<p>Submitted by: {{ $item->user->name }}</p>@endif
@if($item->property_reference)<p>Property reference: {{ $item->property_reference }}</p>@endif
<p class="mb-0" style="white-space:pre-wrap">{{ $item->message }}</p></section>
@if($admin)
<form method="POST" action="{{ route('admin.complaints.update',$item) }}" class="card p-4 mb-3">@csrf @method('PUT')
<label for="review-status" class="form-label">Status</label><select id="review-status" name="status" class="form-select mb-3">@foreach(\App\Models\Complaint::STATUSES as $key=>$label)<option value="{{ $key }}" @selected(old('status',$item->status)===$key)>{{ $label }}</option>@endforeach</select>
<label for="review-response" class="form-label">Response (visible to the complainant)</label><textarea id="review-response" name="response" maxlength="5000" rows="4" required class="form-control mb-3">{{ old('response') }}</textarea>
<button class="btn btn-lp align-self-start">Save response</button></form>
@endif
<section class="card p-4"><h2 class="h5">Response history</h2>@forelse($item->updates as $update)<div class="border-bottom py-3"><strong>{{ \App\Models\Complaint::STATUSES[$update->status] }}</strong><p class="small text-secondary">{{ $update->created_at->timezone('Asia/Colombo')->format('d M Y h:i A') }}@if($admin) · {{ $update->reviewer?->name ?? 'Former staff member' }}@endif</p><p class="mb-0" style="white-space:pre-wrap">{{ $update->response }}</p></div>@empty<p class="mb-0">Awaiting a response from our team.</p>@endforelse</section>
@endsection
