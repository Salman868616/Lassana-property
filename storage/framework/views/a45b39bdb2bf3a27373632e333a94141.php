
<?php $__env->startSection('title', __($page['title']).' | Lassana Property'); ?>
<?php $__env->startSection('meta-description', __($page['intro'])); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.partials.header.real-estate-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="container py-4 py-lg-5">
    <nav aria-label="<?php echo e(__('Breadcrumb')); ?>"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a></li><li class="breadcrumb-item"><a href="<?php echo e(route('services.index')); ?>"><?php echo e(__('Services')); ?></a></li><li class="breadcrumb-item active" aria-current="page"><?php echo e(__($page['title'])); ?></li></ol></nav>
    <div class="mb-5" style="max-width:780px"><h1><?php echo e(__($page['title'])); ?></h1><p class="fs-lg text-body-secondary"><?php echo e(__($page['intro'])); ?></p></div>
    <div class="row g-4 mb-5"><?php $__currentLoopData = $page['steps']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$heading,$body]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4"><section class="card h-100 p-4"><h2 class="h4"><?php echo e(__($heading)); ?></h2><p class="mb-0"><?php echo e(__($body)); ?></p></section></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
    <?php if(($page['action'] ?? '') === 'lgc' && !isset($page['service'])): ?>
    <nav class="d-flex flex-wrap gap-3 mb-4" aria-label="<?php echo e(__('Professional services')); ?>"><?php $__currentLoopData = ['house-plans'=>'House plans','architectural-design'=>'Architectural design','boq'=>'BOQ services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a href="<?php echo e(route('services.show',['page'=>$slug])); ?>"><?php echo e(__($label)); ?></a><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></nav>
    <?php endif; ?>
    <div class="border rounded-3 p-4 d-flex flex-wrap align-items-center gap-3">
        <?php if(in_array($page['action'], ['inspection','lgc'])): ?>
            <?php if(!auth()->check() || auth()->user()->hasRole('buyer')): ?>
                <a class="btn btn-primary" href="<?php echo e(route('buyer.services.create',array_filter(['type'=>$page['action'] === 'lgc' ? 'lgc_service' : 'inspection','service'=>$page['service'] ?? null]))); ?>"><?php echo e(__($page['action'] === 'inspection' ? 'Request inspection' : 'Request LGC service')); ?></a>
            <?php else: ?>
                <a class="btn btn-primary" href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Contact our team')); ?></a>
            <?php endif; ?>
        <?php elseif($page['action'] === 'seller'): ?>
            <a class="btn btn-primary" href="<?php echo e(!auth()->check() ? route('account-signin') : (auth()->user()->hasRole('admin') ? route('admin.properties.create') : (auth()->user()->hasRole('seller') ? route('seller.properties.create') : (auth()->user()->hasRole('agent') ? route('agent.properties.create') : route('account-profile'))))); ?>"><?php echo e(__('Start listing your property')); ?></a>
        <?php elseif($page['action'] === 'rankings'): ?>
            <a class="btn btn-primary" href="<?php echo e(route('verification-ranks')); ?>"><?php echo e(__('View verification levels')); ?></a>
            <a class="btn btn-outline-primary" href="<?php echo e(route('properties.verified')); ?>"><?php echo e(__('Browse verified properties')); ?></a>
        <?php else: ?>
            <a class="btn btn-primary" href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Contact our team')); ?></a>
            <a class="btn btn-outline-primary" href="mailto:<?php echo e(config('company.email')); ?>"><?php echo e(__('Email us')); ?></a>
        <?php endif; ?>
        <a href="<?php echo e(route('faqs')); ?>"><?php echo e(__('Frequently asked questions')); ?></a>
    </div>
</main>
<?php echo $__env->make('layouts.partials.footer.real-estate-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?> <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?> <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/pages/service.blade.php ENDPATH**/ ?>