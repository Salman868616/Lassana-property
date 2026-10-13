<div class="mt-3" data-property-share data-url="<?php echo e($share['url']); ?>" data-title="<?php echo e($share['title']); ?>" data-text="<?php echo e($share['text']); ?>"
     data-copied-message="<?php echo e(__('Property link copied.')); ?>" data-copy-message="<?php echo e(__('Copy the selected link to share this property.')); ?>">
    <div class="lp-share-actions" role="group" aria-label="<?php echo e(__('Share this property')); ?>">
        <span class="lp-share-label"><?php echo e(__('Share this property')); ?></span>
        <a class="lp-share-icon lp-share-whatsapp" title="<?php echo e(__('Share on WhatsApp')); ?>" href="<?php echo e($share['whatsapp']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo e(__('Share this property on WhatsApp (opens a new tab)')); ?>"><i class="fi-whatsapp" aria-hidden="true"></i></a>
        <button type="button" class="lp-share-icon" data-share-copy title="<?php echo e(__('Copy link')); ?>" aria-label="<?php echo e(__('Copy link')); ?>" hidden><i class="fi-copy" aria-hidden="true"></i></button>
        <button type="button" class="lp-share-icon" data-share-native title="<?php echo e(__('Share property')); ?>" aria-label="<?php echo e(__('Share property')); ?>" hidden><i class="fi-share-2" aria-hidden="true"></i></button>
    </div>
    <p class="small mt-2 mb-0 lp-share-status" role="status" aria-live="polite" data-share-status></p>
    <div class="mt-2" data-share-fallback hidden>
        <label for="property-share-url" class="form-label"><?php echo e(__('Property link — select and copy')); ?></label>
        <input id="property-share-url" class="form-control" type="url" value="<?php echo e($share['url']); ?>" readonly>
    </div>
</div>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/share-buttons.blade.php ENDPATH**/ ?>