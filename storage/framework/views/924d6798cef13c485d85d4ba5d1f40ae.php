<?php $__env->startSection('title', __('Property services').' | Lassana Property'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.partials.header.real-estate-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="container py-4 py-lg-5">
    <h1><?php echo e(__('Property services')); ?></h1><p class="text-body-secondary mb-4"><?php echo e(__('Find the right next step for your property plans.')); ?></p>
    <div class="row g-4"><?php $__currentLoopData = config('public_pages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug=>$page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-xl-4"><article class="card h-100 p-4"><h2 class="h4"><?php echo e(__($page['title'])); ?></h2><p><?php echo e(__($page['intro'])); ?></p><a class="mt-auto" href="<?php echo e(route('services.show',['page'=>$slug])); ?>"><?php echo e(__('Learn more')); ?></a></article></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
</main>
<?php echo $__env->make('layouts.partials.footer.real-estate-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?> <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?> <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/pages/services.blade.php ENDPATH**/ ?>