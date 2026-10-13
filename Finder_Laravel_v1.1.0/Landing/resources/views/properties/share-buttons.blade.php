<div class="mt-3" data-property-share data-url="{{ $share['url'] }}" data-title="{{ $share['title'] }}" data-text="{{ $share['text'] }}"
     data-copied-message="{{ __('Property link copied.') }}" data-copy-message="{{ __('Copy the selected link to share this property.') }}">
    <div class="lp-share-actions" role="group" aria-label="{{ __('Share this property') }}">
        <span class="lp-share-label">{{ __('Share this property') }}</span>
        <a class="lp-share-icon lp-share-whatsapp" title="{{ __('Share on WhatsApp') }}" href="{{ $share['whatsapp'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ __('Share this property on WhatsApp (opens a new tab)') }}"><i class="fi-whatsapp" aria-hidden="true"></i></a>
        <button type="button" class="lp-share-icon" data-share-copy title="{{ __('Copy link') }}" aria-label="{{ __('Copy link') }}" hidden><i class="fi-copy" aria-hidden="true"></i></button>
        <button type="button" class="lp-share-icon" data-share-native title="{{ __('Share property') }}" aria-label="{{ __('Share property') }}" hidden><i class="fi-share-2" aria-hidden="true"></i></button>
    </div>
    <p class="small mt-2 mb-0 lp-share-status" role="status" aria-live="polite" data-share-status></p>
    <div class="mt-2" data-share-fallback hidden>
        <label for="property-share-url" class="form-label">{{ __('Property link — select and copy') }}</label>
        <input id="property-share-url" class="form-control" type="url" value="{{ $share['url'] }}" readonly>
    </div>
</div>
