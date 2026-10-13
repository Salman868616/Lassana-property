<dl class="row mb-0">
    <dt class="col-sm-4">Property type</dt><dd class="col-sm-8">{{ ucfirst($item->category) }}</dd>
    <dt class="col-sm-4">Preferred location</dt><dd class="col-sm-8">{{ $item->city ? $item->city.', ' : '' }}{{ $item->district }}</dd>
    <dt class="col-sm-4">Budget (LKR)</dt><dd class="col-sm-8">{{ $item->budget_min !== null ? number_format($item->budget_min,2).' – ' : 'Up to ' }}{{ number_format($item->budget_max,2) }}</dd>
    @if($item->bedrooms !== null)<dt class="col-sm-4">Minimum bedrooms</dt><dd class="col-sm-8">{{ $item->bedrooms }}</dd>@endif
</dl>
<p class="mt-3 mb-0" style="white-space:pre-line">{{ $item->requirements }}</p>
