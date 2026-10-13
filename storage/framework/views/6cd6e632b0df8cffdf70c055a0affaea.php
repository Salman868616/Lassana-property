
<?php $__env->startSection('title', 'Verify email | Lassana Property'); ?>
<?php $__env->startPush('styles'); ?>
<style>
.lp-email-verify {max-width:480px;margin:40px auto;padding:24px}
.lp-email-verify .btn-primary {background:#8b1e24;border-color:#8b1e24}
.lp-email-verify a {color:#8b1e24}
.lp-email-code {letter-spacing:.4em;font-size:24px;text-align:center}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<main class="lp-email-verify">
    <img src="<?php echo e(asset('assets/img/lassana-property-logo.png')); ?>" width="100" height="90" style="object-fit:contain" alt="Lassana Property">
    <h1 class="h3 mt-4">Verify your email</h1>
    <?php if(config('sms.enabled')): ?><p class="small text-body-secondary">Verify your email first, then confirm your mobile with an SMS code.</p><?php endif; ?>
    <p><?php echo e($codePending ? 'Enter the six-digit code sent to' : 'Request a verification code for'); ?> <strong class="text-break"><?php echo e($user->email); ?></strong>.</p>
    <?php if(session('status')): ?><div class="alert alert-success" role="status"><?php echo e(session('status')); ?></div><?php endif; ?>
    <?php if($errors->any()): ?><div class="alert alert-danger" role="alert"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><p class="mb-1"><?php echo e($error); ?></p><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div><?php endif; ?>
    <form method="POST" action="<?php echo e(route('verification.verify')); ?>">
        <?php echo csrf_field(); ?>
        <label for="verification-code" class="form-label">Verification code</label>
        <input id="verification-code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code" pattern="[0-9]{6}" minlength="6" maxlength="6" class="form-control lp-email-code mb-2" aria-describedby="code-help" required autofocus>
        <p id="code-help" class="small text-body-secondary">Codes expire after 10 minutes.</p>
        <button class="btn btn-primary w-100" type="submit">Verify email</button>
    </form>
    <form method="POST" action="<?php echo e(route('verification.send')); ?>" class="mt-3">
        <?php echo csrf_field(); ?>
        <button class="btn btn-outline-secondary w-100" type="submit"><?php echo e($codePending ? 'Send a new code' : 'Send verification code'); ?></button>
    </form>
    <?php if(!session()->has('login_otp_challenge')): ?>
    <details class="mt-4" <?php if($errors->has('email') || $errors->has('current_password')): ?> open <?php endif; ?>>
        <summary>Correct email address</summary>
        <form method="POST" action="<?php echo e(route('verification.email')); ?>" class="mt-3">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <label for="corrected-email" class="form-label">Email address</label>
            <input id="corrected-email" name="email" type="email" value="<?php echo e(old('email', $user->email)); ?>" maxlength="255" autocomplete="email" class="form-control mb-3" required>
            <label for="verification-password" class="form-label">Current password</label>
            <input id="verification-password" name="current_password" type="password" autocomplete="current-password" class="form-control mb-3" required>
            <button type="submit" class="btn btn-outline-secondary w-100">Save email address</button>
        </form>
    </details>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-3 text-center"><?php echo csrf_field(); ?><button class="btn btn-link" type="submit">Log out</button></form>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/account/auth/verify-email.blade.php ENDPATH**/ ?>