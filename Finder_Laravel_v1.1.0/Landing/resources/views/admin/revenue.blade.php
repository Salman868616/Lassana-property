@extends('layouts.admin')
@section('title', 'Revenue | Lassana Property')
@section('heading', 'Revenue')
@section('content')
@if(session('success'))<div class="alert alert-success" role="status">{{ session('success') }}</div>@endif
@if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<div class="row g-3 mb-4">
@foreach(['listing'=>'Listing fees','verification'=>'Verification fees','total'=>'Total revenue'] as $key=>$label)
<div class="col-md-4"><section class="card p-4"><h2 class="h6">{{ $label }}</h2><strong class="fs-3">LKR {{ number_format($totals[$key],2) }}</strong></section></div>
@endforeach
</div>
<section class="card p-4 mb-4">
<form method="GET" action="{{ route('admin.revenue.index') }}" class="row g-3 align-items-end">
<div class="col-md"><label for="from" class="form-label">From payment date</label><input id="from" name="from" type="date" class="form-control" value="{{ $filters['from'] ?? '' }}"></div>
<div class="col-md"><label for="to" class="form-label">To payment date</label><input id="to" name="to" type="date" class="form-control" value="{{ $filters['to'] ?? '' }}"></div>
<div class="col-md"><label for="filter-type" class="form-label">Payment type</label><select id="filter-type" name="type" class="form-select"><option value="">All types</option>@foreach(\App\Models\RevenuePayment::TYPES as $value=>$label)<option value="{{ $value }}" @selected(($filters['type'] ?? '') === $value)>{{ $label }}</option>@endforeach</select></div>
<div class="col-md-auto d-flex gap-2"><button class="btn btn-lp">Apply filters</button><a class="btn btn-outline-secondary" href="{{ route('admin.revenue.index') }}">Clear</a></div>
</form>

</section>
<details class="card p-4 mb-4" @if($errors->any()) open @endif>
<summary class="h5 mb-0" style="cursor:pointer">Record payment</summary>
<form method="POST" action="{{ route('admin.revenue.store') }}" class="row g-3 mt-2">
@csrf
<div class="col-md-6"><label for="property-code" class="form-label">Property reference</label><input id="property-code" name="property_code" class="form-control" maxlength="100" placeholder="LP-COL-00010" value="{{ old('property_code') }}" required></div>
<div class="col-md-6"><label for="payment-type" class="form-label">Payment type</label><select id="payment-type" name="type" class="form-select" required>@foreach(\App\Models\RevenuePayment::TYPES as $value=>$label)<option value="{{ $value }}" @selected(old('type') === $value)>{{ $label }}</option>@endforeach</select></div>
<div class="col-md-6"><label for="amount" class="form-label">Amount received (LKR)</label><input id="amount" name="amount" type="number" step="0.01" min="0.01" max="999999999999.99" value="{{ old('amount') }}" class="form-control" required></div>
<div class="col-md-6"><label for="paid-on" class="form-label">Payment date (Sri Lanka)</label><input id="paid-on" name="paid_on" type="date" max="{{ now('Asia/Colombo')->toDateString() }}" value="{{ old('paid_on',now('Asia/Colombo')->toDateString()) }}" class="form-control" required></div>
<div class="col-md-6"><label for="reference" class="form-label">Receipt / transaction reference</label><input id="reference" name="reference" maxlength="100" value="{{ old('reference') }}" class="form-control" required><div class="form-text">Use a unique reference for each payment.</div></div>
<div class="col-md-6"><label for="method" class="form-label">Payment method</label><select id="method" name="method" class="form-select" required>@foreach(\App\Models\RevenuePayment::METHODS as $value=>$label)<option value="{{ $value }}" @selected(old('method') === $value)>{{ $label }}</option>@endforeach</select></div>
<div class="col-12"><label for="notes" class="form-label">Notes (optional)</label><textarea id="notes" name="notes" maxlength="2000" class="form-control" rows="2">{{ old('notes') }}</textarea></div>
<div class="col-12"><button class="btn btn-lp">Save payment</button></div>
</form>
</details>
<section class="card">
<div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-3"><h2 class="h5 mb-0">Payments ({{ $payments->total() }})</h2><a class="btn btn-lp" href="{{ route('admin.revenue.download',$filters) }}">Download report</a></div>
<div class="table-responsive"><table class="table mb-0"><thead><tr><th>Payment date</th><th>Reference / Property</th><th>Type / Method</th><th>Amount (LKR)</th><th>Recorded by</th><th>Status / Action</th></tr></thead><tbody>
@forelse($payments as $payment)
<tr><td class="text-nowrap">{{ $payment->paid_on->format('d M Y') }}</td><td>{{ $payment->reference }}<small class="d-block">{{ $payment->property_reference }}</small>@if($payment->notes)<details><summary class="small">Notes</summary><p class="small text-break">{{ $payment->notes }}</p></details>@endif</td><td>{{ \App\Models\RevenuePayment::TYPES[$payment->type] }}<small class="d-block">{{ \App\Models\RevenuePayment::METHODS[$payment->method] }}</small></td><td class="text-nowrap">{{ number_format($payment->amount,2) }}</td><td>{{ $payment->recorder?->name ?? 'Unavailable' }}<small class="d-block">{{ $payment->created_at->timezone('Asia/Colombo')->format('d M Y h:i A') }}</small></td>
<td>@if($payment->voided_at)<strong>Voided</strong><p class="small mb-1 text-break">{{ $payment->void_reason }}</p><small>{{ $payment->voider?->name ?? 'Unavailable' }} · {{ $payment->voided_at->timezone('Asia/Colombo')->format('d M Y h:i A') }}</small>@else<span>Recorded</span><details class="mt-2"><summary class="small" style="cursor:pointer">Void payment</summary><form method="POST" action="{{ route('admin.revenue.void',$payment) }}" class="mt-2">@csrf<label for="void-{{ $payment->id }}" class="small">Reason for correction</label><textarea class="form-control mb-2" id="void-{{ $payment->id }}" name="void_reason" minlength="5" maxlength="2000" required></textarea><button class="btn btn-outline-danger btn-sm">Confirm void</button></form></details>@endif</td></tr>
@empty<tr><td colspan="6">No payments match these filters.</td></tr>@endforelse
</tbody></table></div>
<div class="card-body">{{ $payments->links('pagination::bootstrap-5') }}</div>
</section>

@endsection
