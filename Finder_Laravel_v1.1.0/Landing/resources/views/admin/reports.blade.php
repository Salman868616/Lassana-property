@extends('layouts.admin')
@section('title', 'Reports | Lassana Property')
@section('heading', 'Reports')
@section('content')
<p class="text-secondary">Generate reports from current property, user and lead records. Date filters use the record's creation date in Sri Lanka time. These are current records, not historical snapshots.</p>
<div class="d-flex flex-wrap gap-2 mb-4" aria-label="Report type">
    @foreach(['properties'=>'Properties','users'=>'Users','leads'=>'Leads'] as $key=>$label)
        <a class="btn {{ $type === $key ? 'btn-lp' : 'btn-outline-secondary' }}" href="{{ route('admin.reports.index',['type'=>$key]) }}" @if($type === $key) aria-current="page" @endif>{{ $label }}</a>
    @endforeach
</div>
@if($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
<section class="card mb-4"><div class="card-body">
<form method="GET" action="{{ route('admin.reports.index') }}">
    <input type="hidden" name="type" value="{{ $type }}">
    <div class="row g-3 align-items-end">
        <div class="col-12 col-sm-6 col-xl"><label for="report-from" class="form-label">From date</label><input class="form-control" id="report-from" type="date" name="from" value="{{ $filters['from'] ?? '' }}"></div>
        <div class="col-12 col-sm-6 col-xl"><label for="report-to" class="form-label">To date</label><input class="form-control" id="report-to" type="date" name="to" value="{{ $filters['to'] ?? '' }}"></div>
        @php
            $selects = match($type) {
                'users'=>['role'=>['Role',\App\Services\DashboardAccess::ROLES],'account_status'=>['Account status',['active'=>'Active','suspended'=>'Suspended']]],
                'leads'=>['stage'=>['Lead stage',\App\Services\LeadStages::LABELS],'assignee'=>['Assigned agent / sales staff',['unassigned'=>'Unassigned'] + $assignees->pluck('name','id')->all()]],
                default=>['category'=>['Category',['land'=>'Land','house'=>'House','apartment'=>'Apartment','villa'=>'Villa','commercial'=>'Commercial']], 'district'=>['District',array_combine($districts,$districts)], 'property_status'=>['Status',['draft'=>'Draft','submitted'=>'Submitted','under_review'=>'Under review','approved'=>'Approved','published'=>'Published','sold'=>'Sold','archived'=>'Archived']]],
            };
        @endphp
        @foreach($selects as $name=>[$label,$options])
            <div class="col-12 col-sm-6 col-xl"><label class="form-label" for="report-{{ $name }}">{{ $label }}</label><select class="form-select" id="report-{{ $name }}" name="{{ $name }}"><option value="">All</option>@foreach($options as $value=>$text)<option value="{{ $value }}" @selected((string)($filters[$name] ?? '') === (string)$value)>{{ $text }}</option>@endforeach</select></div>
        @endforeach
        <div class="col-12 col-xl-auto"><div class="d-flex gap-2"><button class="btn btn-lp text-nowrap" type="submit">Apply filters</button><a class="btn btn-outline-secondary" href="{{ route('admin.reports.index',['type'=>$type]) }}">Clear</a></div></div>
    </div>
</form>
</div></section>
<section class="card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2"><h2 class="h5 mb-0">{{ ucfirst($type) }} report <span class="text-secondary">({{ number_format($records->total()) }} records)</span></h2><a class="btn btn-lp" href="{{ route('admin.reports.download',array_merge($filters,['type'=>$type])) }}">Download report</a></div>
    <div class="card-body"><p class="small text-secondary mb-0">The download includes all matching records across every page. Deleted properties are excluded.</p></div>
    <div class="table-responsive"><table class="table mb-0"><thead><tr>@foreach($headers as $header)<th scope="col">{{ $header }}</th>@endforeach</tr></thead><tbody>
        @forelse($rows as $row)<tr>@foreach($row as $value)<td>{{ $value ?? '—' }}</td>@endforeach</tr>
        @empty<tr><td colspan="{{ count($headers) }}" class="text-center py-4">No records match these filters.</td></tr>@endforelse
    </tbody></table></div>
    <div class="card-body">{{ $records->links('pagination::bootstrap-5') }}</div>
</section>
@endsection
