<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" data-bs-theme="light" data-pwa="true">

<head>
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <!-- SEO Meta Tags -->
    <title><?php echo e(trim($__env->yieldContent('title', 'Lassana Property | Properties in Sri Lanka')), false); ?></title>
    <?php if (! empty(trim($__env->yieldContent('social-meta')))): ?>
        <?php echo $__env->yieldContent('social-meta'); ?>
    <?php else: ?>
        <?php echo $__env->make('layouts.partials.page-seo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

    <!-- Webmanifest + Favicon / App icons -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
    <link rel="icon" type="image/webp" href="<?php echo e(asset('assets/img/lassana-property-logo-lossless.webp')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('assets/img/lassana-property-logo.png')); ?>">

    <!-- Lassana Property uses a consistent light theme. -->

    <!-- Preloaded local web font (Inter) -->
    <link rel="preload" href="<?php echo e(Vite::asset('resources/fonts/inter-variable-latin.woff2')); ?>" as="font" type="font/woff2" crossorigin>

    <!-- Font icons -->
    <link rel="preload" href="<?php echo e(asset('assets/icons/finder-icons.woff2')); ?>" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="<?php echo e(asset('assets/icons/finder-icons.min.css')); ?>">

    <!-- Vendor styles -->
    <?php echo $__env->yieldPushContent('styles'); ?>

    <!-- Bootstrap + Theme styles -->
    <?php echo app('Illuminate\Foundation\Vite')([trim($__env->yieldContent('theme-styles', 'resources/scss/app.scss'))]); ?>
    <?php echo $__env->make('layouts.partials.interface-text-case', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<!-- Body -->

<body>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- Back to top button -->
    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
        <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
            <?php echo e(__('Top')); ?>

            <i class="fi-arrow-right fs-base ms-1 me-n1 animate-target"></i>
            <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
            <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" />
            </svg>
        </a>
    </div>

    <!-- Vendor scripts -->
    <?php echo $__env->yieldPushContent('scripts'); ?>

<?php echo $__env->make('layouts.partials.whatsapp-button', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/layouts/app.blade.php ENDPATH**/ ?>