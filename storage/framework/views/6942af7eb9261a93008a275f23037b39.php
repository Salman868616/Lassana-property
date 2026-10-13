
<?php $__env->startSection('title', 'Reports | Lassana Property'); ?>
<?php $__env->startSection('heading', 'Reports'); ?>
<?php $__env->startSection('content'); ?>
<p class="text-secondary">Generate reports from current property, user and lead records. Date filters use the record's creation date in Sri Lanka time. These are current records, not historical snapshots.</p>
<div class="d-flex flex-wrap gap-2 mb-4" aria-label="Report type">
    <?php $__currentLoopData = ['properties'=>'Properties','users'=>'Users','leads'=>'Leads']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="btn <?php echo e($type === $key ? 'btn-lp' : 'btn-outline-secondary'); ?>" href="<?php echo e(route('admin.reports.index',['type'=>$key])); ?>" <?php if($type === $key): ?> aria-current="page" <?php endif; ?>><?php echo e($label); ?></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php if($errors->any()): ?><div class="alert alert-danger" role="alert"><?php echo e($errors->first()); ?></div><?php endif; ?>
<section class="card mb-4"><div class="card-body">
<form method="GET" action="<?php echo e(route('admin.reports.index')); ?>">
    <input type="hidden" name="type" value="<?php echo e($type); ?>">
    <div class="row g-3 align-items-end">
        <div class="col-12 col-sm-6 col-xl"><label for="report-from" class="form-label">From Date</label><input class="form-control" id="report-from" type="date" name="from" value="<?php echo e($filters['from'] ?? ''); ?>"></div>
        <div class="col-12 col-sm-6 col-xl"><label for="report-to" class="form-label">To Date</label><input class="form-control" id="report-to" type="date" name="to" value="<?php echo e($filters['to'] ?? ''); ?>"></div>
        <?php
            $selects = match($type) {
                'users'=>['role'=>['Role',\App\Services\DashboardAccess::ROLES],'account_status'=>['Account status',['active'=>'Active','suspended'=>'Suspended']]],
                'leads'=>['stage'=>['Lead stage',\App\Services\LeadStages::LABELS],'assignee'=>['Assigned agent / sales staff',['unassigned'=>'Unassigned'] + $assignees->pluck('name','id')->all()]],
                default=>['category'=>['Category',['land'=>'Land','house'=>'House','apartment'=>'Apartment','villa'=>'Villa','commercial'=>'Commercial']], 'district'=>['District',array_combine($districts,$districts)], 'property_status'=>['Status',['draft'=>'Draft','submitted'=>'Submitted','under_review'=>'Under review','approved'=>'Approved','published'=>'Published','sold'=>'Sold','archived'=>'Archived']]],
            };
        ?>
        <?php $__currentLoopData = $selects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name=>[$label,$options]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-sm-6 col-xl"><label class="form-label" for="report-<?php echo e($name); ?>"><?php echo e($label); ?></label><select class="form-select" id="report-<?php echo e($name); ?>" name="<?php echo e($name); ?>"><option value="">All</option><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value=>$text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($value); ?>" <?php if((string)($filters[$name] ?? '') === (string)$value): echo 'selected'; endif; ?>><?php echo e($text); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-xl-auto"><div class="d-flex gap-2"><button class="btn btn-lp text-nowrap" type="submit">Apply Filters</button><a class="btn btn-outline-secondary" href="<?php echo e(route('admin.reports.index',['type'=>$type])); ?>">Clear</a></div></div>
    </div>
</form>
</div></section>
<section class="card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2"><h2 class="h5 mb-0"><?php echo e(ucfirst($type)); ?> report <span class="text-secondary">(<?php echo e(number_format($records->total())); ?> records)</span></h2><a class="btn btn-lp" href="<?php echo e(route('admin.reports.download',array_merge($filters,['type'=>$type]))); ?>">Download Report</a></div>
    <div class="card-body"><p class="small text-secondary mb-0">The download includes all matching records across every page. Deleted properties are excluded.</p></div>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><th scope="col"><?php echo e($header); ?></th><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tr></thead><tbody>
        <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td><?php echo e($value ?? '—'); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="<?php echo e(count($headers)); ?>" class="text-center py-4">No Records Match These Filters.</td></tr><?php endif; ?>
    </tbody></table></div>
    <div class="card-body"><?php echo e($records->links('pagination::bootstrap-5')); ?></div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/admin/reports.blade.php ENDPATH**/ ?>