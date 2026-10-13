
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('admin.users.index')); ?>">Back to users</a>
<form method="GET" class="d-flex align-items-end gap-3 my-4"><div><label for="application-status" class="form-label">Status</label><select id="application-status" name="status" class="form-select"><?php $__currentLoopData = ['pending','approved','rejected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($value); ?>" <?php if($status===$value): echo 'selected'; endif; ?>><?php echo e(ucfirst($value)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div><button class="btn btn-lp" type="submit">Filter</button></form>
<div class="card table-responsive"><table class="table mb-0"><thead><tr><th>Applicant</th><th>Email</th><th>Service areas</th><th>Action</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><?php echo e($application->user->name); ?></td><td><?php echo e($application->user->email); ?></td><td><?php echo e($application->service_areas); ?></td><td><a href="<?php echo e(route('admin.agent-applications.show',$application)); ?>">View application</a></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <tr><td colspan="4">No <?php echo e($status); ?> applications.</td></tr><?php endif; ?>
</tbody></table></div><?php echo e($applications->links('pagination::bootstrap-5')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/users/applications.blade.php ENDPATH**/ ?>