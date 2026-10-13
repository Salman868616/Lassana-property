@extends('layouts.dashboard')
@section('content')
<form method="GET" class="d-flex gap-3 align-items-end mb-4">
<div><label for="complaint-status" class="form-label">Status</label><select id="complaint-status" name="status" class="form-select"><option value="">All statuses</option>@foreach(\App\Models\Complaint::STATUSES as $key=>$label)<option value="{{ $key }}" @selected($status===$key)>{{ $label }}</option>@endforeach</select></div>
<button class="btn btn-lp">Filter</button></form>
<div class="card table-responsive"><table class="table mb-0"><thead><tr><th>Complaint</th>@if($admin)<th>Submitted by</th>@endif<th>Status</th><th>Submitted</th></tr></thead><tbody>
@forelse($items as $item)<tr><td><a href="{{ route($admin ? 'admin.complaints.show' : 'complaints.show',$item) }}">#{{ $item->id }} · {{ $item->subject }}</a></td>@if($admin)<td>{{ $item->user->name }}</td>@endif<td>{{ \App\Models\Complaint::STATUSES[$item->status] }}</td><td>{{ $item->created_at->timezone('Asia/Colombo')->format('d M Y') }}</td></tr>
@empty<tr><td colspan="{{ $admin ? 4 : 3 }}">No complaints found.</td></tr>@endforelse
</tbody></table></div>{{ $items->links('pagination::bootstrap-5') }}
@endsection
