<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['district' => '', 'city' => '', 'required' => false, 'legacy' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['district' => '', 'city' => '', 'required' => false, 'legacy' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php
    $locations = \App\Services\LocationCatalog::options();
    $selectedDistrict = old('district', $district);
    $selectedCity = old('city', $city);
    if ($legacy && $district) {
        $locations[$district] ??= [];
        if ($city && !in_array($city, $locations[$district], true)) $locations[$district][] = $city;
    }
?>
<div class="row g-3 mb-3" data-location-fields data-city-placeholder="<?php echo e(__('Select city (optional)')); ?>" data-city-empty-placeholder="<?php echo e(__('Select city (optional)')); ?>">
    <div class="col-md-6">
        <label class="form-label" for="district"><?php echo e(__('District')); ?></label>
        <select id="district" name="district" class="form-select" <?php if($required): echo 'required'; endif; ?>>
            <option value=""><?php echo e(__('Select district')); ?></option>
            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($name); ?>" <?php if($name === $selectedDistrict): echo 'selected'; endif; ?>><?php echo e($name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="city"><?php echo e(__('City / locality')); ?></label>
        <select id="city" name="city" class="form-select">
            <option value=""><?php echo e(__('Select city (optional)')); ?></option>
            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nameOfCity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option data-district="<?php echo e($name); ?>" value="<?php echo e($nameOfCity); ?>" <?php if($name === $selectedDistrict && $nameOfCity === $selectedCity): echo 'selected'; endif; ?>><?php echo e($nameOfCity); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>
<?php if (! $__env->hasRenderedOnce('da0aa850-3bbe-41af-8fde-bedf7529ac30')): $__env->markAsRenderedOnce('da0aa850-3bbe-41af-8fde-bedf7529ac30'); ?>
<script src="<?php echo e(asset('assets/js/location-fields.js')); ?>" defer></script>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/components/location-fields.blade.php ENDPATH**/ ?>