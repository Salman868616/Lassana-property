<p class="text-secondary">Management overview · <?php echo e($managementOverview['date']); ?></p>
<div class="row g-3 mb-4">
<?php $__currentLoopData = [
    ['Total listings',$managementOverview['listings'],'All retained listings, including sold and archived; deleted records excluded.'],
    ["Today's new listings",$managementOverview['newListings'],'Created today, regardless of publication status.'],
    ['Published listings',$managementOverview['published'],'Currently visible on the public website.'],
    ['Verified listings',$managementOverview['verified'],'Basic, Silver or Gold; under review, approved or published.'],
    ['Pending approvals',$managementOverview['pendingApprovals'],'Submitted and under-review listings.'],
    ['Ready to publish',$managementOverview['readyToPublish'],'Approved listings awaiting publication.'],
    ['Total viewings',$managementOverview['viewings'],'All recorded viewings, including cancelled and completed.'],
    ['Upcoming viewings',$managementOverview['upcomingViewings'],'Scheduled appointments from now onwards.'],
]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label,$value,$description]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-6 col-xl-3"><section class="card h-100 p-3"><h2 class="h6"><?php echo e($label); ?></h2><strong class="fs-2"><?php echo e($value); ?></strong></section></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php echo $__env->make('dashboard.management-charts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('dashboard.sales-overview', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<section class="card p-4 mt-4">
    <h2 class="h5">Company revenue</h2>
    <div class="row g-3">
    <?php $__currentLoopData = ['listing'=>'Listing revenue','verification'=>'Verification revenue','total'=>'Total revenue']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4"><h3 class="h6"><?php echo e($label); ?></h3><p class="mb-0">LKR <?php echo e(number_format($managementOverview['revenue'][$key], 2)); ?></p></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <p class="small text-secondary mt-3">Recorded payments · All time · Voided entries excluded</p>
    <a href="<?php echo e(route('admin.revenue.index')); ?>">Manage revenue</a>
    <p class="small text-secondary mt-3 mb-0">Subscription revenue: Not available yet</p>
</section>

<section class="card p-4 mt-4"><h2 class="h5">Complaints</h2><div class="row g-3">
<div class="col-sm-3"><h3 class="h6">Total complaints</h3><strong class="fs-3"><?php echo e($managementOverview['complaints']->sum()); ?></strong></div>
<?php $__currentLoopData = \App\Models\Complaint::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="col-sm-3"><h3 class="h6"><?php echo e($label); ?></h3><strong class="fs-3"><?php echo e($managementOverview['complaints'][$key] ?? 0); ?></strong></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><a class="mt-3" href="<?php echo e(route('admin.complaints.index')); ?>">Manage complaints</a></section>

<section class="card p-4 mt-4"><h2 class="h5 mb-3">Visitors and campaigns</h2>
<?php echo $__env->make('dashboard.marketing.metrics',['metrics'=>$managementOverview['marketing']], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<a class="mt-3" href="<?php echo e(route('admin.marketing.index')); ?>">Manage campaigns</a></section>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/management-overview.blade.php ENDPATH**/ ?>