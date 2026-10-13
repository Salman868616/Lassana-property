<?php if(auth()->guard()->check()): ?>
    <?php $__currentLoopData = ['seller' => 'list a property', 'buyer' => 'request a property']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requiredRole => $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!auth()->user()->hasRole($requiredRole)): ?>
            <div class="modal fade" id="<?php echo e($requiredRole); ?>-account-required" tabindex="-1" aria-labelledby="<?php echo e($requiredRole); ?>-account-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="<?php echo e($requiredRole); ?>-account-title">Use a <?php echo e($requiredRole); ?> account</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo e(__('Close')); ?>"></button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo e(__('You are signed in as')); ?> <strong><?php echo e(auth()->user()->name); ?></strong>. This account does not have <?php echo e($requiredRole); ?> access.</p>
                            <p>To <?php echo e($action); ?>, sign out and sign in with your <?php echo e($requiredRole); ?> account. You can manage your account access from My profile.</p>
                            <p class="small text-body-secondary mb-0"><?php echo e(__('You can continue browsing properties with your current account.')); ?></p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-outline-secondary" href="<?php echo e(route('account-profile')); ?>"><?php echo e(__('My profile')); ?></a>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Sign out to switch accounts')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/home/property-account-prompts.blade.php ENDPATH**/ ?>