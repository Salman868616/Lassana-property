<?php $type = 'real-estate'; ?>

<?php $__env->startSection('title', 'About us | Lassana Property'); ?>
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/company-pages.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.partials.header.real-estate-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="content-wrapper lp-company">
        
        <section class="container py-5">
            <nav aria-label="<?php echo e(__('Breadcrumb')); ?>"><ol class="breadcrumb mb-4"><li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a></li><li class="breadcrumb-item active" aria-current="page"><?php echo e(__('About us')); ?></li></ol></nav>
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6">
                    <span class="lp-eyebrow"><?php echo e(__('ABOUT LASSANA PROPERTY')); ?></span>
                    <h1 class="display-4 mt-3 mb-4"><?php echo e(__('Your next chapter')); ?><br><?php echo e(__('starts with a place.')); ?></h1>
                    <p class="fs-lg text-body-secondary mb-4"><?php echo e(__('Find land, houses and apartments in Sri Lanka. Explore properties, connect with our team and take the next step towards a place of your own.')); ?></p>
                    <div class="d-flex flex-wrap gap-3"><a class="btn btn-primary btn-lg" href="<?php echo e(route('properties.index')); ?>"><?php echo e(__('Explore properties')); ?> <i class="fi-arrow-right ms-2" aria-hidden="true"></i></a><a class="btn btn-outline-primary btn-lg" href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Talk to us')); ?></a></div>
                    <p class="lp-tagline mt-4 mb-0"><?php echo e(__('Find. Verify. Build. Own.')); ?></p>
                </div>
                <div class="col-lg-6"><img class="w-100 rounded-4 lp-about-image" src="<?php echo e(asset('assets/img/about/v1/video-poster.jpg')); ?>" alt="Residential architecture" fetchpriority="high"></div>
            </div>
        </section>
        <section class="lp-soft-section py-5">
            <div class="container"><div class="row g-4 g-lg-5">
                <div class="col-lg-4"><span class="lp-eyebrow"><?php echo e(__('OUR BACKGROUND')); ?></span><h2 class="h1 mt-3"><?php echo e(__('A foundation in')); ?><br><?php echo e(__('creating spaces.')); ?></h2></div>
                <div class="col-lg-8">
                    <h3 class="h4"><?php echo e(__('Who we are')); ?></h3>
                    <p><?php echo e(__('Lassana Gedara Enterprises works in construction and design across Sri Lanka, serving residential, commercial and industrial projects. Its approach brings together architecture, engineering and sustainable building practices, with an emphasis on understanding each customer’s needs.')); ?></p>
                    <p class="mb-0"><?php echo e(__('Lassana Property brings the property search experience into focus: discover available listings, save the places you like and send your requirements to our team.')); ?></p>
                </div>
            </div></div>
        </section>
        <section class="container py-5">
            <div class="row g-4">
                <div class="col-md-6"><article class="card h-100 rounded-4 p-3 p-lg-4"><div class="card-body"><span class="lp-number">01</span><h2 class="h3 mt-4"><?php echo e(__('Our mission')); ?></h2><p class="mb-0"><?php echo e(__('The company’s mission centres on lasting value: thoughtful design, dependable construction and trusted customer relationships. Modern methods, suitable materials and skilled workmanship support its commitment to quality and clear communication.')); ?></p></div></article></div>
                <div class="col-md-6"><article class="card h-100 rounded-4 p-3 p-lg-4"><div class="card-body"><span class="lp-number">02</span><h2 class="h3 mt-4"><?php echo e(__('Our history & reach')); ?></h2><p class="mb-0"><?php echo e(__('From small beginnings, Lassana Gedara has developed its design and construction work through customer relationships. Its reach extends across Sri Lanka, from urban developments to homes in rural communities.')); ?></p></div></article></div>
            </div>
        </section>
        <section class="container pb-5">
            <div class="text-center mx-auto mb-4" style="max-width:680px"><span class="lp-eyebrow"><?php echo e(__('YOUR PROPERTY JOURNEY')); ?></span><h2 class="h1 mt-3"><?php echo e(__('A simpler way to get started')); ?></h2></div>
            <div class="row g-4">
                <?php $__currentLoopData = [
                    ['fi-search', 'Find your location', 'Browse by district, city and property category to find listings that suit your plans.'],
                    ['fi-heart', 'Keep your favourites', 'Save properties to your buyer account so you can return to them while deciding.'],
                    ['fi-chat', 'Speak with our team', 'Ask about a listing or share your property requirements for help with your search.']
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$icon, $heading, $description]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4"><div class="border rounded-4 p-4 h-100"><i class="<?php echo e($icon); ?> lp-feature-icon" aria-hidden="true"></i><h3 class="h5 mt-3"><?php echo e(__($heading)); ?></h3><p class="mb-0 text-body-secondary"><?php echo e(__($description)); ?></p></div></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <section class="container pb-5"><div class="lp-company-cta rounded-4 p-4 p-lg-5 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4"><div><h2 class="h2 text-white"><?php echo e(__('Let’s talk about your next move.')); ?></h2><p class="mb-0"><?php echo e(__('Our team can help you take the next step.')); ?></p></div><a class="btn btn-light btn-lg flex-shrink-0" href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Contact us')); ?></a></div></section>
    </main>
    <?php echo $__env->make('layouts.partials.footer.real-estate-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/pages/about-us.blade.php ENDPATH**/ ?>