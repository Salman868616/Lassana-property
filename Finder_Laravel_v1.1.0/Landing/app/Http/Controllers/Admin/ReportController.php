<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Property, User, CrmLead};
use App\Services\{DashboardAccess, LeadStages, LocationCatalog};
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        [$type, $filters, $query] = $this->report($request);
        $records = $query->orderByDesc('id')->paginate(25)->withQueryString();
        $headers = $this->headers($type);
        $rows = $records->getCollection()->map(fn ($record) => $this->row($type, $record));
        $districts = array_unique(array_merge(array_keys(LocationCatalog::options()), Property::whereNotNull('district')->distinct()->pluck('district')->all()));
        sort($districts);
        $assignees = User::whereHas('roles', fn ($q) => $q->whereIn('name', ['agent','sales']))
            ->orWhereHas('assignedCrmLeads')->orderBy('name')->get(['id','name']);
        return view('admin.reports', compact('type','filters','records','headers','rows','districts','assignees'));
    }

    public function download(Request $request)
    {
        [$type, $filters, $query] = $this->report($request);
        $filename = 'lassana-'.$type.'-'.now('Asia/Colombo')->format('Y-m-d-His').'.csv';
        return response()->streamDownload(function () use ($type, $query) {
            $stream = fopen('php://output', 'w');
            fwrite($stream, "\xEF\xBB\xBF");
            fputcsv($stream, $this->headers($type), ',', '"', '');
            foreach ($query->lazyById(500) as $record) {
                $row = array_map(function ($value) {
                    $text = (string) ($value ?? '');
                    // Prevent spreadsheet applications interpreting user input as formulas.
                    return preg_match('/^[\s\x00-\x1f]*[=+@-]|^[\t\r\n]/u', $text) ? "'".$text : $text;
                }, $this->row($type, $record));
                fputcsv($stream, $row, ',', '"', '');
            }
            fclose($stream);
        }, $filename, ['Content-Type'=>'text/csv; charset=UTF-8','Cache-Control'=>'private, no-store']);
    }

    private function report(Request $request): array
    {
        $filters = $request->validate([
            'type'=>['nullable',Rule::in(['properties','users','leads'])],
            'from'=>['nullable','date_format:Y-m-d'],
            'to'=>array_filter(['nullable','date_format:Y-m-d', $request->filled('from') ? 'after_or_equal:from' : null]),
            'category'=>['nullable',Rule::in(['land','house','apartment','villa','commercial'])],
            'district'=>['nullable','string','max:100'],
            'property_status'=>['nullable',Rule::in(['draft','submitted','under_review','approved','published','sold','archived'])],
            'role'=>['nullable',Rule::in(array_keys(DashboardAccess::ROLES))],
            'account_status'=>['nullable','in:active,suspended'],
            'stage'=>['nullable',Rule::in(array_keys(LeadStages::LABELS))],
            'assignee'=>['nullable','regex:/^(unassigned|[1-9][0-9]*)$/'],
        ]);
        $type = $filters['type'] ?? 'properties';
        $query = match ($type) {
            'users'=>User::with('roles'),
            'leads'=>CrmLead::with(['property','assignee']),
            default=>Property::with(['owner','agent']),
        };
        foreach (['from','to'] as $bound) {
            if (!empty($filters[$bound])) {
                $date = CarbonImmutable::createFromFormat('!Y-m-d', $filters[$bound], 'Asia/Colombo');
                if ($bound === 'to') $date = $date->addDay();
                $query->where('created_at', $bound === 'from' ? '>=' : '<', $date->setTimezone(config('app.timezone', 'UTC')));
            }
        }
        if ($type === 'properties') {
            foreach (['category'=>'category','district'=>'district','property_status'=>'status'] as $filter=>$column) {
                if (!empty($filters[$filter])) $query->where($column, $filters[$filter]);
            }
        } elseif ($type === 'users') {
            if (!empty($filters['role'])) $query->whereHas('roles', fn ($q) => $q->where('name', $filters['role']));
            if (!empty($filters['account_status'])) $query->where('is_active', $filters['account_status'] === 'active');
        } else {
            if (!empty($filters['stage'])) $query->where('status', $filters['stage']);
            if (!empty($filters['assignee'])) {
                $filters['assignee'] === 'unassigned' ? $query->whereNull('assigned_to') : $query->where('assigned_to', $filters['assignee']);
            }
        }
        return [$type, $filters, $query];
    }

    private function headers(string $type): array
    {
        return match ($type) {
            'users'=>['User ID','Name','Email','Roles','Account status','Registered (Sri Lanka)'],
            'leads'=>['Lead ID','Property','Stage','Assigned to','Source','Created (Sri Lanka)'],
            default=>['Property ID','Title','Category','District','City','Status','Seller / owner','Agent','Currency','Price','Created (Sri Lanka)'],
        };
    }

    private function row(string $type, $record): array
    {
        $date = $record->created_at?->copy()->timezone('Asia/Colombo')->format('Y-m-d H:i:s') ?? '';
        return match ($type) {
            'users'=>[$record->id,$record->name,$record->email,$record->roles->pluck('name')->sort()->implode(', '),$record->is_active ? 'Active' : 'Suspended',$date],
            'leads'=>[$record->id,$record->property?->property_code ?? 'No linked property',LeadStages::label($record->status),$record->assignee?->name ?? 'Unassigned',LeadStages::SOURCES[$record->source] ?? $record->source,$date],
            default=>[$record->property_code,$record->title,ucfirst($record->category),$record->district,$record->city,ucfirst(str_replace('_',' ',$record->status)),$record->owner?->name ?? 'Unavailable',$record->agent?->name ?? 'Not assigned',$record->currency,$record->total_price,$date],
        };
    }
}
