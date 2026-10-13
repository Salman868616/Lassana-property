<?php if($testimonials->isNotEmpty()): ?>
<section class="container" aria-labelledby="home-testimonials-title"><h2 class="h1 mb-4" id="home-testimonials-title"><?php echo e(__('What our customers say')); ?></h2><div class="lp-conversion-grid">
<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><figure class="lp-conversion-card mb-0"><blockquote class="lp-conversion-quote"><p><?php echo e($testimonial->quote); ?></p><footer><strong><?php echo e($testimonial->customer_name); ?></strong><?php if($testimonial->context): ?><br><?php echo e($testimonial->context); ?><?php endif; ?></footer></blockquote></figure><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div></section>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/home/testimonials.blade.php ENDPATH**/ ?>