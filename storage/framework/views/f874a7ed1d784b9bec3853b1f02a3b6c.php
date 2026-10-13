
<?php $__env->startSection('content'); ?>
<form method="GET" class="d-flex gap-3 align-items-end mb-4">
<div><label for="complaint-status" class="form-label">Status</label><select id="complaint-status" name="status" class="form-select"><option value="">All statuses</option><?php $__currentLoopData = \App\Models\Complaint::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>" <?php if($status===$key): echo 'selected'; endif; ?>><?php echo e($label); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
<button class="btn btn-lp">Filter</button></form>
<div class="card table-responsive"><table class="table mb-0"><thead><tr><th>Complaint</th><?php if($admin): ?><th>Submitted by</th><?php endif; ?><th>Status</th><th>Submitted</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><a href="<?php echo e(route($admin ? 'admin.complaints.show' : 'complaints.show',$item)); ?>">#<?php echo e($item->id); ?> · <?php echo e($item->subject); ?></a></td><?php if($admin): ?><td><?php echo e($item->user->name); ?></td><?php endif; ?><td><?php echo e(\App\Models\Complaint::STATUSES[$item->status]); ?></td><td><?php echo e($item->created_at->timezone('Asia/Colombo')->format('d M Y')); ?></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="<?php echo e($admin ? 4 : 3); ?>">No complaints found.</td></tr><?php endif; ?>
</tbody></table></div><?php echo e($items->links('pagination::bootstrap-5')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/complaints/index.blade.php ENDPATH**/ ?>