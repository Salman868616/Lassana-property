<?php $__env->startSection('title', __('Frequently asked questions').' | Lassana Property'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.partials.header.real-estate-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="container py-4 py-lg-5" style="max-width:960px">
    <h1><?php echo e(__('Frequently asked questions')); ?></h1><p class="text-body-secondary mb-4"><?php echo e(__('Help with property searches, accounts and service requests.')); ?></p>
    <?php $__currentLoopData = config('public_faqs'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$question,$answer]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <details class="border rounded-3 p-3 p-md-4 mb-3"><summary class="fw-semibold"><?php echo e(__($question)); ?></summary><p class="mt-3 mb-0"><?php echo e(__($answer)); ?></p></details>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <p class="mt-4"><a href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Contact our team')); ?></a></p>
</main>
<?php echo $__env->make('layouts.partials.footer.real-estate-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?> <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?> <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/pages/faqs.blade.php ENDPATH**/ ?>