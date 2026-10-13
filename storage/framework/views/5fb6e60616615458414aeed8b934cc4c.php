<!-- Navigation bar (Page header) -->
<header class="lassana-navbar navbar navbar-expand-xxl bg-body navbar-sticky sticky-top z-fixed px-0" data-sticky-element>
    
    <style>
    .lassana-navbar .lassana-add-property {
        color: #8B1E24;
        background-color: #FFFFFF;
        border: 1px solid #8B1E24;
    }
    .lassana-navbar .lassana-add-property:hover,
    .lassana-navbar .lassana-add-property:active {
        color: #FFFFFF;
        background-color: #8B1E24;
        border-color: #8B1E24;
    }
    .lassana-navbar .lassana-add-property:focus-visible {
        color: #FFFFFF;
        background-color: #8B1E24;
        outline: 3px solid #C89B3C;
        outline-offset: 3px;
        box-shadow: none;
    }
    .lassana-navbar .lassana-account-button {
        width: 44px;
        height: 44px;
        padding: 0;
        color: #8B1E24;
        background-color: #FBF7F0;
        border: 1px solid #E4D7C4;
    }
    .lassana-navbar .lassana-account-button:hover {
        color: #5A1015;
        background-color: #F4EBDC;
        border-color: #C89B3C;
    }
    .lassana-navbar .lassana-account-button:focus-visible {
        outline: 3px solid #C89B3C;
        outline-offset: 3px;
        box-shadow: none;
    }
    .lassana-navbar .lassana-nav-logo {
        width: 120px;
        height: 120px;
        object-fit: contain;
    }
    @media (max-width: 1399.98px) {
        .lassana-navbar .lassana-nav-logo {
            width: 90px;
            height: 90px;
        }
    }
    .lassana-navbar .nav-link {
        color: #8B1E24 !important;
        white-space: nowrap;
    }

    .lassana-navbar .nav-link:hover,
    .lassana-navbar .nav-link.active {
        color: #FFFFFF !important;
        background-color: #8B1E24 !important;
    }

    .lassana-navbar .btn-primary {
        background-color: #8B1E24 !important;
        border-color: #8B1E24 !important;
    }

    .lassana-navbar .btn-primary:hover {
        background-color: #5A1015 !important;
        border-color: #5A1015 !important;
    }
    .lassana-navbar .navbar-nav {
    gap: 8px;
}

.lassana-navbar .nav-link {
    border-radius: 8px;
}

.lassana-navbar .btn-outline-primary {
    color: #8B1E24 !important;
    border-color: #8B1E24 !important;
}

.lassana-navbar .btn-outline-primary:hover {
    color: #FFFFFF !important;
    background-color: #8B1E24 !important;
    border-color: #8B1E24 !important;
}

@media (min-width: 1400px) and (max-width: 1599.98px) {
    .lassana-navbar > .container { column-gap: 8px; }
    .lassana-navbar .lassana-nav-logo { width: 90px; height: 90px; }
    .lassana-navbar .navbar-nav { gap: 4px; }
    .lassana-navbar .nav-link { padding-inline: 10px; font-size: .875rem; }
    .lassana-navbar .lassana-add-property { padding-inline: 12px; font-size: .875rem; white-space: nowrap; }
}

