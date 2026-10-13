@php
    $adminSection = request()->query('section', 'overview');
    $adminSection = $adminData['section'] ?? $adminSection;
    $activeAdmin = request()->routeIs('admin.properties.*','dashboard.property') ? 'properties' : (request()->routeIs('admin.users.*','admin.agent-applications.*') ? 'users' : (request()->routeIs('leads.*') ? 'leads' : $adminSection));
    if (request()->routeIs('admin.marketing.*')) $activeAdmin = 'marketing';
    if (request()->routeIs('admin.revenue.*')) $activeAdmin = 'revenue';
    if (request()->routeIs('admin.reports.*')) $activeAdmin = 'reports';
    $adminRoles = $roles ?? app(\App\Services\DashboardAccess::class)->roles(auth()->user());
    $adminNav = [
        'overview'=>['Overview','fi-grid',route('dashboard.role','admin')],
        'management'=>['Management overview','fi-grid',route('dashboard.role',['role'=>'admin','section'=>'management'])],
        'properties'=>['Properties','fi-home',route('admin.properties.index')],
        'users'=>['Users','fi-user',route('admin.users.index')],
        'leads'=>['Leads','fi-chat',route('dashboard.role',['role'=>'admin','section'=>'leads'])],
        'marketing'=>['Marketing reports','fi-grid',route('admin.marketing.index')],
        'revenue'=>['Revenue','fi-credit-card',route('admin.revenue.index')],
        'reports'=>['Reports','fi-file',route('admin.reports.index')],
    ];
    $workspaceRole = $role ?? 'admin';
    $workspaceLabel = \App\Services\DashboardAccess::ROLES[$workspaceRole];
    $workspaceHome = route('dashboard.role',$workspaceRole);
    $workspaceDescription = match($workspaceRole) {
        'seller'=>'Manage your listings, documents and property updates.',
        'agent'=>'Manage your property listings, assigned leads and property viewings.',
        'sales'=>'Manage customer requests, lead assignments and follow-ups.',
        'verification'=>'Review submitted properties, evidence and verification decisions.',
        'buyer'=>'Keep track of saved properties, requests and viewings.',
        default=>'Manage properties, people and customer enquiries.',
    };
    if ($workspaceRole !== 'admin') {
        $adminNav = ['overview'=>['Overview','fi-grid',$workspaceHome]];
        if ($workspaceRole !== 'buyer') {
            $adminNav['properties']=[match($workspaceRole){'seller'=>'My properties','agent'=>'My properties','verification'=>'Property reviews',default=>'Properties'},'fi-home',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'properties'])];
        }
        if (in_array($workspaceRole,['seller','agent'],true)) $adminNav['create']=['Add property','fi-plus',route($workspaceRole.'.properties.create')];
        if (in_array($workspaceRole,['sales','agent'],true)) $adminNav['enquiries']=['Enquiries','fi-chat',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'enquiries'])];
        if (in_array($workspaceRole,['sales','agent'],true)) {
            $adminNav['requests']=['Property requests','fi-search',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'requests'])];
            $adminNav['leads']=['Leads','fi-file',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'leads'])];
            $adminNav['followups']=['Follow-ups due','fi-clock',route('dashboard.role',['role'=>$workspaceRole,'lead_queue'=>'due']).'#lead-list'];
            $adminNav['performance']=['Sales overview','fi-grid',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'performance'])];
        }
        if ($workspaceRole === 'buyer') {
            $adminNav['services']=['Service requests','fi-calendar',route('buyer.services.index')];
            $adminNav['saved']=['Saved properties','fi-heart',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'saved'])];
            $adminNav['requests']=['My property requests','fi-file',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'requests'])];
            $adminNav['request-create']=['Request a property','fi-plus',route('buyer.requests.create')];
            $adminNav['browse']=['Browse properties','fi-search',route('properties.index')];
        }
        if (in_array($workspaceRole,['sales','agent','buyer'],true)) $adminNav['viewings']=['Viewings','fi-calendar',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'viewings'])];
        $activeAdmin = match(true) {
            request()->routeIs('seller.properties.create','agent.properties.create')=>'create',
            request()->routeIs('seller.properties.*','agent.properties.*','dashboard.property')=>'properties',
            request()->routeIs('buyer.services.*')=>'services',
            request()->routeIs('buyer.requests.create')=>'request-create',
            request()->routeIs('buyer.requests.*')=>'requests',
            request()->routeIs('leads.*')=>'leads',
            request()->query('lead_queue')==='due'=>'followups',
            default=>$dashboardTab ?? 'overview',
        };
    }
    if ($workspaceRole === 'admin') {
        $adminNav['developers'] = ['Developers','fi-home',route('admin.developers.index')];
        if (request()->routeIs('admin.developers.*')) $activeAdmin = 'developers';
        $adminNav['developer-applications'] = ['Developer registrations','fi-user',route('admin.developer-applications.index')];
        $adminNav['testimonials'] = ['Testimonials','fi-chat',route('admin.testimonials.index')];
        if (request()->routeIs('admin.developer-applications.*')) $activeAdmin = 'developer-applications';
        if (request()->routeIs('admin.testimonials.*')) $activeAdmin = 'testimonials';
    }
    if ($workspaceRole !== 'seller') {
        $adminNav['complaints'] = ['Complaints','fi-chat',route($workspaceRole === 'admin' ? 'admin.complaints.index' : 'complaints.index')];
    }
    if (request()->routeIs('complaints.*','admin.complaints.*')) $activeAdmin = 'complaints';
    $leadChildren = [];
    if (in_array($workspaceRole,['admin','sales','agent'],true)) {
        foreach (['leads'=>'Monitor leads','requests'=>'Property requests','enquiries'=>'Enquiries','viewings'=>'Viewings'] as $tab=>$label) {
            $params = ['role'=>$workspaceRole,'tab'=>$tab];
            if ($workspaceRole === 'admin') $params['section'] = 'leads';
            $leadChildren[$tab] = [$label,route('dashboard.role',$params)];
        }
        if ($workspaceRole !== 'admin') $leadChildren['followups'] = ['Follow-ups due',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'leads','lead_queue'=>'due'])];
        unset($adminNav['requests'],$adminNav['enquiries'],$adminNav['viewings'],$adminNav['followups']);
    }
    $submenus = [];
    if (!in_array($workspaceRole, ['admin','seller'], true)) {
        $submenus['complaints'] = [
            ['My complaints',route('complaints.index'),request()->routeIs('complaints.index','complaints.show')],
            ['Submit a complaint',route('complaints.create'),request()->routeIs('complaints.create')],
        ];
    }
    if ($workspaceRole === 'admin') {
        $submenus['properties'] = [
            ['All properties',route('admin.properties.index'),$activeAdmin === 'properties' && !request()->routeIs('admin.properties.create') && request('queue') !== 'review'],
            ['Review queue',route('admin.properties.index', ['queue'=>'review']),request()->routeIs('admin.properties.index') && request('queue') === 'review'],
            ['Add property',route('admin.properties.create'),request()->routeIs('admin.properties.create')],
        ];
        $submenus['users'] = [
            ['All users',route('admin.users.index'),request()->routeIs('admin.users.*') && !request('status')],
            ['Active users',route('admin.users.index',['status'=>'active']),request()->routeIs('admin.users.*') && request('status') === 'active'],
            ['Suspended users',route('admin.users.index',['status'=>'suspended']),request()->routeIs('admin.users.*') && request('status') === 'suspended'],
            ['Agent applications',route('admin.agent-applications.index'),request()->routeIs('admin.agent-applications.*')],
        ];
        foreach (['properties'=>'Property reports','users'=>'User reports','leads'=>'Lead reports'] as $reportType=>$label) {
            $submenus['reports'][] = [$label,route('admin.reports.index',['type'=>$reportType]),$activeAdmin === 'reports' && request('type','properties') === $reportType];
        }
    }
    if (in_array($workspaceRole,['seller','agent'],true)) {
        $submenus['properties'] = [
            ['My properties',route('dashboard.role',['role'=>$workspaceRole,'tab'=>'properties']),$activeAdmin === 'properties'],
            ['Add property',route($workspaceRole.'.properties.create'),$activeAdmin === 'create'],
        ];
        unset($adminNav['create']);
    }
    if ($workspaceRole === 'buyer') {
        $submenus['services'] = [
            ['My service requests',route('buyer.services.index'),request()->routeIs('buyer.services.index','buyer.services.show')],
            ['Request inspection',route('buyer.services.create',['type'=>'inspection']),request()->routeIs('buyer.services.create') && request('type','inspection') === 'inspection'],
            ['Request LGC service',route('buyer.services.create',['type'=>'lgc_service']),request()->routeIs('buyer.services.create') && request('type') === 'lgc_service'],
        ];
        $submenus['requests'] = [
            ['My requests',route('dashboard.role',['role'=>'buyer','tab'=>'requests']),$activeAdmin === 'requests'],
            ['Request a property',route('buyer.requests.create'),$activeAdmin === 'request-create'],
        ];
        unset($adminNav['request-create']);
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/lassana-property-logo.png') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/lassana-property-logo.png') }}?v=2">
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} | Lassana Property</title>
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icons/finder-icons.min.css') }}">
    <style>
    :root{--lp-maroon:#8b1e24}*{box-sizing:border-box}body{margin:0;background:#f6f7fa;color:#202737;font-family:system-ui,-apple-system,'Segoe UI',sans-serif}a{color:var(--lp-maroon)}
    .lp-sidebar{background:#8B1E24;color:#fff;padding:28px 18px;display:flex;flex-direction:column;overflow:auto;z-index:1040}
    .lp-brand{display:flex;align-items:center;gap:12px;color:#fff;text-decoration:none;font-size:18px;font-weight:650;margin:0 8px 32px}.lp-brand:hover{color:#fff}.lp-brand img{width:58px;height:65px;object-fit:contain;background:white;border-radius:8px;padding:3px}.lp-brand small{display:block;font-weight:400;font-size:11px;letter-spacing:.1em;margin-top:4px;color:#efd8da}
    .lp-menu-label{font-size:10px;letter-spacing:.15em;color:#e9c8cb;margin:0 16px 12px}.lp-sidebar nav a,.lp-side-bottom a,.lp-side-bottom button{display:flex;align-items:center;gap:14px;color:#faeeee;text-decoration:none;padding:12px 16px;border-radius:8px;margin-bottom:5px;font-size:14px;border:0;background:none;width:100%;text-align:left}.lp-sidebar nav a.active{background:white;color:#8B1E24;font-weight:650;box-shadow:0 4px 12px #450b1720}.lp-sidebar nav a:hover,.lp-side-bottom a:hover,.lp-side-bottom button:hover{background:#ffffff19;color:white}.lp-sidebar nav a.active:hover{background:white;color:#8B1E24}.lp-sidebar i{font-size:19px;width:22px}.lp-side-bottom{margin-top:auto;padding-top:28px}.lp-side-bottom hr{opacity:.25}.lp-sidebar a:focus-visible,.lp-sidebar button:focus-visible{outline:3px solid #C89B3C;outline-offset:2px}
    .lp-admin-top{height:82px;background:white;border-bottom:1px solid #e9ebf0;padding:16px 34px;display:flex;align-items:center;gap:16px}.lp-admin-top .lp-user{margin-left:auto;display:flex;align-items:center;gap:12px}.lp-avatar{width:40px;height:40px;border-radius:50%;background:#f3e5e7;color:var(--lp-maroon);display:grid;place-items:center;font-weight:700}.lp-muted{color:#758095;font-size:13px}.lp-admin-content{padding:32px;width:100%;min-width:0}.lp-heading{display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap;margin-bottom:26px}.lp-heading h1{font-size:29px;font-weight:700;margin-bottom:6px}.lp-heading p{color:#758095;font-size:14px;margin:0}.lp-admin-footer{padding:12px 32px 25px;color:#818b9b;font-size:12px}
    .card{border:1px solid #e4e7ed;border-radius:11px;box-shadow:0 3px 12px #17284403;overflow:hidden}.card-header{background:white;border-bottom:1px solid #edf0f4;padding:20px}.card-body{padding:20px}.table td,.table th{padding:16px 20px;vertical-align:middle}.table th{background:#f8f9fc;color:#657086;font-size:12px;font-weight:600}.table td{font-size:14px}.table small{font-size:12px}.btn-lp,.btn-primary{background:var(--lp-maroon);border-color:var(--lp-maroon);color:white}.btn-lp:hover,.btn-primary:hover{background:#5A1015;border-color:#5A1015;color:white}.btn{border-radius:7px}.lp-metric{padding:23px;display:flex;flex-direction:row;gap:16px;align-items:center;height:100%;text-decoration:none;color:inherit}.lp-metric:hover{border-color:#bd9295;color:inherit}.lp-metric-icon{width:48px;height:48px;display:grid;place-items:center;background:#f6e9eb;border-radius:14px;color:var(--lp-maroon);font-size:22px}.lp-metric strong{display:block;font-size:29px;line-height:1.4}.lp-metric span{font-size:13px;color:#626e81}.lp-status{display:inline-block;padding:5px 9px;border-radius:5px;font-size:12px;background:#f0f2f5;color:#525e70}.lp-status.published{background:#e5f4eb;color:#24794a}.lp-status.under_review,.lp-status.submitted{background:#fff1d9;color:#956019}.lp-empty{padding:36px 22px;color:#768194;text-align:center}.lp-viewing{padding:18px 20px;border-bottom:1px solid #edf0f4;display:flex;gap:14px}.lp-date{background:#f8edef;border-radius:7px;color:#8b1e24;min-width:48px;text-align:center;padding:7px;height:60px}.lp-date strong{display:block;font-size:20px}.lp-date small{font-size:10px}.lp-mobile-toggle,.lp-sidebar-close{display:none}.lp-backdrop{display:none}
    @media(max-width:991.98px){.lp-sidebar-close{display:block;position:absolute;right:8px;top:5px;color:white;background:none;border:0;font-size:23px}.lp-admin-content{padding:22px 16px}.lp-admin-top{padding:12px 16px}.lp-heading h1{font-size:25px}.lp-admin-footer{padding:20px 16px}} .lp-mobile-toggle{display:block} @media(prefers-reduced-motion:reduce){.lp-sidebar{transition:none}}
    /* Lassana Property brand palette, with soft neutral surfaces. */
    :root {
        --lp-maroon:#8B1E24; --lp-deep-maroon:#5A1015; --lp-gold:#C89B3C;
        --lp-charcoal:#111111; --lp-white:#FFFFFF;
        --bs-body-color:#4D4545; --bs-body-bg:#FBFAF8;
        --bs-heading-color:#8B1E24; --bs-secondary-color:#716767;
        --bs-border-color:#EAE4DD; --bs-link-color:#8B1E24; --bs-link-hover-color:#5A1015;
    }
    body,.app-wrapper,.app-main{background:#FBFAF8;color:#4D4545}
    .lp-admin-top,.card,.card-header,.app-footer{background:var(--lp-white)}
    .lp-heading h1,.card h2,.card h3{color:var(--lp-maroon)}
    .lp-heading h1{font-weight:650}
    .lp-muted,.lp-heading p,.lp-admin-footer,.lp-empty,.lp-metric span{color:#716767}
    .lp-admin-top{border-bottom-color:#EAE4DD}
    .lp-admin-footer{border-top:1px solid #EAE4DD}
    .card{border-color:#EAE4DD;box-shadow:0 3px 14px rgba(90,16,21,.025)}
    .card-header,.lp-viewing{border-bottom-color:#EEE9E3}
    .lp-sidebar{background:var(--lp-maroon)}
    .lp-sidebar nav a:hover,.lp-side-bottom a:hover,.lp-side-bottom button:hover{background:var(--lp-deep-maroon)}
    .lp-sidebar nav a.active,.lp-sidebar nav a.active:hover{color:var(--lp-maroon);background:var(--lp-white);box-shadow:inset 4px 0 0 var(--lp-gold)}
    .lp-brand small,.lp-menu-label{color:#F4E2BB}
    .lp-side-bottom hr{border-color:var(--lp-gold);opacity:.65}
    .lp-brand img{border:1px solid #EAD4A4}
    .lp-avatar{background:#FBF4E5;color:var(--lp-maroon);border:1px solid #EAD4A4;overflow:hidden;flex-shrink:0}.lp-avatar img{display:block;width:100%;height:100%;object-fit:cover}
    .lp-metric-icon{background:#FBF4E5;color:var(--lp-maroon);border:1px solid #EDDCB7;flex-shrink:0}
    .lp-metric strong{color:var(--lp-maroon);font-weight:650}
    .lp-metric:hover{border-color:var(--lp-gold)}
    .lp-date{background:#FBF4E5;color:var(--lp-maroon)}
    .table{--bs-table-color:#4D4545;--bs-table-bg:#FFFFFF;--bs-table-border-color:#EEE9E3;--bs-table-striped-bg:#FBF9F6;--bs-table-striped-color:#4D4545;--bs-table-hover-bg:#FBF4E5;--bs-table-hover-color:#4D4545}
    .table th{background:#FAF6EE;color:#6B5550}
    .lp-status{background:#F3EFEB;color:#6D605A}
    .lp-status.submitted,.lp-status.under_review{background:#FBF0D5;color:#795A1E;border:1px solid #EAD4A4}
    .lp-status{font-weight:600;white-space:nowrap;border:1px solid transparent}
    .lp-status.draft{background:#F1F3F5;color:#495057;border-color:#CED4DA}
    .lp-status.submitted{background:#EAF2FF;color:#174EA6;border-color:#BED3F5}
    .lp-status.under_review{background:#FFF3D6;color:#795000;border-color:#E8CE8E}
    .lp-status.approved{background:#F1EAFE;color:#6335A0;border-color:#D9C5F4}
    .lp-status.published{background:#E0F4F4;color:#096568;border-color:#A9DCDD}
    .lp-status.sold{background:#E6F4EA;color:#176534;border-color:#B5DDBF}
    .lp-status.archived{background:#FDEBEC;color:#A51D2D;border-color:#F1BDC4}
    .btn-outline-secondary{--bs-btn-color:#6B5550;--bs-btn-border-color:#D8CFC5;--bs-btn-hover-bg:#F6EEE0;--bs-btn-hover-color:#5A1015;--bs-btn-hover-border-color:#C89B3C;--bs-btn-active-bg:#F6EEE0;--bs-btn-active-color:#5A1015}
    .btn-primary,.btn-lp{--bs-btn-active-bg:#5A1015;--bs-btn-active-border-color:#5A1015}
    .form-control:focus,.form-select:focus{border-color:#C89B3C;box-shadow:0 0 0 .2rem rgba(200,155,60,.15)}
    .pagination{--bs-pagination-color:#8B1E24;--bs-pagination-active-bg:#8B1E24;--bs-pagination-active-border-color:#8B1E24;--bs-pagination-hover-color:#5A1015;--bs-pagination-hover-bg:#FBF4E5}
    section[id]{scroll-margin-top:100px}.lp-sidebar nav{flex-shrink:0}.lp-sidebar nav a{min-height:44px}    /* Keep native upload controls readable across all dashboard forms. */
    .app-main .form-control[type="file"]{background-color:#FFFFFF;color:#4D4545;border-color:#D8CFC5}
    .app-main .form-control[type="file"]::file-selector-button{background-color:#8B1E24;color:#FFFFFF;border-inline-end:1px solid #8B1E24;font-weight:600;cursor:pointer;transition:background-color .15s ease}
    .app-main .form-control[type="file"]:hover:not(:disabled):not([readonly])::file-selector-button{background-color:#5A1015;color:#FFFFFF}
    .app-main .form-control[type="file"]:focus-visible{outline:2px solid #C89B3C;outline-offset:2px}
    .app-main .form-control[type="file"]:disabled::file-selector-button{background-color:#E9E3DE;color:#716767;cursor:default;border-color:#D8CFC5}
    .lp-submenu summary{cursor:pointer;padding:12px 16px;margin-bottom:5px;border-radius:8px;color:#fff;font-size:14px}.lp-submenu summary:focus-visible{outline:3px solid #C89B3C}.lp-submenu summary i{margin-right:10px}.lp-sidebar nav .lp-submenu a{width:calc(100% - 24px);margin-left:24px;font-size:13px;padding:10px 12px}
    </style>
    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg"><div class="app-wrapper">

<aside class="app-sidebar lp-sidebar" id="admin-sidebar" aria-label="{{ $workspaceLabel }} sidebar">
    <button class="lp-sidebar-close" data-lte-toggle="sidebar" type="button" aria-label="Close navigation">&times;</button>
    <a class="lp-brand" href="{{ $workspaceHome }}"><img src="{{ asset('assets/img/lassana-property-logo.png') }}" alt="Lassana Property"><span>Lassana Property<small>{{ strtoupper($workspaceLabel) }} WORKSPACE</small></span></a>
    <p class="lp-menu-label">WORKSPACE</p>
    <nav aria-label="{{ $workspaceLabel }} navigation">
        @foreach($adminNav as $key=>$item)
            @if($key === 'leads' && $leadChildren)
                <details class="lp-submenu" @if($activeAdmin === 'leads' || in_array($dashboardTab ?? '', ['leads','requests','enquiries','viewings'],true)) open @endif>
                    <summary><i class="fi-chat" aria-hidden="true"></i> Leads</summary>
                    @foreach($leadChildren as $tab=>[$label,$url])
                        @php($selected = $tab === 'followups' ? request('lead_queue') === 'due' : (($dashboardTab ?? '') === $tab && !($workspaceRole !== 'admin' && $tab === 'leads' && request('lead_queue') === 'due')))
                        <a href="{{ $url }}" class="{{ $selected ? 'active' : '' }}" @if($selected) aria-current="page" @endif>{{ $label }}</a>
                    @endforeach
                </details>
            @elseif(isset($submenus[$key]))
                <details class="lp-submenu" @if(collect($submenus[$key])->contains(fn ($child) => $child[2])) open @endif>
                    <summary><i class="{{ $item[1] }}" aria-hidden="true"></i> {{ $item[0] }}</summary>
                    @foreach($submenus[$key] as [$label,$url,$selected])
                        <a href="{{ $url }}" class="{{ $selected ? 'active' : '' }}" @if($selected) aria-current="page" @endif>{{ $label }}</a>
                    @endforeach
                </details>
            @else
            <a href="{{ $item[2] }}" class="{{ $activeAdmin===$key ? 'active' : '' }}" @if($activeAdmin===$key) aria-current="page" @endif><i class="{{ $item[1] }}" aria-hidden="true"></i>{{ $item[0] }}</a>
            @endif
        @endforeach
    </nav>
    <div class="lp-side-bottom">
        @if(count($adminRoles)>1)<p class="lp-menu-label">YOUR OTHER DASHBOARDS</p>@foreach($adminRoles as $key=>$label)@if($key!==$workspaceRole)<a href="{{ route('dashboard.role',$key) }}">{{ $label }}</a>@endif @endforeach @endif
        <hr><a href="{{ route('account-profile') }}"><i class="fi-user" aria-hidden="true"></i>My profile</a>
        <a href="{{ route('index') }}"><i class="fi-external-link" aria-hidden="true"></i>View website</a>
        <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit"><i class="fi-log-out" aria-hidden="true"></i>Log out</button></form>
    </div>
</aside>

    <header class="app-header lp-admin-top"><button class="btn btn-outline-secondary lp-mobile-toggle" data-lte-toggle="sidebar" type="button" aria-controls="admin-sidebar" aria-expanded="false">Menu</button><span class="lp-muted">Lassana Property / {{ $workspaceLabel }}</span><div class="lp-user"><span class="lp-avatar" aria-hidden="true">@if($dashboardPhotoUrl = auth()->user()->profilePhotoUrl())<img src="{{ $dashboardPhotoUrl }}" alt="" width="40" height="40">@else{{ mb_substr(auth()->user()->name,0,1) }}@endif</span><div><strong class="small">{{ auth()->user()->name }}</strong><div class="lp-muted">{{ $workspaceLabel }}</div></div></div></header>
    <main class="app-main lp-admin-content" id="main-content">
        <div class="lp-heading"><div><h1>{{ $title ?? trim($__env->yieldContent('heading','Admin dashboard')) }}</h1><p>{{ $workspaceDescription }}</p></div><span class="lp-muted">{{ now('Asia/Colombo')->format('d M Y') }}</span></div>
        @if(isset($role))
            @if(session('success'))<div class="alert alert-success" role="status">{{ session('success') }}</div>@endif
            @if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        @endif
        @yield('content')
    </main>
    <footer class="app-footer lp-admin-footer">&copy; {{ date('Y') }} Lassana Property</footer>
</div>
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
<script>
(() => {
    const links = [...document.querySelectorAll('.lp-sidebar nav a')];
    function highlightSection() {
        if (!location.hash) return;
        const current = links.find(link => {
            const url = new URL(link.href);
            return url.pathname === location.pathname && url.search === location.search && url.hash === location.hash;
        });
        if (!current) return;
        links.forEach(link => { link.classList.toggle('active',link === current); link.removeAttribute('aria-current'); });
        current.setAttribute('aria-current','location');
    }
    window.addEventListener('hashchange',highlightSection);
    highlightSection();
})();
</script>
@stack('scripts')
@include('layouts.partials.whatsapp-button')
</body>
</html>