<?php $type = 'real-estate'; ?>


<?php $__env->startSection('title', \App\Services\PageSeo::forRequest(request())['title']); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet"
          href="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.css')); ?>">
    <style>
        .lp-page-dot { display:inline-flex; width:32px; height:32px; align-items:center; justify-content:center; border-radius:50%; }
        .lp-page-dot::before { content:''; width:11px; height:11px; border-radius:50%; background:#B8ADA3; }
        .lp-page-dot[aria-current="page"]::before { background:#8B1E24; width:14px; height:14px; }
        .lp-page-dot:focus-visible { outline:2px solid #8B1E24; outline-offset:2px; }

        .lassana-navbar .lassana-nav-logo {width:84px;height:84px}
        .lp-property-heading {flex-wrap:wrap;display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:18px}
        .lp-filter-bar {position:relative;display:grid;grid-template-columns:minmax(140px,1fr) minmax(280px,2fr) minmax(170px,1fr) auto auto;gap:12px;align-items:start;margin-bottom:24px;z-index:5}
        .lp-filter-bar > * {min-width:0}
        .lp-filter-bar .form-select,.lp-filter-bar > .btn,.lp-more-filters > summary {min-height:46px}
        .property-search-locations > .row {display:grid;grid-template-columns:1fr 1fr;gap:12px;margin:0!important}
        .property-search-locations > .row > div {width:auto;padding:0;margin:0;min-width:0}
        .property-search-locations label {position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
        .lp-more-filters > summary {list-style:none;display:flex;align-items:center;justify-content:center;gap:8px;background:#8B1E24;color:white;border:1px solid #8B1E24;border-radius:8px;padding:10px 16px;cursor:pointer;white-space:nowrap}
        .lp-more-filters > summary::-webkit-details-marker {display:none}
        .lp-more-filters > summary:hover,.lp-more-filters[open] > summary {background:#5A1015}
        .lp-more-filters > summary:focus-visible {outline:3px solid #C89B3C;outline-offset:3px}
        .lp-filter-panel {position:absolute;top:calc(100% + 10px);left:0;right:0;background:white;border:1px solid #e1e4e9;border-radius:12px;padding:24px;box-shadow:0 16px 40px #17284426;max-height:65vh;overflow:auto}
        .lp-filter-panel [hidden] {display:none!important}
        .lp-filter-bar > .btn.lp-search-submit {color:#8B1E24;border-color:#8B1E24}
        .lp-filter-bar > .btn.lp-search-submit:hover {background:#fff1f2;color:#8B1E24}
        .lp-property-results .card {border-radius:12px;overflow:hidden}
        .lp-property-results .card-body {overflow-wrap:anywhere}
        .lp-property-results .h5 {color:#8B1E24}
        @media(max-width:1199.98px) {
            .lp-filter-bar {grid-template-columns:1fr 1fr auto auto;gap:10px}
            .lp-filter-type {grid-column:1 / 3}
            .property-search-locations {grid-column:3 / 5}
            .lp-filter-sort {grid-column:1 / 3}
            .lp-more-filters {grid-column:3}
            .lp-filter-bar > .lp-search-submit {grid-column:4}
        }
        @media(max-width:575.98px) {
            .lp-property-heading {align-items:baseline}.lp-property-heading .fs-sm {text-align:right;font-size:12px!important}
            .lp-filter-bar {grid-template-columns:1fr 1fr}
            .lp-filter-type {grid-column:1 / 3}
            .property-search-locations {grid-column:1 / 3}
            .lp-filter-sort {grid-column:1 / 3}
            .lp-more-filters {grid-column:1}
            .lp-filter-bar > .lp-search-submit {grid-column:2}
            .lp-filter-panel {padding:18px;max-height:60vh}
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.partials.header.real-estate-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="content-wrapper">
        <div class="container py-4 py-lg-5">
            <div class="lp-property-heading">
                <h1 class="h2 mb-0"><?php echo e(__($pageHeading ?? ($rentalPage ? 'Properties for rent' : 'Properties'))); ?></h1>
                <div class="fs-sm text-body-secondary"><?php echo e(__('Showing :shown of :total properties', ['shown'=>$properties->count(),'total'=>$properties->total()])); ?></div>
            </div>
            <?php if($verifiedPage ?? false): ?>
                <p class="text-body-secondary"><?php echo e(__('Published listings with completed Basic or Silver checks.')); ?> <a href="<?php echo e(route('verification-ranks')); ?>"><?php echo e(__('See what each verification level covers')); ?></a></p>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger" role="alert">
                    <p class="mb-1"><?php echo e(__('Please check your search filters.')); ?></p>
                    <ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
                </div>
            <?php endif; ?>
           <form method="GET"
      action="<?php echo e(route($listingRoute)); ?>"
      class="lp-filter-bar" id="property-search">

    <div class="lp-filter-type">
        <label for="category" class="visually-hidden"><?php echo e(__('Property type')); ?></label>
        <select id="category" name="category" class="form-select">
            <option value=""><?php echo e(__('Property type')); ?></option>
            <?php $__currentLoopData = ['land'=>'Land','house'=>'House','apartments-villas'=>'Apartments & villas','apartment'=>'Apartment','villa'=>'Villa','commercial'=>'Commercial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php if($category === $value): echo 'selected'; endif; ?>><?php echo e(__($label)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="property-search-locations">
        <?php if (isset($component)) { $__componentOriginal2ec32adcef7df5e096b1cc82de796bd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ec32adcef7df5e096b1cc82de796bd4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.location-fields','data' => ['district' => request('district', ''),'city' => request('city', '')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('location-fields'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['district' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request('district', '')),'city' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request('city', ''))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ec32adcef7df5e096b1cc82de796bd4)): ?>
<?php $attributes = $__attributesOriginal2ec32adcef7df5e096b1cc82de796bd4; ?>
<?php unset($__attributesOriginal2ec32adcef7df5e096b1cc82de796bd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ec32adcef7df5e096b1cc82de796bd4)): ?>
<?php $component = $__componentOriginal2ec32adcef7df5e096b1cc82de796bd4; ?>
<?php unset($__componentOriginal2ec32adcef7df5e096b1cc82de796bd4); ?>
<?php endif; ?>
    </div>
    <div class="lp-filter-sort">
        <label for="sort" class="visually-hidden"><?php echo e(__('Sort by')); ?></label>

        <select id="sort" name="sort" class="form-select">
            <option value="newest" <?php if($sort === 'newest'): echo 'selected'; endif; ?>>
                <?php echo e(__('Newest first')); ?>

            </option>
            <option value="price_asc" <?php if($sort === 'price_asc'): echo 'selected'; endif; ?>>
                <?php echo e(__('Price: low to high')); ?>

            </option>
            <option value="price_desc" <?php if($sort === 'price_desc'): echo 'selected'; endif; ?>>
                <?php echo e(__('Price: high to low')); ?>

            </option>
        </select>
    </div>
    <details class="lp-more-filters" id="more-property-filters" <?php if($errors->any()): ?> open <?php endif; ?>>
        <summary><i class="fi-sliders" aria-hidden="true"></i> <?php echo e(__('More filters')); ?><span class="lp-filter-count"></span></summary>
        <div class="lp-filter-panel">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 mb-0"><?php echo e(__('Refine your search')); ?></h2>
                <button class="btn-close" type="button" aria-label="<?php echo e(__('Close filters')); ?>" id="close-property-filters" hidden></button>
            </div>
            <div class="row g-3">
    <div class="col-12">
        <label for="location" class="form-label"><?php echo e(__('Area')); ?></label>
        <input id="location" name="location" class="form-control" maxlength="100" value="<?php echo e(old('location', $location)); ?>" placeholder="<?php echo e(__('Enter an area or locality')); ?>">
    </div>
    <?php $__currentLoopData = ['min_price'=>($rentalPage ? 'Minimum monthly rent (LKR)' : 'Minimum price (LKR)'), 'max_price'=>($rentalPage ? 'Maximum monthly rent (LKR)' : 'Maximum price (LKR)')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6">
            <label for="<?php echo e($field); ?>" class="form-label"><?php echo e(__($label)); ?></label>
            <input type="number" min="0" step="0.01" id="<?php echo e($field); ?>" name="<?php echo e($field); ?>" class="form-control" value="<?php echo e(old($field, request($field))); ?>" placeholder="<?php echo e(__('Any')); ?>">
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4" data-search-categories="house apartment villa apartments-villas" <?php if(in_array($category, ['land', 'commercial'])): ?> hidden <?php endif; ?>>
                    <label for="bedrooms" class="form-label"><?php echo e(__('Bedrooms (exact; 0 for studio)')); ?></label>
                    <input type="number" min="0" max="100" step="1" id="bedrooms" name="bedrooms" <?php if(in_array($category, ['land', 'commercial'])): echo 'disabled'; endif; ?> class="form-control" value="<?php echo e(old('bedrooms', request('bedrooms'))); ?>" placeholder="<?php echo e(__('Any')); ?>">
                </div>
                <?php $__currentLoopData = ['min_land_size'=>'Minimum land size (perches)', 'max_land_size'=>'Maximum land size (perches)', 'min_floor_area'=>'Minimum floor area (sq ft)', 'max_floor_area'=>'Maximum floor area (sq ft)']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $allowedCategories = str_contains($field, 'land_size') ? ['land', 'house', 'villa'] : ['house', 'apartment', 'villa', 'apartments-villas', 'commercial'];
                        $filterHidden = $category !== '' && !in_array($category, $allowedCategories);
                    ?>
                    <div class="col-md-6 col-lg-4" data-search-categories="<?php echo e(implode(' ', $allowedCategories)); ?>" <?php if($filterHidden): ?> hidden <?php endif; ?>>
                        <label for="<?php echo e($field); ?>" class="form-label"><?php echo e(__($label)); ?></label>
                        <input type="number" min="0" step="0.01" id="<?php echo e($field); ?>" name="<?php echo e($field); ?>" <?php if($filterHidden): echo 'disabled'; endif; ?> class="form-control" value="<?php echo e(old($field, request($field))); ?>" placeholder="<?php echo e(__('Any')); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="d-flex flex-wrap gap-2 align-items-center mt-4">
                <button type="submit" class="btn btn-primary" style="background:#8B1E24;border-color:#8B1E24"><?php echo e(__('Apply filters')); ?></button>
                <a href="<?php echo e(route($listingRoute)); ?>" class="btn btn-outline-secondary"><?php echo e(__('Clear')); ?></a>
            </div>
        </div>
    </details>
    <button type="submit" class="btn lp-search-submit"><?php echo e(__('Search')); ?></button>



</form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 lp-property-results" id="property-results" data-next-page="<?php echo e($properties->nextPageUrl()); ?>" data-prev-page="<?php echo e($properties->previousPageUrl()); ?>">
                <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col">
                        <article class="card hover-effect-opacity h-100">
                            <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                                <?php echo $__env->make('properties.category-badge', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php echo $__env->make('properties.saved-badge', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php echo $__env->make('properties.negotiable-label', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php if($property->images->isNotEmpty()): ?>
                                    <div class="swiper z-2"
                                         data-swiper='{
                                             "pagination": {
                                                 "el": ".swiper-pagination",
                                                 "clickable": true
                                             },
                                             "navigation": {
                                                 "prevEl": ".btn-prev",
                                                 "nextEl": ".btn-next"
                                             }
                                         }'>
                                        <div class="swiper-wrapper">
                                            <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="swiper-slide">
                                                    <a href="<?php echo e(route('properties.show', $property->property_code)); ?>"
                                                       class="ratio d-block"
                                                       style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                                        <img
                                                            src="<?php echo e(asset('storage/'.$photo->path)); ?>"
                                                            alt="Photo <?php echo e($loop->iteration); ?> of <?php echo e($property->title); ?>"
                                                            class="object-fit-cover"
                                                            loading="lazy">
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        <?php if($property->images->count() > 1): ?>
                                            <div class="position-absolute top-50 start-0 z-1 translate-middle-y ms-3">
                                                <button type="button"
                                                        class="btn btn-sm btn-prev btn-icon btn-light rounded-circle"
                                                        aria-label="<?php echo e(__('Previous photo')); ?>">
                                                    <i class="fi-chevron-left"></i>
                                                </button>
                                            </div>

                                            <div class="position-absolute top-50 end-0 z-1 translate-middle-y me-3">
                                                <button type="button"
                                                        class="btn btn-sm btn-next btn-icon btn-light rounded-circle"
                                                        aria-label="<?php echo e(__('Next photo')); ?>">
                                                    <i class="fi-chevron-right"></i>
                                                </button>
                                            </div>

                                            <div class="swiper-pagination bottom-0 mb-2"
                                                 data-bs-theme="light"></div>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="ratio"
                                         style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <?php echo e(__('No photo available')); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="card-body p-3">
                                <div class="h5 mb-2"><?php echo e($property->priceLabel()); ?></div>

                                <h2 class="h6 mb-2">
                                    <a class="stretched-link text-body"
                                       href="<?php echo e(route('properties.show', $property->property_code)); ?>">
                                        <?php echo e($property->title); ?>

                                    </a>
                                </h2>

                                <p class="fs-sm text-body-secondary mb-2">
                                    <i class="fi-map-pin me-1" aria-hidden="true"></i>
                                    <?php echo e(collect([$property->city, $property->district])->filter()->implode(', ')); ?>

                                </p>

                                <?php echo $__env->make('properties.card-highlights', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            </div>

                            <div class="card-footer border-0 bg-transparent pt-0 pb-3 px-3">
                                <span class="fs-sm text-primary">
                                    <?php echo e(__('View details')); ?>

                                    <i class="fi-chevron-right ms-1" aria-hidden="true"></i>
                                </span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col w-100">
                        <div class="alert alert-info">
                            <?php echo e($rentalPage ? 'No rental properties are available for this search. Try another location or check back for new listings.' : 'No properties match your search. Try another location or clear the filters.'); ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-4">
                <?php echo e($properties->onEachSide(2)->links('properties.pagination-dots')); ?>

            </div>
        </div>
    </main>
    <?php echo $__env->make('layouts.partials.footer.real-estate-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script>
        (() => {
            const results = document.getElementById('property-results');
            let swipeStart = null;
            results.addEventListener('touchstart', event => {
                swipeStart = event.touches.length === 1 && !event.target.closest('.swiper, button, input, select')
                    ? {x:event.touches[0].clientX, y:event.touches[0].clientY} : null;
            }, {passive:true});
            results.addEventListener('touchend', event => {
                if (!swipeStart || !event.changedTouches.length) return;
                const dx = event.changedTouches[0].clientX - swipeStart.x;
                const dy = event.changedTouches[0].clientY - swipeStart.y;
                swipeStart = null;
                if (Math.abs(dx) < 80 || Math.abs(dx) < Math.abs(dy) * 2) return;
                const destination = dx < 0 ? results.dataset.nextPage : results.dataset.prevPage;
                if (destination) window.location.assign(destination + '#property-results');
            }, {passive:true});
            results.addEventListener('touchcancel', () => { swipeStart = null; }, {passive:true});
            const category = document.getElementById('category');
            const groups = category.form.querySelectorAll('[data-search-categories]');
            const locations = category.form.querySelector('[data-location-fields]');
            locations.dataset.cityPlaceholder = <?php echo json_encode(__('City'), 15, 512) ?>;
            locations.dataset.cityEmptyPlaceholder = <?php echo json_encode(__('City'), 15, 512) ?>;
            locations.querySelector('[name="district"]').options[0].text = <?php echo json_encode(__('District'), 15, 512) ?>;
            locations.querySelector('[name="city"]').options[0].text = <?php echo json_encode(__('City'), 15, 512) ?>;
            const details = document.getElementById('more-property-filters');
            const summary = details.querySelector('summary');
            const close = document.getElementById('close-property-filters');
            close.hidden = false;
            const closeFilters = () => { details.open = false; summary.focus(); };
            close.addEventListener('click', closeFilters);
            details.addEventListener('keydown', event => {
                if (event.key === 'Escape') { event.preventDefault(); closeFilters(); }
            });
            document.addEventListener('click', event => {
                if (details.open && !category.form.contains(event.target)) details.open = false;
            });
            category.form.addEventListener('invalid', () => { details.open = true; }, true);
            const countFilters = () => {
                const count = [...details.querySelectorAll('input')].filter(input => !input.disabled && input.value !== '').length;
                details.querySelector('.lp-filter-count').textContent = count ? ` (${count})` : '';
            };
            details.addEventListener('input', countFilters);

            const updateFilters = () => {
                groups.forEach(group => {
                    const visible = !category.value || group.dataset.searchCategories.split(' ').includes(category.value);
                    group.hidden = !visible;
                    group.querySelectorAll('input').forEach(input => {
                        input.disabled = !visible;
                        if (!visible) input.value = '';
                    });
                });
            };
            category.addEventListener('change', () => { updateFilters(); countFilters(); });
            window.addEventListener('pageshow', updateFilters);
            updateFilters();
            countFilters();
        })();
    </script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/properties/index.blade.php ENDPATH**/ ?>