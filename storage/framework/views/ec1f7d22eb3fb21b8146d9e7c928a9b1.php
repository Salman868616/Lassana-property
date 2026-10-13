<?php $__env->startPush('styles'); ?>
<style>
    .lp-latest-carousel { --swiper-pagination-color:#8B1E24; --swiper-pagination-bullet-inactive-color:#B8ADA3; }
    .lp-latest-carousel .swiper-slide { height:auto; }
    .lp-latest-carousel .swiper-pagination-bullet { width:12px; height:12px; }
    .lp-latest-carousel .swiper-pagination-bullet:focus-visible { outline:2px solid #8B1E24; outline-offset:4px; }
</style>
<?php $__env->stopPush(); ?>
<section class="container py-5" aria-labelledby="latest-properties-title">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h2 id="latest-properties-title" class="h1 mb-2"><?php echo e(__('Latest properties')); ?></h2>
            <p class="text-body-secondary mb-0"><?php echo e(__('Explore our latest property listings.')); ?></p>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-2">
            <a href="<?php echo e(route('properties.all')); ?>" class="btn btn-outline-primary"><?php echo e(__('Browse all properties')); ?></a>
        </div>
    </div>
    <?php if($latestProperties->isNotEmpty()): ?>
    <div id="latest-properties-carousel" class="swiper lp-latest-carousel" aria-label="<?php echo e(__('Latest properties')); ?>" data-swiper='{"slidesPerView":1,"slidesPerGroup":1,"spaceBetween":24,"speed":450,"rewind":false,"watchOverflow":true,"autoplay":{"enabled":false,"delay":3000,"disableOnInteraction":false},"pagination":{"el":".swiper-pagination","clickable":true,"bulletElement":"button"},"keyboard":{"enabled":true,"onlyInViewport":true},"breakpoints":{"768":{"slidesPerView":2},"1200":{"slidesPerView":3}}}'>
    <div class="swiper-wrapper">
        <?php $__currentLoopData = $latestProperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="swiper-slide">
            <?php echo $__env->make('home.property-card', ['featured' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="swiper-pagination position-static mt-4"></div>
    </div>
    <?php else: ?>
        <p class="border rounded-3 p-4 text-body-secondary mb-0"><?php echo e(__('No properties are available right now. Please check back soon.')); ?></p>
    <?php endif; ?>
</section>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/home/latest-properties.blade.php ENDPATH**/ ?>