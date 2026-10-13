@if(in_array($property->id, $savedPropertyIds ?? []))
    <span class="position-absolute {{ $property->is_price_negotiable && $property->total_price !== null ? 'bottom-0' : 'top-0' }} end-0 m-3 badge rounded-pill d-inline-flex align-items-center gap-2 shadow-sm" style="z-index: 3; background-color: #8B1E24; color: #fff; pointer-events: none;" data-saved-property="{{ $property->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6 3a1 1 0 0 0-1 1v17l7-4 7 4V4a1 1 0 0 0-1-1H6Z" /></svg>
        Saved
    </span>
@endif
