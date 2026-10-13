<div class="form-check mt-2">
    <input type="hidden" name="is_price_negotiable" value="0">
    <input type="checkbox" class="form-check-input" id="is_price_negotiable"
           name="is_price_negotiable" value="1"
           @checked(old('is_price_negotiable', $property->is_price_negotiable ?? false))>
    <label class="form-check-label" for="is_price_negotiable">{{ __('Price negotiable') }}</label>
</div>
@error('is_price_negotiable')
    <div class="text-danger small mt-1">{{ $message }}</div>
@enderror
