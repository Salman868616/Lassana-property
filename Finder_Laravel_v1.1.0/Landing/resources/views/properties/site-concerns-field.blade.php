<div class="mb-3">
    <label for="site_concerns" class="form-label">{{ __('Restrictions / site concerns') }} <span class="text-body-secondary">({{ __('Optional') }})</span></label>
    <textarea id="site_concerns" name="site_concerns" rows="4" maxlength="3000"
              class="form-control @error('site_concerns') is-invalid @enderror"
              aria-describedby="site-concerns-help @error('site_concerns') site-concerns-error @enderror"
              @error('site_concerns') aria-invalid="true" @enderror>{{ old('site_concerns', $property->site_concerns ?? '') }}</textarea>
    <div id="site-concerns-help" class="form-text">{{ __('Mention any known access limits, flooding, building restrictions or other site concerns. These notes will be visible to buyers. Maximum 3,000 characters.') }}</div>
    @error('site_concerns')<div id="site-concerns-error" class="invalid-feedback">{{ $message }}</div>@enderror
</div>
