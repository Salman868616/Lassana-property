@extends('layouts.dashboard')
@section('content')
<a class="d-inline-block mb-3" href="{{ route('admin.users.index') }}">Back to users</a>
<div class="row g-4"><div class="col-lg-6"><form class="card p-4" method="POST" action="{{ route('admin.users.update',$account) }}">
@csrf @method('PUT')
<h2 class="h5">{{ $account->name }}</h2><p>{{ $account->email }}</p>
<fieldset class="mb-3"><legend class="h6">Account roles</legend><p class="small text-secondary">Select the dashboards this person can access.</p>
@foreach(\App\Services\DashboardAccess::ROLES as $key=>$label)
<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="roles[]" id="role-{{ $key }}" value="{{ $key }}" @checked(in_array($key,old('roles',$account->roles->pluck('name')->all()),true))><label class="form-check-label" for="role-{{ $key }}">{{ $label }}</label></div>
@endforeach
</fieldset>
<label class="form-label" for="is-active">Account status</label><select class="form-select mb-3" name="is_active" id="is-active"><option value="1" @selected((int)old('is_active',$account->is_active) === 1)>Active</option><option value="0" @selected((int)old('is_active',$account->is_active) === 0)>Suspended</option></select>
<p class="small text-secondary">Suspension blocks account access. Existing records are retained.</p>
@if($account->id === auth()->id())<p>You must keep your own account active with the Admin role.</p>@endif
<label class="form-label" for="reason">Reason for change</label><textarea class="form-control mb-3" id="reason" name="reason" maxlength="2000" required>{{ old('reason') }}</textarea>
<button class="btn btn-lp" type="submit">Save account access</button>
</form></div><div class="col-lg-6"><section class="card p-4"><h2 class="h5">Access change history</h2>
@forelse($history as $change)
@php($previous = json_decode($change->before,true))
@php($updated = json_decode($change->after,true))
<div class="border-bottom py-3"><strong>{{ $change->actor_name }}</strong><small class="d-block text-secondary">{{ \Carbon\Carbon::parse($change->created_at,'UTC')->timezone('Asia/Colombo')->format('d M Y h:i A') }}</small>
<p class="my-2">{{ implode(', ',$previous['roles']) }} ({{ $previous['active'] ? 'Active' : 'Suspended' }}) → {{ implode(', ',$updated['roles']) }} ({{ $updated['active'] ? 'Active' : 'Suspended' }})</p><p class="mb-0" style="white-space:pre-line">{{ $change->reason }}</p></div>
@empty <p>No access changes recorded.</p> @endforelse
{{ $history->links('pagination::bootstrap-5') }}
</section></div></div>
@endsection
