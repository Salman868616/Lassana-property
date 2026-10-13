@extends('layouts.dashboard')
@section('content')
<a href="{{ route('admin.users.index') }}">Back to users</a>
<form method="GET" class="d-flex align-items-end gap-3 my-4"><div><label for="application-status" class="form-label">Status</label><select id="application-status" name="status" class="form-select">@foreach(['pending','approved','rejected'] as $value)<option value="{{ $value }}" @selected($status===$value)>{{ ucfirst($value) }}</option>@endforeach</select></div><button class="btn btn-lp" type="submit">Filter</button></form>
<div class="card table-responsive"><table class="table mb-0"><thead><tr><th>Applicant</th><th>Email</th><th>Service areas</th><th>Action</th></tr></thead><tbody>
@forelse($applications as $application)<tr><td>{{ $application->user->name }}</td><td>{{ $application->user->email }}</td><td>{{ $application->service_areas }}</td><td><a href="{{ route('admin.agent-applications.show',$application) }}">View application</a></td></tr>
@empty <tr><td colspan="4">No {{ $status }} applications.</td></tr>@endforelse
</tbody></table></div>{{ $applications->links('pagination::bootstrap-5') }}
@endsection
