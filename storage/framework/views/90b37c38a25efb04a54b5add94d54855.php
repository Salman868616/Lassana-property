<article class="card h-100 overflow-hidden" <?php if($featured ?? false): ?> data-featured-property="<?php echo e($property->id); ?>" <?php elseif(($cardContext ?? 'latest') === 'latest'): ?> data-latest-property="<?php echo e($property->id); ?>" <?php endif; ?>>
    <div class="position-relative">
        <a href="<?php echo e(route('properties.show', $property->property_code)); ?>" class="ratio ratio-4x3 bg-body-tertiary" aria-label="View <?php echo e($property->title); ?>">
            <?php if($property->images->isNotEmpty()): ?>
                <img src="<?php echo e(asset('storage/'.$property->images->first()->path)); ?>" alt="<?php echo e($property->title); ?>" class="object-fit-cover" loading="lazy">
            <?php else: ?>
                <span class="d-flex align-items-center justify-content-center text-body-secondary"><?php echo e(__('Photo coming soon')); ?></span>
            <?php endif; ?>
        </a>
        <?php echo $__env->make('properties.category-badge', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('properties.saved-badge', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('properties.negotiable-label', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <div class="card-body">
        <?php if($featured ?? false): ?>
            <span class="badge rounded-pill mb-2" style="background:#F7EACB;color:#5A1015;border:1px solid #C89B3C"><?php echo e(__('Featured')); ?></span>
        <?php endif; ?>
        <div class="h5"><?php echo e($property->priceLabel()); ?></div>
        <h3 class="h6"><a href="<?php echo e(route('properties.show', $property->property_code)); ?>" class="text-body"><?php echo e($property->title); ?></a></h3>
        <p class="small text-body-secondary mb-2"><?php echo e($property->property_code); ?></p>
        <p class="small mb-2"><?php echo e(collect([$property->city, $property->district])->filter()->implode(', ')); ?></p>
        <?php echo $__env->make('properties.card-highlights', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <div class="card-footer bg-transparent border-0 pt-0">
        <a href="<?php echo e(route('properties.show', $property->property_code)); ?>" class="btn btn-outline-primary btn-sm"><?php echo e(__('View property')); ?></a>
    </div>
</article>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/home/property-card.blade.php ENDPATH**/ ?>