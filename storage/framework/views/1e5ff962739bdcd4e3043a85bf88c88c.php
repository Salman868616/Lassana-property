
<?php $__env->startSection('content'); ?>
<section class="card p-4 mb-4"><?php echo $__env->make('dashboard.marketing.metrics', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></section>
<form method="POST" action="<?php echo e(route('admin.marketing.store')); ?>" class="card p-4 mb-4"><?php echo csrf_field(); ?>
<h2 class="h5">Create campaign</h2><div class="d-flex flex-wrap gap-3 align-items-end"><div class="flex-grow-1"><label for="campaign-name" class="form-label">Campaign name</label><input id="campaign-name" name="name" value="<?php echo e(old('name')); ?>" maxlength="150" required class="form-control"></div><button class="btn btn-lp">Create campaign</button></div></form>
<div class="card table-responsive"><table class="table mb-0"><thead><tr><th>Campaign</th><th>Status</th><th>Spending (LKR)</th><th>Attributed leads</th><th>Cost per lead (LKR)</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><a href="<?php echo e(route('admin.marketing.show',$c)); ?>"><?php echo e($c->name); ?></a></td><td><?php echo e($c->is_active ? 'Active' : 'Paused'); ?></td><td><?php echo e($c->spend_entries ? number_format($c->total_spend,2) : 'Not recorded'); ?></td><td><?php echo e($c->leads_count); ?></td><td><?php echo e($c->spend_entries && $c->leads_count ? number_format($c->total_spend/$c->leads_count,2) : '—'); ?></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="5">No campaigns recorded.</td></tr><?php endif; ?>
</tbody></table></div><?php echo e($campaigns->links('pagination::bootstrap-5')); ?>

<p class="small text-secondary mt-3">All-time spending and leads per campaign. Voided spending is excluded. Leads without campaign spending are excluded from the combined cost per lead.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/marketing/index.blade.php ENDPATH**/ ?>