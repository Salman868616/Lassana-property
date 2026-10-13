<section class="container" aria-labelledby="home-contact-title"><div class="lp-conversion-banner">
<div><h2 class="h1" id="home-contact-title"><?php echo e(__('Let’s talk about your next step')); ?></h2><p class="mb-0"><?php echo e(__('Ask about a property, listing your own property or getting help with a building project.')); ?></p></div>
<div class="lp-conversion-links">
<?php if(config('company.whatsapp')): ?><a class="btn btn-outline-primary" href="https://wa.me/<?php echo e(preg_replace('/\D/','',config('company.whatsapp'))); ?>?text=<?php echo e(rawurlencode('Hello, I would like to make an enquiry about Lassana Property.')); ?>" target="_blank" rel="noopener noreferrer"><i class="fi-whatsapp me-2" aria-hidden="true"></i>WhatsApp</a><?php endif; ?>
<a class="btn btn-outline-primary" href="tel:<?php echo e(config('company.phone_uri')); ?>"><?php echo e(__('Call our team')); ?></a><a class="btn btn-primary" href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Make an enquiry')); ?></a>
</div></div></section>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/home/contact-options.blade.php ENDPATH**/ ?>