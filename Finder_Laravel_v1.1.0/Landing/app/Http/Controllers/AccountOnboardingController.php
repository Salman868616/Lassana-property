<?php
namespace App\Http\Controllers;
use App\Models\{User,Role,AgentApplication};
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class AccountOnboardingController extends Controller
{
    public function seller(Request $request)
    {
        DB::transaction(function () use ($request) {
            Role::where('name','admin')->lockForUpdate()->firstOrFail();
            $user=User::lockForUpdate()->findOrFail($request->user()->id);
            abort_unless($user->is_active && !$user->requiresRegistrationVerification() && (int)$user->auth_version === (int)$request->session()->get('auth_version',0),403);
            if ($user->hasRole('seller')) return;
            $before=$user->roles()->orderBy('name')->pluck('name')->all();
            $user->roles()->syncWithoutDetaching([Role::where('name','seller')->firstOrFail()->id]);
            $after=$user->roles()->orderBy('name')->pluck('name')->all();
            $user->auth_version++;
            $user->remember_token=null;
            $user->save();
            DB::table('user_access_changes')->insert(['user_id'=>$user->id,'performed_by'=>$user->id,
                'before'=>json_encode(['roles'=>$before,'active'=>true]),'after'=>json_encode(['roles'=>$after,'active'=>true]),
                'reason'=>'Requested seller access.','created_at'=>now(),'updated_at'=>now()]);
            $request->session()->put('auth_version',$user->auth_version);
        });
        return redirect()->route('dashboard.role','seller')->with('success','Seller access is ready.');
    }
    public function create(Request $request)
    {
        $user=$request->user();
        $applications=AgentApplication::where('user_id',$user->id)->latest('id')->paginate(5);
        return view('account.agent-application',compact('user','applications'));
    }
    public function store(Request $request)
    {
        $data=$request->validate(['phone'=>['required','string','max:30'],
            'agency_name'=>['nullable','string','max:150'],'service_areas'=>['required','string','max:500'],
            'bio'=>['required','string','max:2000']]);
        DB::transaction(function () use ($request,$data) {
            $user=User::lockForUpdate()->findOrFail($request->user()->id);
            abort_unless($user->is_active && !$user->requiresRegistrationVerification() && (int)$user->auth_version === (int)$request->session()->get('auth_version',0),403);
            if ($user->hasRole('agent')) throw ValidationException::withMessages(['application'=>'You already have agent access.']);
            if (AgentApplication::where('user_id',$user->id)->where('status','pending')->exists())
                throw ValidationException::withMessages(['application'=>'Your application is already awaiting review.']);
            $user->agentApplications()->create($data);
        });
        return redirect()->route('account.agent-application')->with('success','Your application has been submitted for admin review.');
    }
    public function index(Request $request)
    {
        $filters=$request->validate(['status'=>['nullable','in:pending,approved,rejected']]);
        $status=$filters['status'] ?? 'pending';
        $applications=AgentApplication::with('user')->where('status',$status)->latest('id')->paginate(20)->withQueryString();
        return view('dashboard.users.applications', ['applications'=>$applications,'status'=>$status,
            'role'=>'admin','roles'=>app(DashboardAccess::class)->roles($request->user()),'title'=>'Agent applications']);
    }
    public function show(Request $request, AgentApplication $application)
    {
        $application->load('user','reviewer');
        return view('dashboard.users.application', ['application'=>$application,
            'role'=>'admin','roles'=>app(DashboardAccess::class)->roles($request->user()),'title'=>'Review agent application']);
    }
    public function review(Request $request, AgentApplication $application)
    {
        $data=$request->validate(['decision'=>['required','in:approved,rejected'],'review_notes'=>['required','string','max:2000']]);
        DB::transaction(function () use ($request,$application,$data) {
            Role::where('name','admin')->lockForUpdate()->firstOrFail();
            $actor=User::lockForUpdate()->findOrFail($request->user()->id);
            abort_unless($actor->is_active && $actor->hasRole('admin') && (int)$actor->auth_version === (int)$request->session()->get('auth_version',0),403);
            $user=User::lockForUpdate()->findOrFail($application->user_id);
            $record=AgentApplication::lockForUpdate()->findOrFail($application->id);
            if ($record->status!=='pending') throw ValidationException::withMessages(['application'=>'This application has already been reviewed.']);
            if ($data['decision']==='approved') {
                if (!$user->is_active || $user->requiresRegistrationVerification())
                    throw ValidationException::withMessages(['application'=>'The applicant must have an active account and complete signup verification.']);
                if ($user->hasRole('agent')) throw ValidationException::withMessages(['application'=>'This account already has agent access.']);
                $before=$user->roles()->orderBy('name')->pluck('name')->all();
                $user->roles()->syncWithoutDetaching([Role::where('name','agent')->firstOrFail()->id]);
                $after=$user->roles()->orderBy('name')->pluck('name')->all();
                foreach (['phone','agency_name','service_areas','bio'] as $field) $user->$field=$record->$field;
                $user->auth_version++;
                $user->remember_token=null;
                $user->save();
                DB::table('user_access_changes')->insert(['user_id'=>$user->id,'performed_by'=>$actor->id,
                    'before'=>json_encode(['roles'=>$before,'active'=>true]),'after'=>json_encode(['roles'=>$after,'active'=>true]),
                    'reason'=>'Agent application #'.$record->id.' approved: '.$data['review_notes'],'created_at'=>now(),'updated_at'=>now()]);
                if ($actor->id===$user->id) $request->session()->put('auth_version',$user->auth_version);
            }
            $record->forceFill(['status'=>$data['decision'],'review_notes'=>$data['review_notes'],
                'reviewed_by'=>$actor->id,'reviewed_at'=>now()])->save();
        });
        return redirect()->route('admin.agent-applications.show',$application)->with('success','Application decision recorded. Approved applicants must sign in again.');
    }
}
