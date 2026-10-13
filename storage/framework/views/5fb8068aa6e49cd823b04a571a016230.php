<?php if($featuredProperties->isNotEmpty()): ?>
<section class="container py-5" aria-labelledby="featured-properties-title">
    <div class="mb-4">
        <h2 id="featured-properties-title" class="h1 mb-2"><?php echo e(__('Featured properties')); ?></h2>
        <p class="text-body-secondary mb-0"><?php echo e(__('Explore properties selected by our team.')); ?></p>
    </div>
    <div class="row g-4">
        <?php $__currentLoopData = $featuredProperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-xl-4">
                <?php echo $__env->make('home.property-card', ['featured' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/home/featured-properties.blade.php ENDPATH**/ ?>