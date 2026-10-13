<?php
    $highlights = [];
    $details = $property->details;
    $shortNumber = fn($value) => rtrim(rtrim(number_format((float) $value, 2), '0'), '.');
    if (in_array($property->category, ['house', 'apartment', 'villa'])) {
        if ($details?->bedrooms !== null) $highlights[] = ['bed', $details->bedrooms.' '.__('bedrooms')];
        if ($details?->bathrooms !== null) $highlights[] = ['shower', $details->bathrooms.' '.__('bathrooms')];
        if ($details?->floor_area !== null) $highlights[] = ['ruler', $shortNumber($details->floor_area).' '.__('sq ft')];
        if (in_array($property->category, ['house', 'villa'], true) && $property->land_size_perches !== null) $highlights[] = ['ruler', $shortNumber($property->land_size_perches).' '.__('perches')];
        if (in_array($property->category,['apartment','villa']) && $details?->amenities) $highlights[] = ['check', \Illuminate\Support\Str::limit(implode(', ', $details->amenities),100)];
    } elseif ($property->category === 'land') {
        if ($property->land_size_perches !== null) $highlights[] = ['ruler', $shortNumber($property->land_size_perches).' '.__('perches')];
        if ($property->road_access) $highlights[] = ['map-pin', __('Access:').' '.$property->road_access];
        if ($property->electricity_available) $highlights[] = ['check', __('Electricity')];
        if ($property->water_available) $highlights[] = ['check', __('Water')];
    } elseif ($property->category === 'commercial') {
        if ($details?->unit_type) $highlights[] = ['home', ucfirst($details->unit_type)];
        if ($details?->floor_area !== null) $highlights[] = ['ruler', $shortNumber($details->floor_area).' '.__('sq ft')];
        if ($details?->parking_spaces !== null) $highlights[] = ['car', $details->parking_spaces.' '.__('parking')];
    }
?>
<?php if($highlights): ?>
    <div class="d-flex flex-row flex-wrap align-items-center gap-3 border-top pt-3 mt-3 small text-body-secondary" role="list" aria-label="<?php echo e(__('Property highlights')); ?>">
        <?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$icon, $label]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="d-inline-flex align-items-center gap-2" role="listitem">
                <i class="fi-<?php echo e($icon); ?>" style="font-size:1rem" aria-hidden="true"></i>
                <span><?php echo e($label); ?></span>
            </span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/card-highlights.blade.php ENDPATH**/ ?>