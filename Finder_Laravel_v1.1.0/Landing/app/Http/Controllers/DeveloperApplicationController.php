<?php
namespace App\Http\Controllers;
use App\Models\{DeveloperApplication,Developer,User};
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class DeveloperApplicationController extends Controller {
    public function create(Request $request) {
        $application=DeveloperApplication::with('developer')->where('user_id',$request->user()->id)->first();
        return view('account.developer-application',compact('application'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'company_name'=>['required','string','max:150'], 'city'=>['required','string','max:100'],
            'phone'=>['required','string','max:30','regex:/^[+0-9 ()-]+$/'],
            'website'=>['nullable','url:http,https','max:500'], 'description'=>['required','string','max:5000'],
        ]);
        DB::transaction(function () use ($request,$data) {
            $user=User::lockForUpdate()->findOrFail($request->user()->id);
            abort_unless($user->is_active && !$user->requiresRegistrationVerification(),403);
            $application=DeveloperApplication::where('user_id',$user->id)->lockForUpdate()->first();
            if ($application && $application->status!=='rejected') throw ValidationException::withMessages(['application'=>'Your company registration is already submitted. Check its status below.']);
            $application ??= new DeveloperApplication;
            $application->fill($data)->forceFill(['user_id'=>$user->id,'status'=>'pending','review_notes'=>null,'reviewed_by'=>null,'reviewed_at'=>null])->save();
        });
        return redirect()->route('account.developer-application')->with('success','Your company registration has been submitted for admin review.');
    }
    private function context(Request $request): array { return ['role'=>'admin','roles'=>app(DashboardAccess::class)->roles($request->user()),'title'=>'Developer registrations']; }
    public function index(Request $request) {
        $data=$request->validate(['status'=>['nullable','in:pending,approved,rejected']]);
        $status=$data['status'] ?? 'pending';
        $applications=DeveloperApplication::with('user')->where('status',$status)->latest('updated_at')->paginate(15)->withQueryString();
        return view('admin.developer-applications.index',$this->context($request)+compact('applications','status'));
    }
    public function show(Request $request, DeveloperApplication $application) {
        $application->load('user','reviewer','developer');
        return view('admin.developer-applications.show',$this->context($request)+compact('application'));
    }
    public function review(Request $request, DeveloperApplication $application) {
        $data=$request->validate(['decision'=>['required','in:approved,rejected'],'review_notes'=>['required','string','max:2000']]);
        DB::transaction(function () use ($request,$application,$data) {
            $actor=User::lockForUpdate()->findOrFail($request->user()->id);
            abort_unless($actor->is_active && $actor->hasRole('admin'),403);
            $user=User::lockForUpdate()->findOrFail($application->user_id);
            $record=DeveloperApplication::lockForUpdate()->findOrFail($application->id);
            if ($record->status!=='pending') throw ValidationException::withMessages(['application'=>'This registration has already been reviewed.']);
            if ($data['decision']==='approved') {
                if (!$user->is_active || $user->requiresRegistrationVerification()) throw ValidationException::withMessages(['application'=>'The applicant must have an active, verified account.']);
                // Private contact details stay in the application. Admins control directory publication.
                $developer=Developer::create(['name'=>$record->company_name,'city'=>$record->city,'website'=>$record->website,'description'=>$record->description,'is_published'=>false]);
                $record->developer_id=$developer->id;
            }
            $record->forceFill(['status'=>$data['decision'],'review_notes'=>$data['review_notes'],'reviewed_by'=>$actor->id,'reviewed_at'=>now()])->save();
        });
        return redirect()->route('admin.developer-applications.show',$application)->with('success','Review saved. Approved companies can be prepared and published through Developer profiles.');
    }
}
