<section class="lp-contact-card mb-4" aria-labelledby="listing-contact-title">
    <div class="lp-contact-brand">LASSANA PROPERTY</div>
    <h3 class="h5" id="listing-contact-title"><?php echo e(__('Contact our sales team')); ?></h3>
    <div class="lp-contact-details mb-3">
        <?php if($contact['phone']): ?>
            <a class="lp-contact-phone" href="tel:<?php echo e($contact['phone']); ?>"><?php echo e($contact['phone']); ?></a>
        <?php endif; ?>
        <?php if($contact['email']): ?>
            <a class="lp-contact-email" href="mailto:<?php echo e($contact['email']); ?>"><?php echo e($contact['email']); ?></a>
        <?php endif; ?>
    </div>
    <div class="lp-contact-actions">
        <?php if($contact['phone']): ?><a class="btn btn-primary" href="tel:<?php echo e($contact['phone']); ?>"><i class="fi-phone" aria-hidden="true"></i><?php echo e(__('Call')); ?></a><?php endif; ?>
        <?php if($contact['whatsapp']): ?><a class="btn btn-outline-primary" href="<?php echo e($contact['whatsapp']); ?>" target="_blank" rel="noopener noreferrer"><i class="fi-whatsapp" aria-hidden="true"></i>WhatsApp<span class="visually-hidden"> (opens a new tab)</span></a><?php endif; ?>
    </div>
                <?php if(!auth()->check() || auth()->user()->hasRole('buyer')): ?>
                <div class="lp-contact-actions lp-contact-services">
                    <a class="btn btn-outline-primary" href="<?php echo e(route('buyer.services.create', ['type'=>'inspection', 'property_code'=>$property->property_code])); ?>"><?php echo e(__('Request inspection')); ?></a>
                    <a class="btn btn-outline-secondary" href="<?php echo e(route('buyer.services.create', ['type'=>'lgc_service', 'property_code'=>$property->property_code])); ?>"><?php echo e(__('Request LGC service')); ?></a>
                </div>
                <?php endif; ?>
</section>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/contact-card.blade.php ENDPATH**/ ?>