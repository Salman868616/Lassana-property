<?php ($pageSeo = \App\Services\PageSeo::forRequest(request())); ?>
<meta name="description" content="<?php echo e(trim($__env->yieldContent('meta-description', $pageSeo['description'])), false); ?>">
<link rel="canonical" href="<?php echo e($pageSeo['url']); ?>">
<meta name="robots" content="<?php echo e($pageSeo['robots']); ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Lassana Property">
<meta property="og:title" content="<?php echo e(trim($__env->yieldContent('title', $pageSeo['title'])), false); ?>">
<meta property="og:description" content="<?php echo e(trim($__env->yieldContent('meta-description', $pageSeo['description'])), false); ?>">
<meta property="og:url" content="<?php echo e($pageSeo['url']); ?>">
<meta property="og:image" content="<?php echo e(asset('assets/img/lassana-property-logo.png')); ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo e(trim($__env->yieldContent('title', $pageSeo['title'])), false); ?>">
<meta name="twitter:description" content="<?php echo e(trim($__env->yieldContent('meta-description', $pageSeo['description'])), false); ?>">
<meta name="twitter:image" content="<?php echo e(asset('assets/img/lassana-property-logo.png')); ?>">
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/layouts/partials/page-seo.blade.php ENDPATH**/ ?>