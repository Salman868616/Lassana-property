<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Developer, Property};
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class DeveloperController extends Controller {
    private function context(Request $request): array { return ['role'=>'admin','roles'=>app(DashboardAccess::class)->roles($request->user()),'title'=>'Developer profiles']; }
    public function index(Request $request) {
        return view('admin.developers.index', $this->context($request)+['developers'=>Developer::withCount('properties')->orderBy('name')->paginate(15)]);
    }
    public function create(Request $request) { return $this->form($request, new Developer); }
    public function edit(Request $request, Developer $developer) { return $this->form($request,$developer); }
    private function form(Request $request, Developer $developer) {
        $properties = Property::where(fn ($q) => $q->whereNull('developer_id')->when($developer->exists, fn ($q) => $q->orWhere('developer_id',$developer->id)))->orderBy('title')->get(['id','title','property_code','developer_id','status']);
        return view('admin.developers.form',$this->context($request)+compact('developer','properties'));
    }
    public function store(Request $request) { return $this->save($request,new Developer); }
    public function update(Request $request, Developer $developer) { return $this->save($request,$developer); }
    private function save(Request $request, Developer $developer) {
        $data = $request->validate([
            'name'=>['required','string','max:150'], 'description'=>['nullable','string','max:5000'],
            'city'=>['nullable','string','max:100'], 'email'=>['nullable','email','max:255'],
            'phone'=>['nullable','string','max:30','regex:/^[+0-9 ()-]+$/'],
            'website'=>['nullable','url:http,https','max:500'], 'is_published'=>['required','boolean'],
            'property_ids'=>['sometimes','array'], 'property_ids.*'=>['required','integer','distinct'],
        ]);
        $ids = array_map('intval',$data['property_ids'] ?? []); unset($data['property_ids']);
        DB::transaction(function () use ($developer,$data,$ids) {
            if ($developer->exists) Developer::whereKey($developer->id)->lockForUpdate()->firstOrFail();
            $selected = Property::whereIn('id',$ids)->lockForUpdate()->get();
            if ($selected->count() !== count($ids) || $selected->contains(fn ($p) => $p->developer_id !== null && (!$developer->exists || $p->developer_id !== $developer->id))) {
                throw ValidationException::withMessages(['property_ids'=>'Choose available properties or properties already linked to this developer.']);
            }
            $developer->fill($data)->save();
            Property::where('developer_id',$developer->id)->whereNotIn('id',$ids)->update(['developer_id'=>null]);
            Property::whereIn('id',$ids)->update(['developer_id'=>$developer->id]);
        });
        return redirect()->route('admin.developers.edit',$developer)->with('success','Developer profile saved.');
    }
}
