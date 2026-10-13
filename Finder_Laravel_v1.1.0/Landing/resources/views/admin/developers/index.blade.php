@extends('layouts.dashboard')
@section('content')
<div class="d-flex flex-wrap gap-3 mb-4"><a class="btn btn-outline-secondary" href="{{ route('admin.developer-applications.index') }}">Review registrations</a><a class="btn btn-lp" href="{{ route('admin.developers.create') }}">Add developer company</a><a class="btn btn-outline-secondary" href="{{ route('developers.index') }}">View public directory</a></div>
<div class="card p-4"><div class="table-responsive"><table class="table"><thead><tr><th>Company</th><th>Visibility</th><th>Linked properties</th><th>Action</th></tr></thead><tbody>
@forelse($developers as $developer)<tr><td>{{ $developer->name }}</td><td>{{ $developer->is_published ? 'Published' : 'Draft' }}</td><td>{{ $developer->properties_count }}</td><td><a href="{{ route('admin.developers.edit',$developer) }}">Manage company</a></td></tr>@empty<tr><td colspan="4">No developer companies have been added.</td></tr>@endforelse
</tbody></table></div>{{ $developers->links() }}</div>
@endsection
