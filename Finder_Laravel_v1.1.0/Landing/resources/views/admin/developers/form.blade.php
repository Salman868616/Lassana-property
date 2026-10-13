@extends('layouts.dashboard')
@section('content')
<a href="{{ route('admin.developers.index') }}" class="d-inline-block mb-3">Back to developer companies</a>
<form method="POST" action="{{ $developer->exists ? route('admin.developers.update',$developer) : route('admin.developers.store') }}" class="card p-4">
@csrf @if($developer->exists) @method('PUT') @endif
<h2 class="h4">{{ $developer->exists ? 'Edit developer company' : 'Add developer company' }}</h2>
<div class="row g-3">@foreach(['name'=>['Company name','text',150], 'city'=>['City','text',100], 'email'=>['Public email','email',255], 'phone'=>['Public phone','tel',30], 'website'=>['Company website','url',500]] as $field=>[$label,$type,$max])
<div class="col-md-6"><label class="form-label" for="developer-{{ $field }}">{{ $label }}</label><input class="form-control" id="developer-{{ $field }}" name="{{ $field }}" type="{{ $type }}" value="{{ old($field,$developer->{$field}) }}" maxlength="{{ $max }}" @required($field==='name')></div>
@endforeach
<div class="col-12"><label class="form-label" for="developer-description">Company description</label><textarea class="form-control" id="developer-description" name="description" rows="4" maxlength="5000">{{ old('description',$developer->description) }}</textarea></div>
<div class="col-12"><label class="form-label" for="developer-visibility">Directory visibility</label><select class="form-select" name="is_published" id="developer-visibility"><option value="0" @selected(!old('is_published',$developer->is_published))>Draft</option><option value="1" @selected(old('is_published',$developer->is_published))>Published</option></select><p class="form-text">Publish only company details approved for public display. Unpublishing hides the company profile; its properties keep their own publication status.</p></div>
<div class="col-12"><fieldset><legend class="h5">Linked properties</legend><p class="form-text">Only published properties appear on the public company profile. Properties assigned to another developer are not available here.</p>
<div class="border rounded p-3" style="max-height:320px;overflow:auto">
@forelse($properties as $property)<label class="d-flex gap-2 mb-2"><input type="checkbox" class="form-check-input flex-shrink-0" name="property_ids[]" value="{{ $property->id }}" @checked(in_array($property->id, (session()->hasOldInput() ? old('property_ids', []) : ($developer->exists ? $properties->where('developer_id',$developer->id)->modelKeys() : []))))><span class="text-break">{{ $property->property_code }} · {{ $property->title }} ({{ $property->status }})</span></label>@empty<p class="mb-0">No properties available to link.</p>@endforelse
</div></fieldset></div></div>
<div class="mt-4"><button class="btn btn-lp" type="submit">Save developer company</button></div>
</form>
@endsection
