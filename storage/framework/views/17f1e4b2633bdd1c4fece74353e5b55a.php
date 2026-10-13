
<?php $__env->startSection('content'); ?>
<a class="btn btn-lp mb-4" href="<?php echo e(route('admin.testimonials.create')); ?>">Add Testimonial</a>
<p>Use genuine customer feedback with permission to display the quote and name. Drafts stay off the homepage.</p>
<div class="card p-4"><div class="table-responsive"><table class="table"><thead><tr><th>Customer</th><th>Context</th><th>Visibility</th><th>Action</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><?php echo e($testimonial->customer_name); ?></td><td><?php echo e($testimonial->context); ?></td><td><?php echo e($testimonial->is_published && $testimonial->consent_confirmed ? 'Published' : 'Draft'); ?></td><td><a href="<?php echo e(route('admin.testimonials.edit',$testimonial)); ?>">Edit Testimonial</a></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="4">No approved customer quotes have been added. The homepage testimonial section stays hidden.</td></tr><?php endif; ?>
</tbody></table></div><?php echo e($testimonials->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/admin/testimonials/index.blade.php ENDPATH**/ ?>