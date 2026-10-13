<style>
.management-charts .chart-card { padding: 1.5rem; }
.management-charts .chart-plot { width: 190px; height: 190px; border-radius: 50%; margin: 1.25rem auto; flex-shrink: 0; position: relative; }
.management-charts .chart-hole { position: absolute; inset: 25%; border-radius: 50%; background: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center; }
.management-charts .chart-hole strong { font-size: 1.65rem; line-height: 1.2; }
.management-charts .chart-key { display: flex; align-items: center; gap: .6rem; padding: .45rem 0; }
.management-charts .chart-dot { width: .7rem; height: .7rem; border-radius: 50%; flex-shrink: 0; }
.management-charts .chart-track { height: 14px; border-radius: 7px; background: #F6EEE0; overflow: hidden; }
.management-charts .chart-fill { height: 100%; border-radius: inherit; }
.management-charts .chart-empty { min-height: 190px; display: grid; place-items: center; color: #6B5550; }
</style>
<?php
    $chartColors = [
        'basic'=>'#8B1E24', 'silver'=>'#A8A3A0', 'gold'=>'#C89B3C',
        'published'=>'#8B1E24', 'sold'=>'#C89B3C', 'archived'=>'#B8ADA3',
        'draft'=>'#E2D5C5', 'submitted'=>'#D8B66B', 'under_review'=>'#A77924',
        'approved'=>'#5A1015', 'rejected'=>'#B86A70',
        'scheduled'=>'#8B1E24', 'completed'=>'#C89B3C', 'cancelled'=>'#B8ADA3', 'no_show'=>'#B86A70',
    ];
    $chartPanels = [
        ['Property statuses', $managementOverview['propertyStatuses'], 'pie', 'Total properties'],
        ['Viewing statuses', $managementOverview['viewingStatuses'], 'bars', 'Total viewings'],
        ['Verification levels', $managementOverview['verificationLevels'], 'doughnut', 'Verified listings'],
    ];
?>
<div class="row g-3 mb-4 management-charts">
<?php $__currentLoopData = $chartPanels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$heading, $counts, $type, $totalLabel]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $chartTotal = (int) collect($counts)->sum();
        $chartStops = [];
        $chartPosition = 0;
        foreach ($counts as $status => $count) {
            if ($count <= 0 || $chartTotal === 0) continue;
            $end = $chartPosition + ($count / $chartTotal * 100);
            $chartStops[] = ($chartColors[$status] ?? '#6B5550').' '.number_format($chartPosition, 4, '.', '').'% '.number_format($end, 4, '.', '').'%';
            $chartPosition = $end;
        }
    ?>
    <div class="col-lg-4">
        <section class="card chart-card h-100" aria-labelledby="management-chart-<?php echo e($loop->index); ?>">
            <h2 class="h5 mb-1" id="management-chart-<?php echo e($loop->index); ?>"><?php echo e($heading); ?></h2>
            <p class="<?php echo e($type === 'doughnut' ? 'visually-hidden' : 'small text-secondary mb-0'); ?>"><?php echo e($totalLabel); ?>: <strong><?php echo e($chartTotal); ?></strong></p>
            <?php if($chartTotal === 0): ?>
                <div class="chart-empty">No matching records.</div>
            <?php elseif($type !== 'bars'): ?>
                <div class="chart-plot" aria-hidden="true" style="background: conic-gradient(<?php echo e(implode(', ', $chartStops)); ?>)">
                    <?php if($type === 'doughnut'): ?>
                        <div class="chart-hole"><strong><?php echo e($chartTotal); ?></strong><span class="small text-secondary">Verified</span></div>
                    <?php endif; ?>
                </div>
                <ul class="list-unstyled mb-0">
                <?php $__currentLoopData = $counts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="chart-key">
                        <span class="chart-dot" aria-hidden="true" style="background: <?php echo e($chartColors[$status] ?? '#6B5550'); ?>"></span>
                        <span><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></span>
                        <strong class="ms-auto"><?php echo e($count); ?></strong>
                        <span class="small text-secondary">(<?php echo e(round($count / $chartTotal * 100, 1)); ?>%)</span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php else: ?>
                <div class="mt-4 mb-3">
                <?php $__currentLoopData = $counts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between gap-2 mb-2"><span><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></span><strong><?php echo e($count); ?></strong></div>
                        <div class="chart-track" aria-hidden="true"><div class="chart-fill" style="width: <?php echo e($count / $chartTotal * 100); ?>%; background: <?php echo e($chartColors[$status] ?? '#6B5550'); ?>"></div></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <?php if($type === 'bars'): ?>
                <div class="mt-auto pt-3 border-top"><strong>Upcoming: <?php echo e($managementOverview['upcomingViewings']); ?></strong></div>
            <?php endif; ?>
        </section>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\AdminUser\Documents\Finder_Laravel_v1.1.0\Landing\resources\views/dashboard/management-charts.blade.php ENDPATH**/ ?>