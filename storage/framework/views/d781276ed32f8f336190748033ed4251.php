<?php $__env->startSection('content'); ?>
<?php if($role === 'admin'): ?>
<?php echo $__env->make('dashboard.admin-overview', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php else: ?>

<?php if($salesOverview && in_array($dashboardTab,['overview','performance'],true)): ?> <?php echo $__env->make('dashboard.sales-overview', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
<?php if($dashboardTab === 'overview'): ?>
<?php if($role === 'seller'): ?>
    <p class="text-secondary mb-4">Buyer enquiries are managed by the Lassana Property team. The team will contact you with updates.</p>
<?php endif; ?>
<div class="d-flex flex-wrap gap-2 mb-4">
    <?php if(in_array($role, ['seller','agent'], true)): ?>
        <a class="btn btn-lp" href="<?php echo e(route($role.'.properties.create')); ?>">Add property</a>
    <?php endif; ?>
    <?php if($role === 'admin'): ?>
        <a class="btn btn-outline-secondary" href="<?php echo e(route('admin.users.index')); ?>">Manage users</a>
        <a class="btn btn-lp" href="<?php echo e(route('admin.properties.index')); ?>">Manage properties</a>
        <a class="btn btn-outline-secondary" href="<?php echo e(route('admin.properties.create')); ?>">Add property</a>
    <?php endif; ?>
    <?php if($role === 'buyer'): ?>
        <a class="btn btn-lp" href="<?php echo e(route('properties.index')); ?>">Browse properties</a>
        <a class="btn btn-outline-secondary" href="<?php echo e(route('buyer.requests.create')); ?>">Request a property</a>
    <?php endif; ?>
</div>
<div class="row g-3 mb-4">
    <?php if($role !== 'buyer'): ?>
        <div class="col-sm-6 col-lg-3"><div class="card p-3"><span>Properties</span><strong class="fs-2"><?php echo e($propertyCount); ?></strong></div></div>
    <?php endif; ?>
    <?php if(in_array($role, ['admin','sales','agent'], true) && $enquiries !== null): ?>
        <div class="col-sm-6 col-lg-3"><div class="card p-3"><span>Enquiries</span><strong class="fs-2"><?php echo e($enquiryCount); ?></strong></div></div>
    <?php endif; ?>
    <?php if($leads !== null): ?>
        <div class="col-sm-6 col-lg-3"><div class="card p-3"><span>Leads</span><strong class="fs-2"><?php echo e($leadCount); ?></strong></div></div>
    <?php endif; ?>
    <?php if($viewings !== null): ?>
        <div class="col-sm-6 col-lg-3"><div class="card p-3"><span>Viewings</span><strong class="fs-2"><?php echo e($viewingCount); ?></strong></div></div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if($dashboardTab === 'saved' && $savedProperties !== null): ?> <?php echo $__env->make('dashboard.saved-properties', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
<?php if($dashboardTab === 'requests' && $propertyRequests !== null): ?> <?php echo $__env->make('dashboard.requests.list', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
<?php if($dashboardTab === 'properties' && $role !== 'buyer'): ?>
<section class="card mb-4" id="properties-list">
    <div class="card-header"><h2 class="h5 mb-0"><?php echo e(match($role) { 'seller' => 'My properties', 'agent' => 'My properties', 'verification' => 'Properties for verification', default => 'Properties' }); ?></h2></div>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Property</th><th>Location</th><th>Status</th><th>Action</th></tr></thead><tbody>
        <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr><td><?php echo e($property->title); ?><small class="d-block text-secondary"><?php echo e($property->property_code); ?></small></td><td><?php echo e($property->city); ?>, <?php echo e($property->district); ?></td><td><span class="lp-status <?php echo e($property->status); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $property->status))); ?></span></td><td><a href="<?php echo e(route('dashboard.property', ['role' => $role, 'property' => $property->id])); ?>">View property</a></td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="4" class="text-secondary">No properties to show yet.</td></tr>
        <?php endif; ?>
    </tbody></table></div>
    <div class="card-body"><?php echo e($properties->withQueryString()->links('pagination::bootstrap-5')); ?></div>
</section>
<?php endif; ?>
<?php if(in_array($role, ['admin','sales','agent'], true) && $dashboardTab === 'enquiries' && $enquiries !== null): ?>
<section class="card mb-4" id="enquiries-list">
    <div class="card-header"><h2 class="h5 mb-0">Enquiries</h2></div>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Customer</th><th>Contact</th><th>Message</th><th>Status</th></tr></thead><tbody>
    <?php $__empty_1 = true; $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr><td><?php echo e($enquiry->name); ?></td><td><?php echo e($enquiry->email); ?><br><?php echo e($enquiry->phone); ?></td><td><?php echo e($enquiry->message); ?></td><td><?php echo e(\App\Services\LeadStages::label($enquiry->crmLead?->status ?? $enquiry->status)); ?>

<?php if(in_array($role,['admin','sales','agent'],true) && $enquiry->crmLead): ?>
    <a class="d-block" href="<?php echo e(route('leads.show',['role'=>$role,'lead'=>$enquiry->crmLead->id])); ?>">Open lead</a>
<?php elseif(in_array($role,['admin','sales'],true)): ?>
    <form method="POST" action="<?php echo e(route('leads.convert',['role'=>$role,'enquiry'=>$enquiry->id])); ?>"><?php echo csrf_field(); ?><button class="btn btn-sm btn-outline-secondary" type="submit">Create lead</button></form>
<?php endif; ?>
</td></tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="4" class="text-secondary">No enquiries yet.</td></tr>
    <?php endif; ?>
    </tbody></table></div>
    <div class="card-body"><?php echo e($enquiries->withQueryString()->links('pagination::bootstrap-5')); ?></div>
</section>
<?php endif; ?>
<?php if($dashboardTab === 'leads' && $leads !== null): ?>
<section class="card mb-4" id="lead-list">
    <div class="card-header"><h2 class="h5 mb-0"><?php echo e($role === 'agent' ? 'Assigned leads' : 'Leads'); ?></h2></div>
    <form method="GET" class="card-body row g-2 align-items-end"><input type="hidden" name="tab" value="leads">
        <div class="col-md-4"><label class="form-label" for="lead-status-filter">Stage</label><select class="form-select" name="lead_status" id="lead-status-filter"><option value="">All stages</option><?php $__currentLoopData = \App\Services\LeadStages::LABELS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>" <?php if(($leadFilters['lead_status'] ?? '') === $key): echo 'selected'; endif; ?>><?php echo e($label); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
        <div class="col-md-4"><label class="form-label" for="lead-queue">Work queue</label><select class="form-select" name="lead_queue" id="lead-queue"><option value="">All leads</option><?php $__currentLoopData = ['due'=>'Due now','today'=>'Due today','hot'=>'Hot leads','unassigned'=>'Unassigned']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>" <?php if(($leadFilters['lead_queue'] ?? '') === $key): echo 'selected'; endif; ?>><?php echo e($label); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
        <div class="col-md-4"><button class="btn btn-lp" type="submit">Filter leads</button> <a href="<?php echo e(route('dashboard.role',['role'=>$role,'tab'=>'leads'])); ?>">Clear</a></div>
    </form>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Lead</th><th>Status</th><th>Follow-up</th><th>Notes</th></tr></thead><tbody>
    <?php $__empty_1 = true; $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr><td><a href="<?php echo e(route('leads.show', ['role'=>$role,'lead'=>$lead->id])); ?>">Open lead #<?php echo e($lead->id); ?></a><small class="d-block"><?php echo e($lead->property?->title ?? ($lead->property_request_id ? 'Property request #'.$lead->property_request_id : ($lead->buyer_service_request_id ? 'Service request #'.$lead->buyer_service_request_id : 'Property unavailable'))); ?></small><small class="d-block"><?php echo e($lead->enquiry?->name ?? $lead->propertyRequest?->customer?->name ?? $lead->buyerServiceRequest?->customer?->name); ?> · <?php echo e($lead->assignee?->name ?? 'Unassigned'); ?></small><?php if($lead->buyerServiceRequest): ?><small class="d-block"><?php echo e(\App\Models\BuyerServiceRequest::TYPES[$lead->buyerServiceRequest->type]); ?></small><?php endif; ?></td><td><?php echo e(\App\Services\LeadStages::label($lead->status)); ?></td><td><?php echo e($lead->follow_up_at?->copy()->timezone('Asia/Colombo')->format('d M Y h:i A') ?? 'Not scheduled'); ?></td><td><?php echo e($lead->notes); ?></td></tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="4" class="text-secondary">No leads to show yet.</td></tr>
    <?php endif; ?>
    </tbody></table></div>
    <div class="card-body"><?php echo e($leads->withQueryString()->links('pagination::bootstrap-5')); ?></div>
</section>
<?php endif; ?>
<?php if($dashboardTab === 'viewings' && $viewings !== null): ?>
<section class="card mb-4" id="viewings-list">
    <div class="card-header"><h2 class="h5 mb-0"><?php echo e($role === 'buyer' ? 'My viewings' : 'Viewings'); ?></h2></div>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Property reference</th><th>Scheduled time</th><?php if(in_array($role, ['admin', 'sales'], true)): ?><th>Assigned employee</th><?php endif; ?><th>Status</th></tr></thead><tbody>
    <?php $__empty_1 = true; $__currentLoopData = $viewings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr><td>#<?php echo e($viewing->property_id); ?></td><td><?php echo e($viewing->scheduled_at?->copy()->timezone('Asia/Colombo')->format('d M Y h:i A')); ?></td><?php if(in_array($role, ['admin', 'sales'], true)): ?><td><?php echo e($viewing->assignee?->name ?? 'Unassigned'); ?></td><?php endif; ?><td><?php echo e($viewing->status); ?></td></tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="<?php echo e(in_array($role, ['admin', 'sales'], true) ? 4 : 3); ?>" class="text-secondary">No viewings scheduled yet.</td></tr>
    <?php endif; ?>
    </tbody></table></div>
    <div class="card-body"><?php echo e($viewings->withQueryString()->links('pagination::bootstrap-5')); ?></div>
</section>
<?php endif; ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/index.blade.php ENDPATH**/ ?>