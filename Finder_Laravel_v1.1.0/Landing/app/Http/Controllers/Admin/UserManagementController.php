<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate(['q'=>['nullable','string','max:150'],
            'role'=>['nullable',Rule::in(array_keys(DashboardAccess::ROLES))],
            'status'=>['nullable','in:active,suspended']]);
        $users = User::with('roles')
            ->withExists(['agentApplications as has_pending_agent_application' => fn ($query) => $query->where('status', 'pending')])
            ->when($filters['q'] ?? null, fn ($q,$term) => $q->where(fn ($q) => $q->where('name','like','%'.$term.'%')->orWhere('email','like','%'.$term.'%')))
            ->when($filters['role'] ?? null, fn ($q,$role) => $q->whereHas('roles',fn ($q) => $q->where('name',$role)))
            ->when($filters['status'] ?? null, fn ($q,$status) => $q->where('is_active',$status === 'active'))
            ->orderBy('name')->paginate(20)->withQueryString();
        return view('dashboard.users.index', ['users'=>$users,'filters'=>$filters,
            'role'=>'admin','roles'=>app(DashboardAccess::class)->roles($request->user()),'title'=>'User management']);
    }

    public function edit(Request $request, User $user)
    {
        $user->load('roles');
        $history = DB::table('user_access_changes')->join('users as actors','actors.id','=','user_access_changes.performed_by')
            ->where('user_access_changes.user_id',$user->id)->select('user_access_changes.*','actors.name as actor_name')
            ->orderByDesc('user_access_changes.id')->paginate(10);
        return view('dashboard.users.edit', ['account'=>$user,'history'=>$history,
            'role'=>'admin','roles'=>app(DashboardAccess::class)->roles($request->user()),'title'=>'Manage '.$user->name]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'roles'=>['required','array','min:1'],
            'roles.*'=>['required','string','distinct',Rule::in(array_keys(DashboardAccess::ROLES))],
            'is_active'=>['required','boolean'], 'reason'=>['required','string','max:2000'],
        ]);
        DB::transaction(function () use ($request,$user,$data) {
            // Serialize access changes, including concurrent changes to administrator accounts.
            Role::where('name','admin')->lockForUpdate()->firstOrFail();
            $actor = User::lockForUpdate()->findOrFail($request->user()->id);
            abort_unless($actor->is_active && $actor->hasRole('admin'),403);
            $account = User::lockForUpdate()->findOrFail($user->id);
            $newRoles = $data['roles']; sort($newRoles);
            $active = (bool) $data['is_active'];
            if ($account->id === $actor->id && (! $active || ! in_array('admin',$newRoles,true))) {
                throw ValidationException::withMessages(['roles'=>'You cannot suspend yourself or remove your own Admin role.']);
            }
            $oldRoles = $account->roles()->orderBy('name')->pluck('name')->all();
            $before = ['roles'=>$oldRoles,'active'=>(bool)$account->is_active];
            $after = ['roles'=>$newRoles,'active'=>$active];
            if ($before === $after) return;
            $roleIds = Role::whereIn('name',$newRoles)->pluck('id');
            if ($roleIds->count() !== count($newRoles)) {
                throw ValidationException::withMessages(['roles'=>'A selected role is missing. Run the role seeder first.']);
            }
            $account->roles()->sync($roleIds);
            $account->is_active = $active;
            $account->auth_version = (int)$account->auth_version + 1;
            $account->remember_token = null;
            $account->save();
            DB::table('user_access_changes')->insert(['user_id'=>$account->id,'performed_by'=>$actor->id,
                'before'=>json_encode($before),'after'=>json_encode($after),'reason'=>$data['reason'],
                'created_at'=>now(),'updated_at'=>now()]);
            if ($account->id === $actor->id) $request->session()->put('auth_version',$account->auth_version);
        });
        return redirect()->route('admin.users.edit',$user)->with('success','Account access saved. Changed accounts must sign in again.');
    }
}
