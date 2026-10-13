@unless($hidePhone ?? false)
<div class="mb-3"><label class="form-label" for="{{ $fieldPrefix }}-phone">Phone number</label><input class="form-control" id="{{ $fieldPrefix }}-phone" name="phone" type="tel" autocomplete="tel" maxlength="30" value="{{ old('phone',$profileDefaults->phone ?? '') }}"></div>
@endunless
<div class="mb-3"><label class="form-label" for="{{ $fieldPrefix }}-agency">Agency name (optional)</label><input class="form-control" id="{{ $fieldPrefix }}-agency" name="agency_name" maxlength="150" value="{{ old('agency_name',$profileDefaults->agency_name ?? '') }}"></div>
<div class="mb-3"><label class="form-label" for="{{ $fieldPrefix }}-areas">Service areas</label><input class="form-control" id="{{ $fieldPrefix }}-areas" name="service_areas" maxlength="500" value="{{ old('service_areas',$profileDefaults->service_areas ?? '') }}"></div>
<div class="mb-3"><label class="form-label" for="{{ $fieldPrefix }}-bio">Professional introduction</label><textarea class="form-control" id="{{ $fieldPrefix }}-bio" name="bio" maxlength="2000" rows="3">{{ old('bio',$profileDefaults->bio ?? '') }}</textarea></div>
