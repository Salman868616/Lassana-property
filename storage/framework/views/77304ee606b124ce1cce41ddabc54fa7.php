
<?php $__env->startSection('content'); ?>
<a class="d-inline-block mb-3" href="<?php echo e(route('dashboard.role','admin')); ?>">Back to admin dashboard</a>
<form method="GET" class="card p-3 mb-4">
    <div class="row g-3 align-items-end">
        <div class="col-md-4"><label for="q" class="form-label">Name or email</label><input id="q" name="q" class="form-control" value="<?php echo e($filters['q'] ?? ''); ?>" maxlength="150"></div>
        <div class="col-md-3"><label for="role" class="form-label">Role</label><select id="role" name="role" class="form-select"><option value="">All roles</option><?php $__currentLoopData = \App\Services\DashboardAccess::ROLES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>" <?php if(($filters['role'] ?? '') === $key): echo 'selected'; endif; ?>><?php echo e($label); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
        <div class="col-md-3"><label for="status" class="form-label">Account status</label><select id="status" name="status" class="form-select"><option value="">All accounts</option><option value="active" <?php if(($filters['status'] ?? '') === 'active'): echo 'selected'; endif; ?>>Active</option><option value="suspended" <?php if(($filters['status'] ?? '') === 'suspended'): echo 'selected'; endif; ?>>Suspended</option></select></div>
        <div class="col-md-2"><button class="btn btn-lp" type="submit">Search</button> <a href="<?php echo e(route('admin.users.index')); ?>">Clear</a></div>
    </div>
</form>
<section class="card"><div class="card-header"><?php echo e($users->total()); ?> accounts</div><div class="table-responsive"><table class="table mb-0">
<thead><tr><th>Name</th><th>Email</th><th>Roles</th><th>Status</th><th>Action</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr><td><?php echo e($account->name); ?></td><td><?php echo e($account->email); ?></td><td><?php echo e($account->roles->map(fn ($r)=>\App\Services\DashboardAccess::ROLES[$r->name] ?? $r->name)->join(', ') ?: 'No role assigned'); ?>

<?php if($account->has_pending_agent_application): ?>
<div class="mt-1"><span class="badge text-wrap" style="background:#fff3cd;color:#664d03">Agent approval pending</span></div>
<?php endif; ?>
</td><td><?php echo e($account->is_active ? 'Active' : 'Suspended'); ?></td><td><a href="<?php echo e(route('admin.users.edit',$account)); ?>">Manage access</a></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <tr><td colspan="5">No matching accounts.</td></tr> <?php endif; ?>
</tbody></table></div><div class="card-body"><?php echo e($users->links('pagination::bootstrap-5')); ?></div></section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/users/index.blade.php ENDPATH**/ ?>