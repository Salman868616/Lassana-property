<?php ($agentCarousel = ($carousel ?? false) && $agents->isNotEmpty()); ?>
<?php if($agentCarousel): ?>
<div class="swiper lp-agent-carousel" aria-label="<?php echo e(__('Browse agents')); ?>" data-swiper='{"slidesPerView":1,"slidesPerGroup":1,"spaceBetween":24,"watchOverflow":true,"pagination":{"el":".swiper-pagination","clickable":true,"bulletElement":"button"},"keyboard":{"enabled":true,"onlyInViewport":true},"breakpoints":{"576":{"slidesPerView":2,"slidesPerGroup":2},"992":{"slidesPerView":4,"slidesPerGroup":4}}}'>
<?php endif; ?>
<div class="<?php echo e($agentCarousel ? 'swiper-wrapper' : 'row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4'); ?>">
    <?php $__empty_1 = true; $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="<?php echo e($agentCarousel ? 'swiper-slide' : 'col'); ?>">
        <article class="card h-100 p-4 text-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:88px;height:88px;background:#f6e9eb;color:#8B1E24;font-size:32px" aria-hidden="true"><?php if($photoUrl = $agent->profilePhotoUrl()): ?><img src="<?php echo e($photoUrl); ?>" class="rounded-circle w-100 h-100 object-fit-cover" alt="" loading="lazy"><?php else: ?><?php echo e(\Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($agent->name, 0, 1))); ?><?php endif; ?></div>
            <h3 class="h5 text-break"><a href="<?php echo e(route('agents.show', $agent)); ?>" style="color:#8B1E24"><?php echo e($agent->name); ?></a></h3>
            <p class="small text-body-secondary text-break mb-2"><?php echo e($agent->agency_name ?: 'Lassana Property agent'); ?></p>
            <?php if($agent->city): ?><p class="small text-break mb-2"><?php echo e($agent->city); ?></p><?php endif; ?>
            <p class="small mt-auto"><?php echo e($agent->published_properties_count); ?> <?php echo e($agent->published_properties_count == 1 ? 'published property' : 'published properties'); ?></p>
            <a href="<?php echo e(route('agents.show', $agent)); ?>" class="btn btn-outline-primary btn-sm"><?php echo e(__('View profile')); ?></a>
        </article>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col w-100"><p class="border rounded p-4 mb-0"><?php echo e(__('No agents available at the moment.')); ?> <a href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Contact our team')); ?></a> <?php echo e(__('for assistance.')); ?></p></div>
    <?php endif; ?>
</div>
<?php if($agentCarousel): ?>
    <div class="swiper-pagination position-static mt-4"></div>
</div>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/agents/cards.blade.php ENDPATH**/ ?>