<?php
namespace App\Http\Controllers;
use App\Models\Complaint;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class ComplaintController extends Controller {
    private function context(Request $request): array {
        $roles=app(DashboardAccess::class)->roles($request->user());
        // Seller access alone does not include complaints. Keep other assigned roles available.
        $complaintRoles=array_diff_key($roles, ['seller'=>true]);
        abort_if($complaintRoles === [], 403);
        $staff=array_intersect(['admin','sales','verification'],array_keys($complaintRoles));
        return ['roles'=>$roles,'role'=>$staff ? reset($staff) : array_key_first($complaintRoles),
            'title'=>'Complaints'];
    }
    public function index(Request $request) {
        $context=$this->context($request);
        $admin=$request->routeIs('admin.complaints.*');
        $data=$request->validate(['status'=>['nullable',Rule::in(array_keys(Complaint::STATUSES))]]);
        $status=$data['status'] ?? '';
        $items=Complaint::query()->when(!$admin,fn($q)=>$q->where('user_id',$request->user()->id))
            ->when($status,fn($q)=>$q->where('status',$status))->with('user')->latest('id')->paginate(15)->withQueryString();
        return view('dashboard.complaints.index',$context+compact('items','admin','status'));
    }
    public function create(Request $request) {
        return view('dashboard.complaints.create',$this->context($request));
    }
    public function store(Request $request) {
        $this->context($request);
        $data=$request->validate([
            'category'=>['required',Rule::in(['property','service'])],
            'property_reference'=>['nullable','required_if:category,property','string','max:100'],
            'subject'=>['required','string','max:200'],
            'message'=>['required','string','max:5000'],
        ]);
        $item=new Complaint($data);
        $item->user_id=$request->user()->id;
        $item->status='open';
        $item->save();
        return redirect()->route('complaints.show',$item)->with('success','Your complaint has been submitted.');
    }
    public function show(Request $request, int $complaint) {
        $context=$this->context($request);
        $admin=$request->routeIs('admin.complaints.*');
        $item=Complaint::query()->when(!$admin,fn($q)=>$q->where('user_id',$request->user()->id))
            ->with(['user','updates'=>fn($q)=>$q->latest('id'),'updates.reviewer'])->findOrFail($complaint);
        return view('dashboard.complaints.show',$context+compact('item','admin'));
    }
    public function update(Request $request, int $complaint) {
        $data=$request->validate([
            'status'=>['required',Rule::in(array_keys(Complaint::STATUSES))],
            'response'=>['required','string','max:5000'],
        ]);
        DB::transaction(function() use($complaint,$data,$request) {
            $item=Complaint::lockForUpdate()->findOrFail($complaint);
            $item->updates()->create(['reviewer_id'=>$request->user()->id]+$data);
            $item->status=$data['status'];
            $item->save();
        });
        return redirect()->route('admin.complaints.show',$complaint)->with('success','Complaint updated.');
    }
}
