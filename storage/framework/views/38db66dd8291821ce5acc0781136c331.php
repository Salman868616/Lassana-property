<?php if($property->video_path || $property->video_url || (isset($role) && in_array($role, ['admin','seller','agent'], true) && $property->status === 'draft')): ?>
<section class="card p-4 my-4">
    <h2 class="h5"><?php echo e(__('Property videos')); ?></h2>
    <?php if($property->video_path): ?>
        <video class="w-100 rounded mb-3" style="max-height:480px" controls preload="metadata" playsinline aria-label="Video of <?php echo e($property->title); ?>">
            <source src="<?php echo e(route('property-videos.show', $property->id)); ?>">
            Your browser does not support video playback.
        </video>
    <?php endif; ?>
    <?php if($property->video_url): ?>
        <p><a href="<?php echo e($property->video_url); ?>" target="_blank" rel="noopener noreferrer">Watch property video on YouTube / Vimeo</a></p>
    <?php endif; ?>
    <?php if(isset($role) && in_array($role, ['admin','seller','agent'], true) && $property->status === 'draft'): ?>
        <a class="btn btn-outline-secondary align-self-start" href="<?php echo e($role === 'admin' ? route('admin.properties.edit', $property) : route($role.'.properties.edit', $property->id)); ?>">Edit property media</a>
    <?php endif; ?>
</section>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/videos.blade.php ENDPATH**/ ?>