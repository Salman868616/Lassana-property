<?php $type = 'real-estate'; ?>

<?php $__env->startSection('title', 'Contact us | Lassana Property'); ?>
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/company-pages.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.partials.header.real-estate-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="content-wrapper lp-company">
        
        <section class="container py-5">
            <nav aria-label="<?php echo e(__('Breadcrumb')); ?>"><ol class="breadcrumb mb-4"><li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a></li><li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Contact us')); ?></li></ol></nav>
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6"><span class="lp-eyebrow"><?php echo e(__('CONTACT US')); ?></span><h1 class="display-4 mt-3 mb-4"><?php echo e(__('Let’s find your')); ?><br><?php echo e(__('next place.')); ?></h1><p class="fs-lg text-body-secondary"><?php echo e(__('Have a question about a property, listing your land or getting started? Get in touch with the Lassana Gedara team.')); ?></p></div>
                <div class="col-lg-6"><img class="w-100 rounded-4 lp-contact-image" src="<?php echo e(asset('assets/img/contact/v1/hero.jpg')); ?>" alt="House exterior with a landscaped garden" fetchpriority="high"></div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-md-6"><article class="card h-100 rounded-4 p-2 p-lg-3"><div class="card-body"><i class="fi-phone-call lp-feature-icon" aria-hidden="true"></i><h2 class="h4 mt-3"><?php echo e(__('Call our team')); ?></h2><a class="btn btn-primary" href="tel:<?php echo e(config('company.phone_uri')); ?>"><?php echo e(config('company.phone')); ?></a></div></article></div>
                <div class="col-md-6"><article class="card h-100 rounded-4 p-2 p-lg-3"><div class="card-body"><i class="fi-mail lp-feature-icon" aria-hidden="true"></i><h2 class="h4 mt-3"><?php echo e(__('Email us')); ?></h2><p class="text-body-secondary"><?php echo e(__('Include the property ID if your question is about a listing.')); ?></p><a class="btn btn-outline-primary text-break" href="mailto:<?php echo e(config('company.email')); ?>"><?php echo e(config('company.email')); ?></a></div></article></div>
            </div>
        </section>
        <section class="lp-soft-section py-5"><div class="container"><div class="row g-4 g-lg-5 align-items-center">
            <div class="col-lg-5"><span class="lp-eyebrow"><?php echo e(__('FIND US IN GAMPAHA')); ?></span><h2 class="h1 mt-3"><?php echo e(__('Visit our office')); ?></h2><p class="text-body-secondary"><?php echo e(__('Contact us before visiting to arrange a convenient time.')); ?></p><address class="fs-lg mb-4"><?php echo e(config('company.address')); ?></address><a class="btn btn-primary" href="<?php echo e(config('company.map_url')); ?>" target="_blank" rel="noopener noreferrer"><?php echo e(__('Open in Google Maps')); ?> <i class="fi-arrow-up-right ms-2" aria-hidden="true"></i></a></div>
            <div class="col-lg-7"><div class="card rounded-4 p-4 p-lg-5"><span class="lp-eyebrow"><?php echo e(__('HOW CAN WE HELP?')); ?></span><h3 class="h3 mt-3"><?php echo e(__('Make your enquiry more useful')); ?></h3><ul class="mb-4"><li class="mb-2"><?php echo e(__('For a listed property, tell us its property ID.')); ?></li><li class="mb-2"><?php echo e(__('For your search, include your preferred district, city and budget.')); ?></li><li><?php echo e(__('For a visit, share your preferred dates and a contact number.')); ?></li></ul><div class="d-flex flex-wrap gap-3"><a class="btn btn-outline-primary" href="<?php echo e(route('properties.index')); ?>"><?php echo e(__('Browse properties')); ?></a><?php if(auth()->check() && !auth()->user()->hasRole('buyer')): ?>
<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#buyer-account-required"><?php echo e(__('Request a property')); ?></button>
<?php else: ?>
<a class="btn btn-outline-primary" href="<?php echo e(route('buyer.requests.create')); ?>"><?php echo e(__('Request a property')); ?></a>
<?php endif; ?></div></div></div>
        </div></div></section>
    </main>
    <?php echo $__env->make('layouts.partials.footer.real-estate-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/pages/contact-us.blade.php ENDPATH**/ ?>