.lassana-navbar .lp-short-menu {width:18.5rem;max-width:calc(100vw - 32px);padding:8px;border:1px solid #eadcde;border-radius:12px}
.lassana-navbar .lp-short-menu .dropdown-item {display:flex;align-items:center;gap:12px;white-space:normal;min-height:44px;padding:10px 12px;border-radius:7px;color:#4d4545}
.lassana-navbar .lp-short-menu .dropdown-item > span {min-width:0;overflow-wrap:anywhere}
.lassana-navbar .lp-short-menu .dropdown-item:hover,.lassana-navbar .lp-short-menu .dropdown-item:focus,.lassana-navbar .lp-short-menu .dropdown-item[aria-current="page"] {background:#fbf7f3;color:#8b1e24}
.lassana-navbar .lp-short-menu .dropdown-item:focus-visible {outline:2px solid #c89b3c;outline-offset:-2px}
.lassana-navbar .lp-menu-icon {flex:0 0 18px;color:#8b1e24}
.lassana-navbar .lp-short-menu .lp-menu-all {justify-content:space-between;color:#8b1e24}
.lassana-navbar .lp-short-menu .dropdown-divider {margin:6px 4px;border-color:#eadcde}
@media(max-width:1399.98px) {.lassana-navbar .lp-short-menu {max-width:100%}}

/* Allow longer Tamil labels to wrap without squeezing the company logo. */
@media (min-width: 1400px) {
    html[lang="ta"] .lassana-navbar .navbar-brand { flex-shrink: 0; }
    html[lang="ta"] .lassana-navbar #navbarNav { min-width: 0; }
    html[lang="ta"] .lassana-navbar .navbar-nav { flex-wrap: wrap; justify-content: center; gap: 4px; }
    html[lang="ta"] .lassana-navbar .nav-link { white-space: normal; padding-inline: 10px; }
}

/* Keep language selection beside the account controls on desktop and labelled in the mobile menu. */
.lassana-navbar .lp-language-switcher {margin:0}
.lassana-navbar .lp-language-switcher label {display:none}
.lassana-navbar .lp-language-control {position:relative}
.lassana-navbar .lp-language-control > .fi-globe {position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#8B1E24;pointer-events:none}
.lassana-navbar #public-language {width:132px;min-height:40px;padding-left:36px}
.lassana-navbar .lp-language-switcher noscript .btn {margin-top:8px}
.lassana-navbar .lp-auth-entry {white-space:nowrap}
@media(max-width:575.98px) {
    .lassana-navbar .lp-auth-entry {max-width:calc(100vw - 184px);padding-inline:12px;white-space:normal}
}
@media(max-width:1399.98px) {
    .lassana-navbar .lp-language-item {margin-top:12px;padding-top:16px;border-top:1px solid var(--fn-border-color,#dee2e6)}
    .lassana-navbar .lp-language-switcher {width:100%}
    .lassana-navbar .lp-language-switcher label {display:block}
    .lassana-navbar #public-language {width:100%;min-height:44px}
}

</style>
  <div class="container">

        <!-- Mobile offcanvas menu toggler (Hamburger) -->
        <button type="button" class="navbar-toggler me-3 me-xxl-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar brand (Logo) -->
        <a class="navbar-brand py-1 me-3" href="<?php echo e(url('/')); ?>">
         <img
        src="<?php echo e(asset('assets/img/lassana-property-logo-lossless.webp')); ?>"
        alt="Lassana Property"
        width="120"
        height="120"
        class="lassana-nav-logo" >
        </a>


        <!-- Main navigation that turns into offcanvas on screens < 1400px wide (lg breakpoint) -->
        <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
            <div class="offcanvas-header py-3">
                <h5 class="offcanvas-title" id="navbarNavLabel"><?php echo e(__('Browse Lassana Property')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php echo e(__('Close')); ?>"></button>
            </div>
            <div class="offcanvas-body pt-2 pb-4 py-xxl-0 mx-xxl-auto">
                <ul class="navbar-nav position-relative">
                    <li class="nav-item py-xxl-2 me-xxl-n1 me-xl-0">
                        <a class="nav-link <?php echo e(request()->routeIs('index', 'home-real-estate') ? 'active' : ''); ?>" href="<?php echo e(route('index')); ?>" <?php if(request()->routeIs('index', 'home-real-estate')): ?> aria-current="page" <?php endif; ?>><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="nav-item dropdown py-xxl-2 me-xxl-n1 me-xl-0">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs('properties.*') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic"  aria-expanded="false"><?php echo e(__('Properties')); ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('properties.all')); ?>"><?php echo e(__('Browse all properties')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('properties.index')); ?>"><?php echo e(__('Buy property')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('properties.land')); ?>"><?php echo e(__('Land for sale')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('properties.houses')); ?>"><?php echo e(__('Houses for sale')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('properties.apartments-villas')); ?>"><?php echo e(__('Apartments & villas')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('properties.commercial')); ?>"><?php echo e(__('Commercial properties')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('properties.rent')); ?>"><?php echo e(__('Properties for rent')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('properties.verified')); ?>"><?php echo e(__('Verified properties')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('agents.index')); ?>"><?php echo e(__('Agents')); ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('developers.index')); ?>"><?php echo e(__('Developers')); ?></a></li>
                        </ul>
                    </li>
                    <li class="nav-item py-xxl-2 me-xxl-n1 me-xl-0">
                        <a class="nav-link <?php echo e(request()->routeIs('verification-ranks') ? 'active' : ''); ?>" href="<?php echo e(route('verification-ranks')); ?>" <?php if(request()->routeIs('verification-ranks')): ?> aria-current="page" <?php endif; ?>><?php echo e(__('Verification')); ?></a>
                    </li>
                    <li class="nav-item dropdown py-xxl-2 me-xxl-n1 me-xl-0">
                        <a id="services-menu-toggle" class="nav-link dropdown-toggle <?php echo e(request()->routeIs('services.*') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown" aria-controls="services-menu" aria-expanded="false"><?php echo e(__('Services')); ?></a>
                        <ul id="services-menu" class="dropdown-menu lp-short-menu" aria-labelledby="services-menu-toggle">
                            <?php $__currentLoopData = [
                                ['property-verification', 'Property verification', 'fi-check-shield'],
                                ['property-inspection', 'Property inspection', 'fi-file-text'],
                                ['build-your-home', 'Build your home / LGC', 'fi-tool'],
                                ['overseas-property', 'Overseas buyer support', 'fi-globe'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$menuPage, $menuLabel, $menuIcon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item" href="<?php echo e(route('services.show', ['page'=>$menuPage])); ?>" <?php if(request()->routeIs('services.show') && request()->route('page') === $menuPage): ?> aria-current="page" <?php endif; ?>><i class="<?php echo e($menuIcon); ?> lp-menu-icon" aria-hidden="true"></i><span><?php echo e(__($menuLabel)); ?></span></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item lp-menu-all" href="<?php echo e(route('services.index')); ?>" <?php if(request()->routeIs('services.index')): ?> aria-current="page" <?php endif; ?>><span><?php echo e(__('View all services')); ?></span><i class="fi-arrow-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </li>
                    <li class="nav-item py-xxl-2 me-xxl-n1 me-xl-0">
                        <a class="nav-link <?php echo e(request()->routeIs('about-us') ? 'active' : ''); ?>" href="<?php echo e(route('about-us')); ?>" <?php if(request()->routeIs('about-us')): ?> aria-current="page" <?php endif; ?>><?php echo e(__('About us')); ?></a>
                    </li>
                    <li class="nav-item py-xxl-2 me-xxl-n1 me-xl-0">
                        <a class="nav-link <?php echo e(request()->routeIs('faqs') ? 'active' : ''); ?>" href="<?php echo e(route('faqs')); ?>" <?php if(request()->routeIs('faqs')): ?> aria-current="page" <?php endif; ?>><?php echo e(__('FAQs')); ?></a>
                    </li>
                    <li class="nav-item py-xxl-2 me-xxl-n1 me-xl-0">
                        <a class="nav-link <?php echo e(request()->routeIs('contact-us') ? 'active' : ''); ?>" href="<?php echo e(route('contact-us')); ?>" <?php if(request()->routeIs('contact-us')): ?> aria-current="page" <?php endif; ?>><?php echo e(__('Contact us')); ?></a>
                    </li>
                    
                    <li class="nav-item d-flex align-items-center py-xxl-2 ms-xxl-2">
            <!-- Add property button -->
            <?php if(auth()->check() && !auth()->user()->hasRole('admin') && !auth()->user()->hasRole('seller') && !auth()->user()->hasRole('agent')): ?>
                <button type="button" class="btn lassana-add-property animate-scale" data-bs-toggle="modal" data-bs-target="#seller-account-required">
                    <i class="fi-plus fs-lg animate-target ms-n2 me-1 me-sm-2" aria-hidden="true"></i>
                    <?php echo e(__('Add property')); ?>

                </button>
            <?php else: ?>
                <a class="btn lassana-add-property animate-scale" href="<?php echo e(auth()->check() ? (auth()->user()->hasRole('admin') ? route('admin.properties.create') : (auth()->user()->hasRole('seller') ? route('seller.properties.create') : route('agent.properties.create'))) : route('account-signin')); ?>">
                    <i class="fi-plus fs-lg animate-target ms-n2 me-1 me-sm-2" aria-hidden="true"></i>
                    <?php echo e(__('Add property')); ?>

                </a>
            <?php endif; ?>
                    </li>
                    <li class="nav-item lp-language-item d-flex align-items-center py-xxl-2 ms-xxl-2">
                        <form method="POST" action="<?php echo e(route('language.update')); ?>" class="lp-language-switcher">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="return_path" value="<?php echo e(request()->getRequestUri()); ?>">
                            <label class="form-label mb-2" for="public-language"><?php echo e(__('Language')); ?></label>
                            <div class="lp-language-control">
                                <i class="fi-globe" aria-hidden="true"></i>
                                <select name="locale" id="public-language" aria-label="<?php echo e(__('Language')); ?>" aria-describedby="public-language-help" data-auto-language class="form-select form-select-sm">
                                    <option value="en" lang="en" <?php if(app()->getLocale()==='en'): echo 'selected'; endif; ?>>English</option>
                                    <option value="si" lang="si" <?php if(app()->getLocale()==='si'): echo 'selected'; endif; ?>>සිංහල</option>
                                    <option value="ta" lang="ta" <?php if(app()->getLocale()==='ta'): echo 'selected'; endif; ?>>தமிழ்</option>
                                </select>
                            </div>
                            <span id="public-language-help" class="visually-hidden"><?php echo e(__('Selecting a language reloads this page.')); ?></span>
                            <noscript><button class="btn btn-sm btn-outline-primary" type="submit"><?php echo e(__('Change language')); ?></button></noscript>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Button group -->
        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 ms-auto">

            <!-- Account button -->
            <?php if(auth()->guard()->check()): ?>
            <a class="btn btn-icon lassana-account-button fs-lg rounded-circle flex-shrink-0" href="<?php echo e(route('account-profile')); ?>" aria-label="<?php echo e(__('My account')); ?>" title="My account">
                <i class="fi-user animate-target" aria-hidden="true"></i>
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="m-0">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-primary text-nowrap"><?php echo e(__('Log out')); ?></button>
            </form>
            <?php else: ?>
            <a class="btn btn-outline-primary lp-auth-entry" href="<?php echo e(route('account-signup')); ?>"><?php echo e(__('Register / Sign in')); ?></a>
            <?php endif; ?>

        </div>
    </div>
</header>

<?php echo $__env->make('home.property-account-prompts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php if (! $__env->hasRenderedOnce('26ffcff2-8b94-4ed0-a8ed-6a6b760e7529')): $__env->markAsRenderedOnce('26ffcff2-8b94-4ed0-a8ed-6a6b760e7529'); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/public-language.js')); ?>" defer></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/layouts/partials/header/real-estate-header.blade.php ENDPATH**/ ?>