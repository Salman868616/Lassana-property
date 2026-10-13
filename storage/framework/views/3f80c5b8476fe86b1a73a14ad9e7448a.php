<?php ($photoCount = $property->images->count()); ?>
<?php if($photoCount): ?>
    <section class="lp-gallery" data-property-gallery aria-label="<?php echo e(__('Property photos')); ?>">
        <div class="lp-gallery-stage">
            <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a id="property-photo-<?php echo e($property->id); ?>-<?php echo e($loop->index); ?>"
                   class="lp-gallery-photo" href="<?php echo e(asset('storage/'.$photo->path)); ?>"
                   data-glightbox data-gallery="property-gallery" data-gallery-photo
                   aria-label="<?php echo e(__('Open photo :number of :title', ['number'=>$loop->iteration, 'title'=>$property->title])); ?>"
                   <?php if(!$loop->first): ?> hidden <?php endif; ?>>
                    <img src="<?php echo e(asset('storage/'.$photo->path)); ?>" alt="<?php echo e($property->title); ?> — <?php echo e(__('Photo :current of :total', ['current'=>$loop->iteration, 'total'=>$photoCount])); ?>"
                         <?php if(!$loop->first): ?> loading="lazy" <?php endif; ?> decoding="async">
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('properties.negotiable-label', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php if($photoCount > 1): ?>
                <button class="lp-gallery-arrow lp-gallery-prev" type="button" data-gallery-prev aria-label="<?php echo e(__('Previous photo')); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 5-7 7 7 7"/></svg>
                </button>
                <button class="lp-gallery-arrow lp-gallery-next" type="button" data-gallery-next aria-label="<?php echo e(__('Next photo')); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m9 5 7 7-7 7"/></svg>
                </button>
            <?php endif; ?>
            <span class="lp-gallery-counter" aria-hidden="true"><span data-gallery-current>1</span> / <?php echo e($photoCount); ?></span>
        </div>
        <?php if($photoCount > 1): ?>
            <div class="lp-gallery-thumbnails" data-gallery-thumbnails>
                <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="lp-gallery-thumbnail" type="button" data-gallery-thumbnail="<?php echo e($loop->index); ?>"
                            aria-label="<?php echo e(__('Show photo :number', ['number'=>$loop->iteration])); ?>"
                            aria-controls="property-photo-<?php echo e($property->id); ?>-<?php echo e($loop->index); ?>"
                            aria-pressed="<?php echo e($loop->first ? 'true' : 'false'); ?>">
                        <img src="<?php echo e(asset('storage/'.$photo->path)); ?>" alt="" loading="lazy" decoding="async">
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <p class="visually-hidden" role="status" aria-live="polite" aria-atomic="true"
           data-gallery-status data-gallery-status-format="<?php echo e(__('Photo :current of :total')); ?>"><?php echo e(__('Photo :current of :total', ['current'=>1, 'total'=>$photoCount])); ?></p>
    </section>
<?php else: ?>
    <div class="position-relative bg-body-tertiary rounded p-5 text-center text-secondary">
        <?php echo e(__('No photos available for this property.')); ?>

        <?php echo $__env->make('properties.negotiable-label', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
<?php endif; ?>

<?php $__env->startPush('styles'); ?>
<style>
    .lp-gallery {min-width:0}
    .lp-gallery-stage {position:relative;aspect-ratio:16/9;max-height:600px;overflow:hidden;border-radius:14px;background:#f1f3f5}
    .lp-gallery-photo {position:absolute;inset:0;display:block;cursor:zoom-in}
    .lp-gallery-photo[hidden] {display:none!important}
    .lp-gallery-photo img {display:block;width:100%;height:100%;object-fit:contain}
    .lp-gallery-arrow {position:absolute;top:50%;transform:translateY(-50%);z-index:2;display:flex;align-items:center;justify-content:center;width:48px;height:48px;padding:0;border:1px solid #ffffffa6;border-radius:50%;background:#8b1e24cc;color:#fff;box-shadow:0 2px 8px #0002}
    .lp-gallery-arrow:hover {background:#8b1e24}
    .lp-gallery-prev {left:16px}
    .lp-gallery-next {right:16px}
    .lp-gallery-counter {position:absolute;bottom:14px;right:16px;z-index:2;padding:5px 12px;border-radius:20px;background:#17212bcc;color:#fff;font-size:13px;pointer-events:none}
    .lp-gallery-thumbnails {display:flex;gap:10px;max-width:100%;overflow-x:auto;padding:14px 3px 6px;overscroll-behavior-x:contain;scrollbar-width:thin}
    .lp-gallery-thumbnail {flex:0 0 88px;width:88px;height:76px;overflow:hidden;padding:4px;border:2px solid #e0e5eb;border-radius:10px;background:#fff}
    .lp-gallery-thumbnail img {display:block;width:100%;height:100%;object-fit:cover;border-radius:5px}
    .lp-gallery-thumbnail:hover {border-color:#bd777b}
    .lp-gallery-thumbnail[aria-pressed="true"] {border-color:#8b1e24;box-shadow:0 0 0 1px #8b1e24}
    .lp-gallery-arrow:focus-visible,.lp-gallery-thumbnail:focus-visible,.lp-gallery-photo:focus-visible {outline:3px solid #c89b3c;outline-offset:-3px}
    @media(max-width:575.98px) {.lp-gallery-stage {aspect-ratio:4/3}.lp-gallery-arrow {width:44px;height:44px}.lp-gallery-prev {left:10px}.lp-gallery-next {right:10px}.lp-gallery-thumbnail {flex-basis:72px;width:72px;height:64px}.lp-gallery-thumbnails {gap:8px}}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/property-gallery.js')); ?>" defer></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/gallery.blade.php ENDPATH**/ ?>