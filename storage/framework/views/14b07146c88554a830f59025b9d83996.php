<div class="row g-3">
<?php $__currentLoopData = [['Visitors today',$metrics['visitorsToday']],['Visitors · last 30 days',$metrics['visitors30']],['Page views · last 30 days',$metrics['pageViews30']]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label,$value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-4"><h3 class="h6"><?php echo e($label); ?></h3><strong class="fs-3"><?php echo e(number_format($value)); ?></strong></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><p class="small text-secondary mt-3">Visitors are anonymous browser sessions, not individual people. Staff and known bots are excluded. <?php if(!$metrics['tracking']): ?>Tracking is disabled.<?php endif; ?> <?php if(!app()->environment('production')): ?>Development-site traffic.<?php endif; ?></p>
<div class="row g-3 mt-1">
<div class="col-md-4"><h3 class="h6">Campaign spending · all time</h3><strong><?php echo e($metrics['hasSpend'] ? 'LKR '.number_format($metrics['spend'],2) : 'Not recorded yet'); ?></strong></div>
<div class="col-md-4"><h3 class="h6">Leads from campaigns with spending</h3><strong><?php echo e($metrics['paidLeads']); ?></strong></div>
<div class="col-md-4"><h3 class="h6">Cost per lead · all time</h3><strong><?php echo e($metrics['cpl'] !== null ? 'LKR '.number_format($metrics['cpl'],2) : 'Not available yet'); ?></strong></div>
</div>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/marketing/metrics.blade.php ENDPATH**/ ?>