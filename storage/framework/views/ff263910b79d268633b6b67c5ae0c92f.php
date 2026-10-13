<?php if($property->is_price_negotiable && $property->total_price !== null): ?>
    <span class="badge position-absolute top-0 end-0 m-2"
          style="z-index:3;background:#198754;color:#fff;border-radius:10px;padding:4px 16px;font-size:12px;line-height:1.3;max-width:calc(50% - 16px);white-space:normal;pointer-events:none"
          data-price-negotiable><?php echo e(__('Negotiable')); ?></span>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/negotiable-label.blade.php ENDPATH**/ ?>