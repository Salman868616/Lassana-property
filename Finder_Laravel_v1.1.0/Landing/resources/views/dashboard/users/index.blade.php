@extends('layouts.dashboard')
@section('content')
<a class="d-inline-block mb-3" href="{{ route('dashboard.role','admin') }}">Back to admin dashboard</a>
<form method="GET" class="card p-3 mb-4">
    <div class="row g-3 align-items-end">
        <div class="col-md-4"><label for="q" class="form-label">Name or email</label><input id="q" name="q" class="form-control" value="{{ $filters['q'] ?? '' }}" maxlength="150"></div>
        <div class="col-md-3"><label for="role" class="form-label">Role</label><select id="role" name="role" class="form-select"><option value="">All roles</option>@foreach(\App\Services\DashboardAccess::ROLES as $key=>$label)<option value="{{ $key }}" @selected(($filters['role'] ?? '') === $key)>{{ $label }}</option>@endforeach</select></div>
        <div class="col-md-3"><label for="status" class="form-label">Account status</label><select id="status" name="status" class="form-select"><option value="">All accounts</option><option value="active" @selected(($filters['status'] ?? '') === 'active')>Active</option><option value="suspended" @selected(($filters['status'] ?? '') === 'suspended')>Suspended</option></select></div>
        <div class="col-md-2"><button class="btn btn-lp" type="submit">Search</button> <a href="{{ route('admin.users.index') }}">Clear</a></div>
    </div>
</form>
<section class="card"><div class="card-header">{{ $users->total() }} accounts</div><div class="table-responsive"><table class="table mb-0">
<thead><tr><th>Name</th><th>Email</th><th>Roles</th><th>Status</th><th>Action</th></tr></thead><tbody>
@forelse($users as $account)
<tr><td>{{ $account->name }}</td><td>{{ $account->email }}</td><td>{{ $account->roles->map(fn ($r)=>\App\Services\DashboardAccess::ROLES[$r->name] ?? $r->name)->join(', ') ?: 'No role assigned' }}
@if($account->has_pending_agent_application)
<div class="mt-1"><span class="badge text-wrap" style="background:#fff3cd;color:#664d03">Agent approval pending</span></div>
@endif
</td><td>{{ $account->is_active ? 'Active' : 'Suspended' }}</td><td><a href="{{ route('admin.users.edit',$account) }}">Manage access</a></td></tr>
@empty <tr><td colspan="5">No matching accounts.</td></tr> @endforelse
</tbody></table></div><div class="card-body">{{ $users->links('pagination::bootstrap-5') }}</div></section>
@endsection
