<?php $__env->startSection('title', $agent->name.' | Agent | Lassana Property'); ?>
<?php $__env->startSection('meta-description', 'Explore properties listed by '.$agent->name.($agent->city ? ' in '.$agent->city : '').' and contact them through Lassana Property.'); ?>
<?php $__env->startPush('styles'); ?>
<style>
    .lp-agent-cover {height:240px;background:linear-gradient(90deg,#30151855,#30151811),url('<?php echo e(asset('assets/img/listings/real-estate/vendor-cover.jpg')); ?>') center/cover}
    .lp-agent-profile {position:relative;margin-top:-64px;background:#fff;border:1px solid #eadcde;border-radius:16px;padding:36px}
    .lp-agent-avatar {width:112px;height:112px;flex:0 0 112px;display:flex;align-items:center;justify-content:center;border-radius:50%;background:#f6e9eb;color:#8B1E24;font-size:44px;border:5px solid white}
    .lp-agent-page .btn-primary {background:#8B1E24;border-color:#8B1E24}
    .lp-agent-page .btn-primary:hover {background:#5A1015;border-color:#5A1015}
    .lp-agent-bio {white-space:pre-line;overflow-wrap:anywhere}
    @media(max-width:575.98px) {.lp-agent-cover{height:160px}.lp-agent-profile{padding:24px;margin-top:-40px}.lp-agent-avatar{width:80px;height:80px;flex-basis:80px;font-size:32px}}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.partials.header.real-estate-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="lp-agent-page">
    <div class="lp-agent-cover" aria-hidden="true"></div>
    <div class="container pb-5">
        <section class="lp-agent-profile mb-5" aria-labelledby="agent-name">
            <a href="<?php echo e(route('agents.index')); ?>" class="small d-inline-block mb-4"><?php echo e(__('All agents')); ?></a>
            <div class="d-flex flex-wrap align-items-center gap-4">
                <div class="lp-agent-avatar" aria-hidden="true"><?php if($photoUrl = $agent->profilePhotoUrl()): ?><img src="<?php echo e($photoUrl); ?>" class="rounded-circle w-100 h-100 object-fit-cover" alt="" loading="lazy"><?php else: ?><?php echo e(\Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($agent->name, 0, 1))); ?><?php endif; ?></div>
                <div class="flex-grow-1" style="min-width:0">
                    <span class="small fw-semibold" style="color:#8B1E24"><?php echo e(__('Property agent')); ?></span>
                    <h1 class="h2 mt-2 text-break" id="agent-name"><?php echo e($agent->name); ?></h1>
                    <?php if($agent->agency_name): ?><p class="mb-1 text-break"><?php echo e($agent->agency_name); ?></p><?php endif; ?>
                    <?php if($agent->city): ?><p class="text-body-secondary mb-0 text-break"><?php echo e($agent->city); ?></p><?php endif; ?>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <?php if($agent->phone && preg_match('/^[+0-9\s().-]+$/', $agent->phone)): ?>
                    <a class="btn btn-primary" href="tel:<?php echo e(preg_replace('/[^+0-9]/', '', $agent->phone)); ?>"><?php echo e(__('Call agent')); ?></a>
                    <?php endif; ?>
                    <a class="btn btn-outline-primary" href="mailto:<?php echo e($agent->email); ?>"><?php echo e(__('Send email')); ?></a>
                </div>
            </div>
            <div class="row g-4 border-top mt-4 pt-2">
                <div class="col-md-8">
                    <h2 class="h5">About <?php echo e($agent->name); ?></h2>
                    <p class="lp-agent-bio mb-0"><?php echo e($agent->bio ?: 'Contact this agent to discuss your property requirements.'); ?></p>
                    <?php if($agent->service_areas): ?><h3 class="h6 mt-4"><?php echo e(__('Areas served')); ?></h3><p class="text-break mb-0"><?php echo e($agent->service_areas); ?></p><?php endif; ?>
                </div>
                <div class="col-md-4">
                    <div class="rounded-3 p-4" style="background:#fbf7f3">
                        <strong class="h2 d-block" style="color:#8B1E24"><?php echo e($properties->total()); ?></strong>
                        <span>Published <?php echo e($properties->total() == 1 ? 'property' : 'properties'); ?></span>
                    </div>
                </div>
            </div>
        </section>
        <section aria-labelledby="agent-properties">
            <h2 class="h3 mb-4" id="agent-properties"><?php echo e(__('Available properties')); ?></h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col"><article class="card h-100 overflow-hidden">
                    <div class="position-relative">
                    <a class="ratio ratio-4x3 bg-body-tertiary" href="<?php echo e(route('properties.show', $property->property_code)); ?>" aria-label="View <?php echo e($property->title); ?>">
                        <?php if($property->images->isNotEmpty()): ?>
                        <img src="<?php echo e(asset('storage/'.$property->images->first()->path)); ?>" class="object-fit-cover" alt="<?php echo e($property->title); ?>" loading="lazy">
                        <?php else: ?>
                        <span class="d-flex align-items-center justify-content-center text-body-secondary"><?php echo e(__('No photo available')); ?></span>
                        <?php endif; ?>
                    </a>
                    <?php echo $__env->make('properties.category-badge', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <div class="card-body">
                        <p class="h5" style="color:#8B1E24"><?php echo e($property->priceLabel()); ?></p>
                        <h3 class="h6"><a class="text-body" href="<?php echo e(route('properties.show', $property->property_code)); ?>"><?php echo e($property->title); ?></a></h3>
                        <p class="small text-body-secondary"><?php echo e(collect([$property->city, $property->district])->filter()->implode(', ')); ?></p>
                        <?php echo $__env->make('properties.card-highlights', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <div class="card-footer border-0 bg-transparent"><a href="<?php echo e(route('properties.show', $property->property_code)); ?>" class="btn btn-outline-primary btn-sm"><?php echo e(__('View property')); ?></a></div>
                </article></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col w-100"><p class="border rounded-3 p-4"><?php echo e(__('This agent has no published properties at the moment.')); ?> <a href="<?php echo e(route('properties.index')); ?>"><?php echo e(__('Browse all properties')); ?></a>.</p></div>
                <?php endif; ?>
            </div>
            <div class="mt-4"><?php echo e($properties->links()); ?></div>
        </section>
    </div>
</main>
<?php echo $__env->make('layouts.partials.footer.real-estate-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/agents/show.blade.php ENDPATH**/ ?>