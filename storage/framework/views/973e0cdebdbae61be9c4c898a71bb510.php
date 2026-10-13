<?php if(filled($property->site_concerns)): ?>
    <section class="mb-5" aria-labelledby="site-concerns-heading">
        <h2 id="site-concerns-heading" class="h4 mb-3"><?php echo e(__('Restrictions / site concerns')); ?></h2>
        <p class="mb-0" style="white-space:pre-line;overflow-wrap:anywhere"><?php echo e($property->site_concerns); ?></p>
    </section>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/site-concerns.blade.php ENDPATH**/ ?>