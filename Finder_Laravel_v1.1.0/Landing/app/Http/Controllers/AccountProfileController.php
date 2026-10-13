<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class AccountProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user=$request->user();
        $roles=app(DashboardAccess::class)->roles($user);
        return view('account.account-profile',compact('user','roles'));
    }
    public function update(Request $request)
    {
        $data=$request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255',Rule::unique('users','email')->ignore($request->user()->id)],
            'phone'=>config('sms.enabled') ? ['required','string','max:30',new \App\Rules\SriLankaMobileNumber] : ['nullable','string','max:30'],
            'city'=>['nullable','string','max:100'],
            'bio'=>['nullable','string','max:2000'],
            'profile_photo'=>['nullable','image','mimes:jpg,jpeg,png,webp','max:2048','dimensions:max_width=4096,max_height=4096'],
            'remove_profile_photo'=>['sometimes','boolean'],
            'agency_name'=>[$request->user()->hasRole('agent') ? 'nullable' : 'prohibited','string','max:150'],
            'service_areas'=>[$request->user()->hasRole('agent') ? 'nullable' : 'prohibited','string','max:500'],
        ]);
        if (config('sms.enabled')) $data['phone'] = \App\Support\SriLankaMobile::normalize($data['phone']);
        $newPhoto = null;
        $oldPhoto = null;
        try {
        $user=DB::transaction(function() use ($request,$data,&$newPhoto,&$oldPhoto){
            $user=User::lockForUpdate()->findOrFail($request->user()->id);
            abort_unless($user->is_active,403);
            abort_unless((int)$user->auth_version === (int)$request->session()->get('auth_version',0),403);
            if (config('sms.enabled') && \App\Support\SriLankaMobile::normalize($user->phone) !== $data['phone']) {
                $request->validate(['current_password'=>['required','current_password']]);
                $user->verified_phone = null;
                $user->phone_verified_at = null;
                $user->remember_token = null;
                $user->auth_version++;
                DB::table('sms_verification_codes')->where('user_id', $user->id)->update(['expires_at' => now()]);
            }
            if($user->email!==$data['email']){
                $request->validate(['current_password'=>['required','current_password']]);
                $user->email_verified_at=null;
                DB::table('email_verification_codes')->where('user_id',$user->id)->delete();
                $user->remember_token=null;
                $user->auth_version++;
            }
            foreach(['name','email','phone','city','bio'] as $field) $user->$field=$data[$field] ?? null;
            if($user->hasRole('agent')){
                foreach(['agency_name','service_areas'] as $field) $user->$field=$data[$field] ?? null;
            }
            if ($request->hasFile('profile_photo') || $request->boolean('remove_profile_photo')) {
                $oldPhoto = $user->profile_photo_path;
                if ($request->hasFile('profile_photo')) {
                    $newPhoto = $request->file('profile_photo')->store('profile-photos/'.$user->id, 'public');
                    if (!$newPhoto) throw new \RuntimeException('Unable to save the profile picture.');
                }
                $user->profile_photo_path = $newPhoto;
            }
            $user->save();
            return $user;
        });
        } catch (\Throwable $exception) {
            if ($newPhoto) Storage::disk('public')->delete($newPhoto);
            throw $exception;
        }
        if ($oldPhoto && preg_match('#^profile-photos/'. $user->id .'/[a-zA-Z0-9_-]+\.(jpg|jpeg|png|webp)$#', $oldPhoto)) {
            Storage::disk('public')->delete($oldPhoto);
        }
        $request->session()->put('auth_version',$user->auth_version);
        if (config('sms.enabled') && ($user->wasChanged('email') || !$user->hasVerifiedPhone())) {
            $request->session()->forget(['otp_verified', 'sms_verified', 'sms_otp_challenge', 'sms_enrollment_email']);
        }
        if ($user->requiresRegistrationVerification()) return redirect()->route('verification.notice');
        return redirect()->route('account-profile')->with('success','Your profile has been updated.');
    }
}
