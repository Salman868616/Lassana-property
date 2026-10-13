@extends('layouts.dashboard')
@section('content')
<section class="card p-4 mb-4">@include('dashboard.marketing.metrics')</section>
<form method="POST" action="{{ route('admin.marketing.store') }}" class="card p-4 mb-4">@csrf
<h2 class="h5">Create campaign</h2><div class="d-flex flex-wrap gap-3 align-items-end"><div class="flex-grow-1"><label for="campaign-name" class="form-label">Campaign name</label><input id="campaign-name" name="name" value="{{ old('name') }}" maxlength="150" required class="form-control"></div><button class="btn btn-lp">Create campaign</button></div></form>
<div class="card table-responsive"><table class="table mb-0"><thead><tr><th>Campaign</th><th>Status</th><th>Spending (LKR)</th><th>Attributed leads</th><th>Cost per lead (LKR)</th></tr></thead><tbody>
@forelse($campaigns as $c)<tr><td><a href="{{ route('admin.marketing.show',$c) }}">{{ $c->name }}</a></td><td>{{ $c->is_active ? 'Active' : 'Paused' }}</td><td>{{ $c->spend_entries ? number_format($c->total_spend,2) : 'Not recorded' }}</td><td>{{ $c->leads_count }}</td><td>{{ $c->spend_entries && $c->leads_count ? number_format($c->total_spend/$c->leads_count,2) : '—' }}</td></tr>
@empty<tr><td colspan="5">No campaigns recorded.</td></tr>@endforelse
</tbody></table></div>{{ $campaigns->links('pagination::bootstrap-5') }}
<p class="small text-secondary mt-3">All-time spending and leads per campaign. Voided spending is excluded. Leads without campaign spending are excluded from the combined cost per lead.</p>
@endsection
