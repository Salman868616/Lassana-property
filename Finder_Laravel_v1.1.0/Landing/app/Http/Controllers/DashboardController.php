<?php

namespace App\Http\Controllers;

use App\Models\CrmLead;
use App\Models\PropertyEnquiry;
use App\Models\PropertyViewing;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private DashboardAccess $access) {}

    public function index(Request $request)
    {
        $roles = $this->access->roles($request->user());
        abort_if($roles === [], 403, 'No dashboard role has been assigned. Please contact an administrator.');

        $priorityRoles = array_intersect(['admin', 'sales', 'verification', 'agent', 'seller', 'buyer'], array_keys($roles));
        $landingRole = reset($priorityRoles);

        $request->session()->keep('success');
        return redirect()->route('dashboard.role', ['role' => $landingRole]);
    }

    public function show(Request $request, string $role)
    {
        $user = $request->user();
        $this->access->authorize($user, $role);
        if ($role === 'admin' && $request->query('section') === 'reports') {
            return redirect()->route('admin.reports.index');
        }
        // Buyer enquiries are handled by the team, never exposed in the seller workspace.
        abort_if($role === 'seller' && $request->query('tab') === 'enquiries', 403);
        $allowedTabs = match($role) {
            'admin'=>['overview','leads','requests','enquiries','viewings'],
            'seller'=>['overview','properties'],
            'verification'=>['overview','properties'],
            'buyer'=>['overview','saved','requests','viewings'],
            default=>['overview','properties','leads','requests','enquiries','viewings','performance'],
        };
        $request->validate(['tab'=>['nullable',\Illuminate\Validation\Rule::in($allowedTabs)]]);
        $dashboardTab = $request->query('tab') ?: 'overview';
        if (in_array($role,['admin','sales','agent'],true) && ($request->filled('lead_status') || $request->filled('lead_queue'))) $dashboardTab = 'leads';
        if ($role === 'admin' && $request->query('section') === 'leads' && $dashboardTab === 'overview') $dashboardTab = 'leads';
        $roles = $this->access->roles($user);
        $title = $dashboardTab === 'overview' ? $roles[$role].' dashboard' : match($dashboardTab) { 'properties'=>'Properties', 'leads'=>'Monitor leads', 'requests'=>'Property requests', 'enquiries'=>'Enquiries', 'viewings'=>'Viewings', 'saved'=>'Saved properties', 'performance'=>'Sales overview' };
        $propertyQuery = $this->access->properties($user, $role);
        if ($role === 'verification') {
            // Pending checks first, then verified and historical listings.
            $propertyQuery->orderByRaw("CASE WHEN status = 'under_review' AND verification_level = 'unverified' THEN 0 WHEN status = 'under_review' THEN 1 WHEN status = 'submitted' THEN 2 ELSE 3 END")
                ->orderBy('updated_at');
        }
        $propertyCount = (clone $propertyQuery)->count();
        $properties = $propertyQuery->latest('id')->paginate(10, ['*'], 'properties_page');
        $salesOverview = null;
        $leadFilters = [];
        if (in_array($role,['admin','sales','agent'],true)) {
            $leadFilters = $request->validate([
                'lead_status'=>['nullable',\Illuminate\Validation\Rule::in(array_keys(\App\Services\LeadStages::LABELS))],
                'lead_queue'=>['nullable','in:due,today,hot,unassigned'],
            ]);
            $salesOverview = app(\App\Services\SalesOverview::class)->build($user,$role);
        }
        $savedProperties = $role === 'buyer'
            ? \App\Models\SavedProperty::where('user_id',$user->id)
                ->with(['property'=>fn ($q)=>$q->where('status','published')])
                ->latest('id')->paginate(12,['*'],'saved_page') : null;
        $propertyRequests = null;
        if (in_array($role,['admin','sales','agent','buyer'],true)) {
            $requests=\App\Models\PropertyRequest::with(['customer','crmLead']);
            if ($role==='buyer') $requests->where('customer_id',$user->id);
            if ($role==='agent') $requests->whereHas('crmLead',fn ($q)=>$q->where('assigned_to',$user->id));
            $propertyRequests=$requests->latest('id')->paginate(10,['*'],'requests_page');
        }
        $leads = $enquiries = $viewings = null;
        $leadCount = $enquiryCount = $viewingCount = 0;

        if (in_array($role, ['admin', 'sales', 'agent'], true)) {
            $query = CrmLead::with(['property','enquiry','assignee','propertyRequest.customer','buyerServiceRequest.customer']);
            if ($role === 'agent') {
                $query->where('assigned_to', $user->id);
            }
            $leadCount = (clone $query)->count();
            if ($leadFilters['lead_status'] ?? null) $query->where('status',$leadFilters['lead_status']);
            if ($queue=$leadFilters['lead_queue'] ?? null) {
                $query->whereIn('status',\App\Services\LeadStages::OPEN);
                if ($queue==='due') $query->whereNotNull('follow_up_at')->where('follow_up_at','<=',now());
                if ($queue==='hot') $query->whereIn('status',['interested','negotiation']);
                if ($queue==='unassigned') $query->whereNull('assigned_to');
                if ($queue==='today') {
                    $day=\Carbon\CarbonImmutable::now('Asia/Colombo')->startOfDay();
                    $query->where('follow_up_at','>=',$day->utc())->where('follow_up_at','<',$day->addDay()->utc());
                }
            }
            $leads = $query->orderByRaw('follow_up_at IS NULL')->orderBy('follow_up_at')->orderByDesc('id')->paginate(10, ['*'], 'leads_page');
        }

        if (in_array($role, ['admin', 'sales', 'agent'], true)) {
            $query = PropertyEnquiry::with(['property','crmLead']);
            if ($role === 'agent') {
                $query->whereHas('crmLead', fn ($lead) => $lead->where('assigned_to', $user->id));
            }
            $enquiryCount = (clone $query)->count();
            $enquiries = $query->latest('id')->paginate(10, ['*'], 'enquiries_page');
        }

        if (in_array($role, ['admin', 'sales', 'agent', 'buyer'], true)) {
            $query = PropertyViewing::query();
            if ($role === 'agent') {
                $query->where('assigned_to', $user->id);
            } elseif ($role === 'buyer') {
                $query->where('customer_id', $user->id);
            }
            $viewingCount = (clone $query)->count();
            $viewings = $query->with('assignee:id,name')->orderByDesc('scheduled_at')->paginate(10, ['*'], 'viewings_page');
        }

        $managementOverview = null;
        $adminData = null;
        if ($role === 'admin') {
            $request->validate(['section'=>['nullable','in:overview,management,leads,revenue,reports']]);
            $section = $request->query('section','overview');
            if ($section === 'management') $managementOverview = app(\App\Services\ManagementOverview::class)->build($user);
            if ($request->filled('lead_status') || $request->filled('lead_queue')) $section = 'leads';
            if (in_array($dashboardTab,['leads','requests','enquiries','viewings'],true)) $section = 'leads';
            $title = match($section) { 'management'=>'Management dashboard', 'leads'=>match($dashboardTab) { 'requests'=>'Property requests', 'enquiries'=>'Enquiries', 'viewings'=>'Viewings', default=>'Monitor leads' }, 'revenue'=>'Revenue', 'reports'=>'Reports', default=>'Admin dashboard' };
            $pending = $this->access->properties($user,$role)->whereIn('status',['submitted','under_review']);
            $upcoming = PropertyViewing::where('status','scheduled')->where('scheduled_at','>=',now());
            $adminData = [
                'section'=>$section,
                'pendingCount'=>(clone $pending)->count(),
                'reviews'=>(clone $pending)->oldest('updated_at')->limit(5)->get(),
                'upcomingCount'=>(clone $upcoming)->count(),
                'upcoming'=>(clone $upcoming)->with(['property','assignee'])->orderBy('scheduled_at')->limit(5)->get(),
            ];
        }
        return view('dashboard.index', compact('managementOverview', 'dashboardTab', 'adminData', 'savedProperties', 'propertyRequests', 'salesOverview', 'leadFilters', 'roles', 'role', 'title', 'properties', 'propertyCount', 'leads', 'leadCount', 'enquiries', 'enquiryCount', 'viewings', 'viewingCount'));
    }

    public function property(Request $request, string $role, int $property)
    {
        // Scope the query before lookup, including when someone manually changes the URL.
        $property = $this->access->properties($request->user(), $role)
            ->with(['propertyCategory', 'images', 'details', 'owner:id,name', 'agent:id,name'])
            ->findOrFail($property);
        if (in_array($role, ['admin', 'seller', 'agent', 'verification'], true)) {
            $property->load(['documents.review.reviewer', 'verifications' => fn ($query) => $query->latest('id')]);
        }
        $statusHistory = in_array($role, ['admin', 'seller', 'agent', 'verification'], true)
            ? \App\Models\PropertyStatusHistory::where('property_id', $property->id)->latest('id')->paginate(20, ['*'], 'history_page')->withQueryString()
            : null;
        $roles = $this->access->roles($request->user());
        $title = $property->title;

        return view('dashboard.property', compact('property', 'role', 'roles', 'title', 'statusHistory'));
    }
}
