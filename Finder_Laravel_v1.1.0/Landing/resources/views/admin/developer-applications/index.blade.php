@extends('layouts.dashboard')
@section('content')
<div class="d-flex flex-wrap gap-3 mb-4">@foreach(['pending','approved','rejected'] as $state)<a class="btn {{ $status===$state ? 'btn-lp' : 'btn-outline-secondary' }}" href="{{ route('admin.developer-applications.index',['status'=>$state]) }}">{{ ucfirst($state) }}</a>@endforeach</div>
<div class="card p-4"><div class="table-responsive"><table class="table"><thead><tr><th>Company</th><th>Applicant</th><th>City</th><th>Action</th></tr></thead><tbody>
@forelse($applications as $application)<tr><td>{{ $application->company_name }}</td><td>{{ $application->user->name }}</td><td>{{ $application->city }}</td><td><a href="{{ route('admin.developer-applications.show',$application) }}">Review registration</a></td></tr>@empty<tr><td colspan="4">No {{ $status }} developer registrations.</td></tr>@endforelse
</tbody></table></div>{{ $applications->links() }}</div>
@endsection
