<?php if($paginator->hasPages()): ?>
<nav class="d-flex flex-wrap justify-content-center align-items-center gap-1" aria-label="Property pages">
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <span class="px-2 text-secondary" aria-hidden="true"><?php echo e($element); ?></span>
        <?php else: ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="lp-page-dot" href="<?php echo e($url); ?>#property-results" aria-label="Property page <?php echo e($page); ?>" title="Page <?php echo e($page); ?>" <?php if($page === $paginator->currentPage()): ?> aria-current="page" <?php endif; ?>><span class="visually-hidden"><?php echo e($page); ?></span></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</nav>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/pagination-dots.blade.php ENDPATH**/ ?>