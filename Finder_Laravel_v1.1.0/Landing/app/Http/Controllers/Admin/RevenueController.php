<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Property, RevenuePayment};
use App\Services\{DashboardAccess, RevenueSummary};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\{Rule, ValidationException};
class RevenueController extends Controller {
    private function query(Request $request): array {
        app(DashboardAccess::class)->authorize($request->user(), 'admin');
        $filters = $request->validate([
            'from'=>['nullable','date_format:Y-m-d'],
            'to'=>['nullable','date_format:Y-m-d', ...($request->filled('from') ? ['after_or_equal:from'] : [])],
            'type'=>['nullable',Rule::in(array_keys(RevenuePayment::TYPES))],
        ]);
        $query = RevenuePayment::query();
        if (!empty($filters['from'])) $query->whereDate('paid_on','>=',$filters['from']);
        if (!empty($filters['to'])) $query->whereDate('paid_on','<=',$filters['to']);
        if (!empty($filters['type'])) $query->where('type',$filters['type']);
        return [$query,$filters];
    }
    public function index(Request $request) {
        [$query,$filters] = $this->query($request);
        $totals = RevenueSummary::totals($query);
        $payments = $query->with(['recorder','voider'])->orderByDesc('paid_on')->orderByDesc('id')->paginate(20)->appends($filters);
        return view('admin.revenue',compact('payments','totals','filters'));
    }
    public function store(Request $request) {
        app(DashboardAccess::class)->authorize($request->user(), 'admin');
        $request->merge(['reference'=>strtoupper(trim((string)$request->input('reference'))), 'property_code'=>strtoupper(trim((string)$request->input('property_code')))]);
        $data = $request->validate([
            'property_code'=>['required','string','max:100'],
            'type'=>['required',Rule::in(array_keys(RevenuePayment::TYPES))],
            'amount'=>['required','numeric','gt:0','max:999999999999.99','regex:/^\d+(\.\d{1,2})?$/'],
            'paid_on'=>['required','date_format:Y-m-d','before_or_equal:'.now('Asia/Colombo')->toDateString()],
            'reference'=>['required','string','max:100','unique:revenue_payments,reference'],
            'method'=>['required',Rule::in(array_keys(RevenuePayment::METHODS))],
            'notes'=>['nullable','string','max:2000'],
        ]);
        try {
        DB::transaction(function () use ($data,$request) {
            $property = Property::where('property_code',$data['property_code'])->lockForUpdate()->first();
            if (!$property) throw ValidationException::withMessages(['property_code'=>'Enter an existing property reference.']);
            RevenuePayment::create([
                'property_id'=>$property->id,'property_reference'=>$property->property_code,
                'type'=>$data['type'],'amount'=>$data['amount'],'paid_on'=>$data['paid_on'],
                'reference'=>$data['reference'],'method'=>$data['method'],'notes'=>$data['notes'] ?? null,
                'currency'=>'LKR','recorded_by'=>$request->user()->id,
            ]);
        });
        } catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
            throw ValidationException::withMessages(['reference'=>'This payment reference has already been recorded.']);
        }
        return redirect()->route('admin.revenue.index')->with('success','Payment recorded.');
    }
    public function void(Request $request, RevenuePayment $payment) {
        app(DashboardAccess::class)->authorize($request->user(), 'admin');
        $data = $request->validate(['void_reason'=>['required','string','min:5','max:2000']]);
        DB::transaction(function () use ($payment,$data,$request) {
            $record = RevenuePayment::lockForUpdate()->findOrFail($payment->id);
            if ($record->voided_at) throw ValidationException::withMessages(['void_reason'=>'This payment has already been voided.']);
            $record->update(['voided_at'=>now(),'voided_by'=>$request->user()->id,'void_reason'=>$data['void_reason']]);
        });
        return back()->with('success','Payment voided and excluded from revenue totals.');
    }
    public function download(Request $request) {
        [$query] = $this->query($request);
        return response()->streamDownload(function () use ($query) {
            $file = tempnam(sys_get_temp_dir(), 'lp-revenue-');
            if ($file === false) throw new \RuntimeException('Unable to create report.');
            try {
                $rows = (function () use ($query) {
                    foreach ($query->with('recorder')->orderBy('id')->lazy(200) as $p) {
                        $date = new \DateTimeImmutable($p->paid_on->format('Y-m-d'), new \DateTimeZone('UTC'));
                        $epoch = new \DateTimeImmutable('1899-12-30', new \DateTimeZone('UTC'));
                        yield [$p->reference,$p->property_reference,RevenuePayment::TYPES[$p->type],$p->amount,$p->currency,(int)$epoch->diff($date)->format('%r%a'),RevenuePayment::METHODS[$p->method],$p->voided_at ? 'Voided' : 'Recorded',$p->recorder?->name,$p->notes,$p->void_reason];
                    }
                })();
                \App\Services\RevenueWorkbook::write($rows, $file);
                readfile($file);
            } finally {
                if (is_file($file)) unlink($file);
            }
        },'revenue-'.now('Asia/Colombo')->format('Y-m-d').'.xlsx',['Content-Type'=>'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']);
    }
}
