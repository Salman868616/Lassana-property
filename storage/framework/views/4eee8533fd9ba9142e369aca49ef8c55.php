<?php $__env->startSection('title', 'Verify mobile | Lassana Property'); ?>
<?php $__env->startPush('styles'); ?>
<style>
.lp-phone-verify {max-width:480px;margin:40px auto;padding:24px}
.lp-phone-verify .btn-primary {background:#8b1e24;border-color:#8b1e24}
.lp-phone-verify a {color:#8b1e24}
.lp-phone-code {letter-spacing:.4em;font-size:24px;text-align:center}
.lp-phone-verify .alert {font-size:.875rem;padding:12px 16px}
@media(max-width:575px){.lp-phone-verify {margin:16px auto;padding:20px}}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<main class="lp-phone-verify">
    <img src="<?php echo e(asset('assets/img/lassana-property-logo.png')); ?>" width="100" height="90" style="object-fit:contain" alt="Lassana Property">
    <h1 class="h3 mt-4"><?php echo e($user->hasVerifiedPhone() ? 'Confirm your sign-in' : 'Verify your mobile'); ?></h1>
    <p><?php echo e($codePending ? 'Enter the six-digit SMS code sent to' : 'Request an SMS verification code for'); ?> <strong><?php echo e(\App\Support\SriLankaMobile::masked($user->phone)); ?></strong>.</p>
    <?php if(!$user->hasVerifiedPhone()): ?><p class="small text-body-secondary">Your email is verified. Confirm a mobile number you can access. We will send an SMS code each time you sign in.</p><?php endif; ?>
    <?php if(session('status')): ?><div class="alert alert-success" role="status"><?php echo e(session('status')); ?></div><?php endif; ?>
    <?php if($errors->any()): ?><div class="alert alert-danger" role="alert"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><p class="mb-1"><?php echo e($error); ?></p><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div><?php endif; ?>
    <?php if($codePending || $user->hasVerifiedPhone()): ?>
    <form method="POST" action="<?php echo e(route('phone-verification.verify')); ?>">
        <?php echo csrf_field(); ?>
        <label for="sms-code" class="form-label">SMS verification code</label>
        <input id="sms-code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code" pattern="[0-9]{6}" minlength="6" maxlength="6" class="form-control lp-phone-code mb-2" aria-describedby="sms-code-help" required autofocus>
        <p id="sms-code-help" class="small text-body-secondary">Codes expire after 10 minutes. Use only the most recent code.</p>
        <button class="btn btn-primary w-100" type="submit">Verify and continue</button>
    </form>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('phone-verification.send')); ?>" class="mt-4">
        <?php echo csrf_field(); ?>
        <?php if(!$user->hasVerifiedPhone()): ?>
        <label for="verification-phone" class="form-label">Mobile number</label>
        <input id="verification-phone" name="phone" type="tel" autocomplete="tel" value="<?php echo e(old('phone', $user->phone)); ?>" maxlength="30" class="form-control mb-2" aria-describedby="sms-phone-help" required>
        <p id="sms-phone-help" class="small text-body-secondary">Use your real Sri Lankan mobile number, for example 0771234567.</p>
        <?php endif; ?>
        <button class="btn btn-outline-secondary w-100" type="submit"><?php echo e($codePending ? 'Send a new SMS code' : 'Send SMS code'); ?></button>
        <p class="small text-body-secondary mt-2">Please wait one minute between requests.</p>
    </form>
    <?php if($user->hasVerifiedPhone()): ?>
    <p class="small text-body-secondary mt-4">Cannot access this number? Contact Lassana Property support for help recovering your account.</p>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-3 text-center"><?php echo csrf_field(); ?><button class="btn btn-link" type="submit">Log out</button></form>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/account/auth/verify-phone.blade.php ENDPATH**/ ?>