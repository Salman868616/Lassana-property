<?php if(session('saved_message')): ?><div class="alert alert-success" role="status"><?php echo e(session('saved_message')); ?></div><?php endif; ?>
<div class="mb-4">
<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->hasRole('buyer')): ?>
        <div class="d-flex flex-wrap align-items-center gap-3">
            <form method="POST" action="<?php echo e(route($saved ? 'buyer.saved.destroy' : 'buyer.saved.store',$property->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php if($saved): ?> <?php echo method_field('DELETE'); ?> <?php endif; ?>
                <button class="btn btn-outline-primary" type="submit"><i class="fi-heart me-2" aria-hidden="true"></i><?php echo e(__($saved ? 'Remove from saved' : 'Save property')); ?></button>
            </form>
            <?php if($saved): ?><span><?php echo e(__('Saved')); ?></span><?php endif; ?>
            <a href="<?php echo e(route('dashboard.role',['role'=>'buyer','tab'=>'saved'])); ?>">My saved properties</a>
        </div>
    <?php else: ?>
        <p class="small text-body-secondary">Saving properties is available with buyer access.</p>
    <?php endif; ?>
<?php else: ?>
    <a class="btn btn-outline-primary" href="<?php echo e(route('account-signin')); ?>">Sign in to save properties</a>
<?php endif; ?>
</div>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/save-button.blade.php ENDPATH**/ ?>