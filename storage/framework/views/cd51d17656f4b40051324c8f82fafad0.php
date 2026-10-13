<section id="sales-overview" class="card p-4 mb-4">
    <h2 class="h5"><?php echo e($role === 'agent' ? 'My sales overview' : 'Sales overview'); ?> · <?php echo e($salesOverview['date']); ?></h2>
    <p class="small text-secondary">Sri Lanka time · Hot leads: Interested or Negotiation · Follow-ups: open leads only.</p>
    <div class="row g-3">
        <?php $__currentLoopData = ['newEnquiries'=>"Today's property enquiries",'newRequests'=>"Today's property requests",'due'=>'Follow-ups due now','today'=>"Today's follow-ups",'hot'=>'Hot leads','unassigned'=>'Unassigned open leads']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-xl"><div class="border rounded p-3 h-100"><span><?php echo e($label); ?></span><strong class="d-block fs-3"><?php echo e($salesOverview[$key]); ?></strong></div></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <h3 class="h6 mt-4">Lead pipeline</h3><div class="d-flex flex-wrap gap-2">
    <?php $__currentLoopData = \App\Services\LeadStages::LABELS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="btn btn-outline-secondary btn-sm" href="<?php echo e(route('dashboard.role',['role'=>$role,'lead_status'=>$key]).'#lead-list'); ?>"><?php echo e($label); ?>: <?php echo e($salesOverview['stages'][$key] ?? 0); ?></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row g-3 mt-2"><div class="col-md-6"><strong>Conversion rate: <?php echo e($salesOverview['conversionRate'] === null ? 'Not available' : $salesOverview['conversionRate'].'%'); ?></strong><p class="small mb-0"><?php echo e($salesOverview['converted']); ?> converted leads / <?php echo e($salesOverview['total']); ?> total leads · All time, including closed conversions.</p></div>
    <div class="col-md-6"><strong>Average first response: <?php echo e($salesOverview['responseMinutes'] === null ? 'Not recorded yet' : $salesOverview['responseMinutes'].' minutes'); ?></strong><p class="small mb-0">Based on the first logged call, email or meeting for <?php echo e($salesOverview['responseCount']); ?> leads.</p></div></div>
    <?php if($role !== 'agent'): ?>
        <h3 class="h6 mt-4">Leads by assigned employee · all time</h3>
        <div class="table-responsive"><table class="table"><thead><tr><th>Employee</th><th>Leads</th><th>Converted</th><th>Conversion rate</th></tr></thead><tbody>
        <?php $__empty_1 = true; $__currentLoopData = $salesOverview['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr><td><?php echo e($employee->assignee?->name ?? 'Unassigned'); ?></td><td><?php echo e($employee->total); ?></td><td><?php echo e($employee->converted); ?></td><td><?php echo e(round(100*$employee->converted/$employee->total,1)); ?>%</td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <tr><td colspan="4">No leads recorded yet.</td></tr> <?php endif; ?>
        </tbody></table></div>
        
    <?php endif; ?>
</section>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/sales-overview.blade.php ENDPATH**/ ?>