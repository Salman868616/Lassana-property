@extends('layouts.dashboard')
@section('content')
<a href="{{ route('admin.testimonials.index') }}">Back to testimonials</a>
<form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update',$testimonial) : route('admin.testimonials.store') }}" class="card p-4 mt-4">
@csrf @if($testimonial->exists) @method('PUT') @endif
<h2 class="h4">{{ $testimonial->exists ? 'Edit testimonial' : 'Add testimonial' }}</h2>
<div class="row g-3">
@foreach(['customer_name'=>['Customer display name',150],'context'=>['Context (optional, for example: Home buyer)',150]] as $field=>[$label,$max])
<div class="col-md-6"><label class="form-label" for="testimonial-{{ $field }}">{{ $label }}</label><input id="testimonial-{{ $field }}" class="form-control" name="{{ $field }}" maxlength="{{ $max }}" value="{{ old($field,$testimonial->{$field}) }}" @required($field==='customer_name')>@error($field)<p class="text-danger">{{ $message }}</p>@enderror</div>
@endforeach
<div class="col-12"><label class="form-label" for="testimonial-quote">Customer quote</label><textarea id="testimonial-quote" class="form-control" name="quote" rows="4" maxlength="1500" required>{{ old('quote',$testimonial->quote) }}</textarea>@error('quote')<p class="text-danger">{{ $message }}</p>@enderror</div>
<div class="col-12"><input type="hidden" name="consent_confirmed" value="0"><label class="d-flex gap-2"><input class="form-check-input flex-shrink-0" type="checkbox" name="consent_confirmed" value="1" @checked(old('consent_confirmed',$testimonial->consent_confirmed))>I have confirmed permission to publish this customer's name and quote.</label>@error('consent_confirmed')<p class="text-danger">{{ $message }}</p>@enderror</div>
<div class="col-12"><label class="form-label" for="testimonial-consent">Permission record (internal only)</label><textarea id="testimonial-consent" class="form-control" name="consent_notes" rows="2" maxlength="2000" aria-describedby="consent-help">{{ old('consent_notes',$testimonial->consent_notes) }}</textarea><p class="form-text" id="consent-help">Required to publish. Note when and how permission was confirmed. This record is never displayed publicly.</p>@error('consent_notes')<p class="text-danger">{{ $message }}</p>@enderror</div>
<div class="col-md-6"><label class="form-label" for="testimonial-visibility">Visibility</label><select id="testimonial-visibility" class="form-select" name="is_published"><option value="0" @selected(!old('is_published',$testimonial->is_published))>Draft</option><option value="1" @selected(old('is_published',$testimonial->is_published))>Published</option></select></div>
<div class="col-md-6"><label class="form-label" for="testimonial-order">Display order</label><input id="testimonial-order" class="form-control" type="number" name="display_order" min="0" max="9999" value="{{ old('display_order',$testimonial->display_order ?? 0) }}" required><p class="form-text">Lower numbers appear first. Up to six published testimonials appear on the homepage.</p></div>
</div><button class="btn btn-lp mt-4 align-self-start" type="submit">Save testimonial</button>
</form>
@endsection
