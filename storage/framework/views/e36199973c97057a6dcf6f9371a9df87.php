<?php
    $type = 'real-estate';
    $ranks = [
        ['name' => 'Basic', 'key' => 'basic', 'level' => '01',
            'summary' => 'The first level of listing verification.',
            'checks' => ['Seller identity checked', 'Property information reviewed', 'Property photos reviewed']],
        ['name' => 'Silver', 'key' => 'silver', 'level' => '02',
            'summary' => 'Additional review of property documents.',
            'checks' => ['Basic verification completed', 'Survey document reviewed', 'Ownership documents reviewed']],
        ['name' => 'Gold', 'key' => 'gold', 'level' => '03',
            'summary' => 'An on-site review of the property.',
            'checks' => ['Physical property inspection', 'Relevant cross-checks of property details']],
        ['name' => 'Platinum', 'key' => 'platinum', 'level' => '04',
            'summary' => 'A broader professional review.',
            'checks' => ['Expanded legal review', 'Expanded technical review', 'Reviews by appropriately qualified professionals']],
    ];
?>

<?php $__env->startSection('title', __('Property Verification Levels').' | Lassana Property'); ?>
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/company-pages.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/verification-ranks.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.partials.header.real-estate-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="content-wrapper lp-company lp-rankings">
        <section class="container pt-4 pt-lg-5 pb-5" aria-labelledby="rankings-title">
            <nav aria-label="<?php echo e(__('Breadcrumb')); ?>">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Verification')); ?></li>
                </ol>
            </nav>
            <div class="lp-rankings-intro">
                <span class="lp-eyebrow"><?php echo e(__('LASSANA VERIFIED')); ?></span>
                <h1 id="rankings-title" class="display-5 mt-3 mb-3"><?php echo e(__('Property Verification Levels')); ?></h1>
                <p class="fs-lg text-body-secondary mb-0"><?php echo e(__('Our verification levels explain the level of review behind a listing. Explore Basic, Silver, Gold and Platinum to see what each level covers.')); ?></p>
            </div>
            <div class="row g-4 mt-4">
                <?php $__currentLoopData = $ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-xl-3">
                        <article class="lp-rank-card lp-rank-<?php echo e($rank['key']); ?> h-100" aria-labelledby="rank-<?php echo e($rank['key']); ?>">
                            <div class="lp-rank-card-top">
                                <span class="lp-rank-emblem" aria-hidden="true">
                                    <svg viewBox="0 0 32 36" width="32" height="36" fill="none"><path d="M16 2 29 7v10c0 8-6 13-13 17C9 30 3 25 3 17V7L16 2Z" stroke="currentColor" stroke-width="1.8"/><path d="m10 17 4 4 8-9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                            </div>
                            <p class="lp-rank-level mt-4 mb-2"><?php echo e(__('Level :level', ['level'=>$rank['level']])); ?></p>
                            <h2 id="rank-<?php echo e($rank['key']); ?>" class="h3 mb-3"><?php echo e($rank['name']); ?></h2>
                            <p class="lp-rank-summary"><?php echo e(__($rank['summary'])); ?></p>
                            <h3 class="lp-rank-checks-title"><?php echo e(__('Review scope')); ?></h3>
                            <ul class="lp-rank-checks">
                                <?php $__currentLoopData = $rank['checks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e(__($check)); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <p class="lp-rank-note"><?php echo e(__('Contact our team for details about this verification level.')); ?></p>
                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <section class="lp-soft-section py-5" aria-labelledby="badges-title">
            <div class="container">
                <div class="row g-4 g-lg-5 align-items-start">
                    <div class="col-lg-5">
                        <span class="lp-eyebrow"><?php echo e(__('READ THE BADGE')); ?></span>
                        <h2 id="badges-title" class="h2 mt-3"><?php echo e(__('Know what has been reviewed.')); ?></h2>
                    </div>
                    <div class="col-lg-7">
                        <p><?php echo e(__('A verification badge applies to the checks completed for that particular listing. A published property does not automatically receive a verification badge.')); ?></p>
                        <p class="mb-0"><?php echo e(__('If you need more detail about a property\'s verification, contact our team with its property reference. A badge describes the review scope; it does not guarantee legal title or the property\'s condition.')); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container py-5" aria-labelledby="rankings-next-step">
            <div class="lp-company-cta rounded-4 p-4 p-lg-5 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-4">
                <div>
                    <h2 id="rankings-next-step" class="h3 text-white"><?php echo e(__('Find your next property.')); ?></h2>
                    <p class="mb-0"><?php echo e(__('Browse listings or speak with our team about verification.')); ?></p>
                </div>
                <div class="d-flex flex-wrap gap-3 flex-shrink-0">
                    <a class="btn btn-light" href="<?php echo e(route('properties.index')); ?>"><?php echo e(__('Browse properties')); ?></a>
                    <a class="btn btn-outline-light" href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Contact us')); ?></a>
                </div>
            </div>
        </section>
    </main>
    <?php echo $__env->make('layouts.partials.footer.real-estate-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/pages/verification-ranks.blade.php ENDPATH**/ ?>