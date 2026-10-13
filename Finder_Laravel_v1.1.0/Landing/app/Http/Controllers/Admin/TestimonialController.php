<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
class TestimonialController extends Controller {
    private function context(Request $request): array { return ['role'=>'admin','roles'=>app(DashboardAccess::class)->roles($request->user()),'title'=>'Customer testimonials']; }
    public function index(Request $request) {
        return view('admin.testimonials.index',$this->context($request)+['testimonials'=>Testimonial::orderBy('display_order')->latest('id')->paginate(15)]);
    }
    public function create(Request $request) { return view('admin.testimonials.form',$this->context($request)+['testimonial'=>new Testimonial]); }
    public function edit(Request $request, Testimonial $testimonial) { return view('admin.testimonials.form',$this->context($request)+compact('testimonial')); }
    public function store(Request $request) { return $this->save($request,new Testimonial); }
    public function update(Request $request, Testimonial $testimonial) { return $this->save($request,$testimonial); }
    private function save(Request $request, Testimonial $testimonial) {
        $data=$request->validate([
            'customer_name'=>['required','string','max:150'], 'context'=>['nullable','string','max:150'],
            'quote'=>['required','string','max:1500'], 'is_published'=>['required','boolean'],
            'consent_confirmed'=>['required','boolean','accepted_if:is_published,1'],
            'consent_notes'=>['nullable','required_if:is_published,1','string','max:2000'],
            'display_order'=>['required','integer','min:0','max:9999'],
        ]);
        $testimonial->fill($data);
        $testimonial->updated_by=$request->user()->id;
        $testimonial->save();
        return redirect()->route('admin.testimonials.edit',$testimonial)->with('success','Testimonial saved. Only published quotes with confirmed permission appear on the homepage.');
    }
}
