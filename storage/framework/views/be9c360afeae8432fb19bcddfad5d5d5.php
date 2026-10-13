<section class="container" aria-labelledby="home-verification-title">
<h2 class="h1" id="home-verification-title"><?php echo e(__('How Lassana Verification Works')); ?></h2>
<p class="lp-conversion-intro"><?php echo e(__('Understand the checks behind a listing before deciding your next step.')); ?></p>
<div class="lp-conversion-grid"><?php $__currentLoopData = [
['1','Listing review','The team reviews the submitted property information and records its verification level.'],
['2','Document review','Silver verification adds a review of the required property documents.'],
['3','Check the scope','Read the current badge and verification level details. Ask the team about any further checks you need.']
]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$number,$heading,$body]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><article class="lp-conversion-card"><span class="lp-conversion-number" aria-hidden="true"><?php echo e($number); ?></span><h3><?php echo e(__($heading)); ?></h3><p><?php echo e(__($body)); ?></p></article><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
<div class="lp-conversion-links"><a class="btn btn-outline-primary" href="<?php echo e(route('verification-ranks')); ?>"><?php echo e(__('Understand verification levels')); ?></a><a href="<?php echo e(route('services.show',['page'=>'property-inspection'])); ?>"><?php echo e(__('Explore property inspections')); ?></a></div>
</section>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/home/verification-explainer.blade.php ENDPATH**/ ?>