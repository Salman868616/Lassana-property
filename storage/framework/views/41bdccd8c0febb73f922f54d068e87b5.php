<?php if($adminData['section']==='management'): ?>
<?php echo $__env->make('dashboard.management-overview', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php elseif($adminData['section']==='leads'): ?>
<?php echo $__env->make('dashboard.admin-leads', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php elseif($adminData['section']==='revenue'): ?>
<section class="card p-4"><h2 class="h4">Revenue tracking</h2><a href="<?php echo e(route('admin.revenue.index')); ?>">Open revenue ledger</a></section>
<?php elseif($adminData['section']==='reports'): ?>
<section class="card mb-4"><div class="card-body"><h2 class="h5">Sales performance summary</h2><p class="text-secondary mb-0">Report downloads and date filters are not available yet.</p></div></section>
<?php echo $__env->make('dashboard.sales-overview', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php else: ?>
<div class="d-flex flex-wrap gap-2 mb-4"><a class="btn btn-lp" href="<?php echo e(route('admin.properties.create')); ?>">+ Add property</a><a class="btn btn-outline-secondary" href="<?php echo e(route('admin.properties.index')); ?>">Manage properties</a><a class="btn btn-outline-secondary" href="<?php echo e(route('admin.users.index')); ?>">Manage users</a></div>
<div class="row g-3 mb-4">
<?php $__currentLoopData = [
['Properties',$propertyCount,'fi-home',route('admin.properties.index')],
["Today's enquiries",$salesOverview['newEnquiries'],'fi-chat',route('dashboard.role',['role'=>'admin','section'=>'leads','tab'=>'enquiries'])],
['Follow-ups due',$salesOverview['due'],'fi-clock',route('dashboard.role',['role'=>'admin','section'=>'leads','lead_queue'=>'due']).'#lead-list'],
['Upcoming viewings',$adminData['upcomingCount'],'fi-calendar',route('dashboard.role',['role'=>'admin','section'=>'leads','tab'=>'viewings'])],
]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metric): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-sm-6 col-xl-3"><a class="card lp-metric" href="<?php echo e($metric[3]); ?>"><div class="lp-metric-icon"><i class="<?php echo e($metric[2]); ?>" aria-hidden="true"></i></div><div><span><?php echo e($metric[0]); ?></span><strong><?php echo e($metric[1]); ?></strong></div></a></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="row g-4 mb-4">
<div class="col-xl-8"><section class="card h-100"><div class="card-header d-flex justify-content-between align-items-center gap-2"><h2 class="h5 mb-0">Properties awaiting review</h2><span class="lp-status under_review"><?php echo e($adminData['pendingCount']); ?> pending</span></div>
<div class="table-responsive"><table class="table mb-0"><thead><tr><th>Property</th><th>Location</th><th>Status</th><th>Action</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $adminData['reviews']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr><td><?php echo e($property->title); ?><small class="d-block text-secondary"><?php echo e($property->property_code); ?></small></td><td><?php echo e($property->city); ?>, <?php echo e($property->district); ?></td><td><span class="lp-status <?php echo e($property->status); ?>"><?php echo e(ucfirst(str_replace('_',' ',$property->status))); ?></span></td><td><a href="<?php echo e(route('dashboard.property',['role'=>'admin','property'=>$property->id])); ?>">Review</a></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <tr><td colspan="4" class="lp-empty">No properties are waiting for review.</td></tr> <?php endif; ?>
</tbody></table></div><div class="card-body mt-auto"><a href="<?php echo e(route('admin.properties.index', ['queue'=>'review'])); ?>">Open review queue &rarr;</a></div></section></div>
<div class="col-xl-4"><section class="card h-100"><div class="card-header"><h2 class="h5 mb-0">Upcoming viewings</h2></div>
<?php $__empty_1 = true; $__currentLoopData = $adminData['upcoming']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="lp-viewing"><div class="lp-date"><strong><?php echo e($viewing->scheduled_at->copy()->timezone('Asia/Colombo')->format('d')); ?></strong><small><?php echo e($viewing->scheduled_at->copy()->timezone('Asia/Colombo')->format('M')); ?></small></div><div><strong class="small"><?php echo e($viewing->property?->title ?? 'Property unavailable'); ?></strong><div class="lp-muted"><?php echo e($viewing->scheduled_at->copy()->timezone('Asia/Colombo')->format('h:i A')); ?> · <?php echo e($viewing->assignee?->name ?? 'Unassigned'); ?></div><?php if($viewing->lead_id): ?><a class="small" href="<?php echo e(route('leads.show',['role'=>'admin','lead'=>$viewing->lead_id])); ?>">Open lead</a><?php endif; ?></div></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <div class="lp-empty">No upcoming viewings scheduled.</div> <?php endif; ?>
</section></div></div>
<section class="card"><div class="card-header d-flex justify-content-between align-items-center"><h2 class="h5 mb-0">Latest properties</h2><a class="small" href="<?php echo e(route('admin.properties.index')); ?>">Manage properties &rarr;</a></div><div class="table-responsive"><table class="table mb-0"><thead><tr><th>Property</th><th>Location</th><th>Status</th><th>Action</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr><td><?php echo e($property->title); ?><small class="d-block text-secondary"><?php echo e($property->property_code); ?></small></td><td><?php echo e($property->city); ?>, <?php echo e($property->district); ?></td><td><span class="lp-status <?php echo e($property->status); ?>"><?php echo e(ucfirst(str_replace('_',' ',$property->status))); ?></span></td><td><a href="<?php echo e(route('dashboard.property',['role'=>'admin','property'=>$property->id])); ?>">View property</a></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <tr><td colspan="4" class="lp-empty">No properties to show yet.</td></tr> <?php endif; ?>
</tbody></table></div><div class="card-body"><?php echo e($properties->withQueryString()->links('pagination::bootstrap-5')); ?></div></section>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/admin-overview.blade.php ENDPATH**/ ?>