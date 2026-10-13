<style>
        footer.lp-site-footer {background:#fbf7f3!important;border-top:1px solid #eadcde!important;padding:40px 0 24px!important}
        footer.lp-site-footer h2 {color:#8B1E24;margin-bottom:16px}
        footer.lp-site-footer a {color:#8B1E24;text-decoration:none}
        footer.lp-site-footer a:hover {text-decoration:underline}
        footer.lp-site-footer a:focus-visible {outline:3px solid #C89B3C;outline-offset:4px}
        footer.lp-site-footer address {line-height:1.7;max-width:440px}
@media(max-width:767.98px) {            footer.lp-site-footer {padding-top:28px!important}}
@media(max-width:767.98px) {            footer.lp-site-footer .row > div:first-child {display:flex;align-items:center;gap:18px}}
@media(max-width:767.98px) {            footer.lp-site-footer .row > div:first-child img {width:80px;height:88px}}
@media(max-width:767.98px) {            footer.lp-site-footer .row > div:first-child p {margin-top:0!important}}
        footer.lp-site-footer a:not(:has(img)) {display:inline-block;max-width:100%;transition:transform .3s ease,color .3s ease}
        footer.lp-site-footer a:not(:has(img)):is(:hover,:focus-visible) {transform:translateX(6px);color:#5A1015}
        footer.lp-site-footer a:not(:has(img)):active {transform:translateX(3px) scale(.98)}
@media(prefers-reduced-motion:reduce) {            footer.lp-site-footer a:not(:has(img)) {transition:none}}
@media(prefers-reduced-motion:reduce) {            footer.lp-site-footer a:not(:has(img)):is(:hover,:focus-visible,:active) {transform:none}}
</style>
<footer class="footer lp-site-footer bg-body border-top py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4"><a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('assets/img/lassana-property-logo-lossless.webp')); ?>" width="110" height="120" style="object-fit:contain;background:white;border-radius:8px" alt="Lassana Property"></a><p class="text-body-secondary mt-3 mb-0"><?php echo e(__('Find. Verify. Build. Own.')); ?></p></div>
            <div class="col-sm-5 col-md-3"><h2 class="h6"><?php echo e(__('Explore')); ?></h2><ul class="list-unstyled d-grid gap-2 mb-0"><li><a href="<?php echo e(route('properties.index')); ?>"><?php echo e(__('Properties')); ?></a></li><li><a href="<?php echo e(route('about-us')); ?>"><?php echo e(__('About us')); ?></a></li><li><a href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Contact us')); ?></a></li><li><a href="<?php echo e(route('services.index')); ?>"><?php echo e(__('Services')); ?></a></li><li><a href="<?php echo e(route('faqs')); ?>"><?php echo e(__('FAQs')); ?></a></li><li><a href="<?php echo e(route('agents.index')); ?>"><?php echo e(__('Agents')); ?></a> · <a href="<?php echo e(route('developers.index')); ?>"><?php echo e(__('Developers')); ?></a></li></ul></div>
            <div class="col-sm-7 col-md-5"><h2 class="h6"><?php echo e(__('Get in touch')); ?></h2><address class="text-body-secondary mb-3"><?php echo e(config('company.address')); ?></address><p class="mb-2"><a href="tel:<?php echo e(config('company.phone_uri')); ?>"><?php echo e(config('company.phone')); ?></a></p><a class="text-break" href="mailto:<?php echo e(config('company.email')); ?>"><?php echo e(config('company.email')); ?></a></div>
        </div>
        <nav aria-label="<?php echo e(__('Legal information')); ?>" class="d-flex flex-wrap gap-3 mt-4">
            <a href="<?php echo e(route('terms-and-conditions')); ?>"><?php echo e(__('Terms and conditions')); ?></a><a href="<?php echo e(route('privacy-policy')); ?>"><?php echo e(__('Privacy policy')); ?></a><a href="<?php echo e(route('disclaimer')); ?>"><?php echo e(__('Disclaimer')); ?></a>
        </nav>
        <p class="small text-body-secondary mt-3 mb-0"><?php echo e(__('Available in English, Sinhala and Tamil.')); ?></p>
        <?php if(config('company.facebook')): ?>
        <div class="d-flex flex-wrap gap-3 mt-3" aria-label="<?php echo e(__('Social links')); ?>">
            <a href="<?php echo e(config('company.facebook')); ?>" target="_blank" rel="noopener noreferrer">Facebook</a>
        </div>
        <?php endif; ?>
        <div class="border-top mt-4 pt-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 text-body-secondary small">
            <span>&copy; <?php echo e(date('Y')); ?> Lassana Property. <?php echo e(__('All rights reserved.')); ?></span>
            <span><?php echo e(__('Developed by')); ?> <span style="color: #8B1E24">Keen Rabbits (Pvt) Ltd</span></span>
        </div>
    </div>
</footer>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/layouts/partials/footer/real-estate-footer.blade.php ENDPATH**/ ?>