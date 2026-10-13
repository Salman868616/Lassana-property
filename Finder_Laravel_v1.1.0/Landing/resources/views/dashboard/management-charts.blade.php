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
@php
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
@endphp
<div class="row g-3 mb-4 management-charts">
@foreach($chartPanels as [$heading, $counts, $type, $totalLabel])
    @php
        $chartTotal = (int) collect($counts)->sum();
        $chartStops = [];
        $chartPosition = 0;
        foreach ($counts as $status => $count) {
            if ($count <= 0 || $chartTotal === 0) continue;
            $end = $chartPosition + ($count / $chartTotal * 100);
            $chartStops[] = ($chartColors[$status] ?? '#6B5550').' '.number_format($chartPosition, 4, '.', '').'% '.number_format($end, 4, '.', '').'%';
            $chartPosition = $end;
        }
    @endphp
    <div class="col-lg-4">
        <section class="card chart-card h-100" aria-labelledby="management-chart-{{ $loop->index }}">
            <h2 class="h5 mb-1" id="management-chart-{{ $loop->index }}">{{ $heading }}</h2>
            <p class="{{ $type === 'doughnut' ? 'visually-hidden' : 'small text-secondary mb-0' }}">{{ $totalLabel }}: <strong>{{ $chartTotal }}</strong></p>
            @if($chartTotal === 0)
                <div class="chart-empty">No matching records.</div>
            @elseif($type !== 'bars')
                <div class="chart-plot" aria-hidden="true" style="background: conic-gradient({{ implode(', ', $chartStops) }})">
                    @if($type === 'doughnut')
                        <div class="chart-hole"><strong>{{ $chartTotal }}</strong><span class="small text-secondary">Verified</span></div>
                    @endif
                </div>
                <ul class="list-unstyled mb-0">
                @foreach($counts as $status => $count)
                    <li class="chart-key">
                        <span class="chart-dot" aria-hidden="true" style="background: {{ $chartColors[$status] ?? '#6B5550' }}"></span>
                        <span>{{ ucfirst(str_replace('_', ' ', $status)) }}</span>
                        <strong class="ms-auto">{{ $count }}</strong>
                        <span class="small text-secondary">({{ round($count / $chartTotal * 100, 1) }}%)</span>
                    </li>
                @endforeach
                </ul>
            @else
                <div class="mt-4 mb-3">
                @foreach($counts as $status => $count)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between gap-2 mb-2"><span>{{ ucfirst(str_replace('_', ' ', $status)) }}</span><strong>{{ $count }}</strong></div>
                        <div class="chart-track" aria-hidden="true"><div class="chart-fill" style="width: {{ $count / $chartTotal * 100 }}%; background: {{ $chartColors[$status] ?? '#6B5550' }}"></div></div>
                    </div>
                @endforeach
                </div>
            @endif
            @if($type === 'bars')
                <div class="mt-auto pt-3 border-top"><strong>Upcoming: {{ $managementOverview['upcomingViewings'] }}</strong></div>
            @endif
        </section>
    </div>
@endforeach
</div>
