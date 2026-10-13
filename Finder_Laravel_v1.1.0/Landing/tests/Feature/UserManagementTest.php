<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }

    private function member(string $role): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }

    private function change(User $user, array $roles, int $active=1)
    {
        return $this->put('/admin/users/'.$user->id,['roles'=>$roles,'is_active'=>$active,'reason'=>'Testing account access']);
    }

    public function test_only_admins_can_list_read_or_change_accounts(): void
    {
        $target=$this->member('buyer');
        $this->get('/admin/users')->assertRedirect('/account-signin');
        foreach (['seller','agent','buyer','sales','verification'] as $role) {
            $this->actingAs($this->member($role))->get('/admin/users')->assertForbidden();
            $this->get('/admin/users/'.$target->id.'/edit')->assertForbidden();
            $this->change($target,['admin'])->assertForbidden();
        }
        $this->assertFalse($target->hasRole('admin'));
        $this->assertDatabaseCount('user_access_changes',0);
    }

    public function test_admin_can_search_filter_and_replace_roles_with_audit_history(): void
    {
        $admin=$this->member('admin');
        $target=$this->member('buyer');
        $other=$this->member('seller');
        $this->actingAs($admin)->get('/admin/users?q='.urlencode($target->email))->assertOk()->assertSee($target->email)->assertDontSee($other->email);
        $this->change($target,['agent'])->assertSessionHasNoErrors()->assertRedirect('/admin/users/'.$target->id.'/edit');
        $this->assertSame(['agent'],$target->roles()->pluck('name')->all());
        $this->assertSame(1,$target->fresh()->auth_version);
        $this->assertDatabaseHas('user_access_changes',['user_id'=>$target->id,'performed_by'=>$admin->id,'reason'=>'Testing account access']);
        $this->get('/admin/users?role=agent&status=active')->assertOk()->assertSee($target->email)->assertDontSee($other->email);
        $this->get('/admin/users/'.$target->id.'/edit')->assertOk()->assertSee('Testing account access');
        $this->change($target,['agent'])->assertSessionHasNoErrors();
        $this->assertDatabaseCount('user_access_changes',1);
    }

    public function test_self_suspension_and_self_admin_removal_are_rejected(): void
    {
        $admin=$this->member('admin');
        $this->actingAs($admin);
        $this->change($admin,['admin'],0)->assertSessionHasErrors('roles');
        $this->change($admin,['buyer'])->assertSessionHasErrors('roles');
        $this->assertTrue($admin->fresh()->is_active);
        $this->assertTrue($admin->hasRole('admin'));
        $this->assertDatabaseCount('user_access_changes',0);
        $this->change($admin,['admin','sales'])->assertSessionHasNoErrors();
        $this->get('/admin/users')->assertOk();
    }

    public function test_invalid_roles_and_protected_account_fields_are_not_accepted(): void
    {
        $target=$this->member('buyer');
        $this->actingAs($this->member('admin'));
        $this->change($target,[])->assertSessionHasErrors('roles');
        $this->change($target,['superadmin'])->assertSessionHasErrors('roles.0');
        $this->put('/admin/users/'.$target->id,['roles'=>['buyer'],'is_active'=>1])->assertSessionHasErrors('reason');
        $this->put('/admin/users/'.$target->id,['roles'=>['seller'],'is_active'=>1,'reason'=>'Seller onboarding',
            'email'=>'changed@example.test','password'=>'bad-password','auth_version'=>0])->assertSessionHasNoErrors();
        $this->assertSame($target->email,$target->fresh()->email);
        $this->assertSame($target->password,$target->fresh()->password);
    }

    public function test_suspension_blocks_login_and_existing_sessions_and_can_be_reactivated(): void
    {
        \Illuminate\Support\Facades\Notification::fake();
        $target=$this->member('buyer');
        $target->password=Hash::make('Testing-password-123'); $target->save();
        $admin=$this->member('admin');
        $this->actingAs($admin);
        $this->change($target,['buyer'],0)->assertSessionHasNoErrors();
        $this->assertFalse($target->fresh()->is_active);
        $this->actingAs($target)->withSession(['auth_version'=>0])->get('/dashboard/buyer')->assertRedirect('/account-signin');
        $this->assertGuest();
        $credentials=['email'=>$target->email,'password'=>'Testing-password-123'];
        $this->post('/login',$credentials)->assertSessionHasErrors('email');
        $this->assertGuest();
        $this->actingAs($admin)->withSession(['auth_version'=>0]);
        $this->change($target,['buyer'],1)->assertSessionHasNoErrors();
        // A session predating suspension remains invalid after reactivation.
        $this->actingAs($target)->withSession(['auth_version'=>0])->get('/dashboard/buyer')->assertRedirect('/account-signin');
        $this->post('/login',$credentials)->assertSessionHasNoErrors()->assertRedirect('/verify-email');
        $this->post('/verify-email',['code'=>\Illuminate\Support\Facades\Notification::sent($target,\App\Notifications\EmailVerificationCode::class)->last()->code])->assertSessionHasNoErrors();
        $this->get('/dashboard/buyer')->assertOk();
    }

    public function test_role_changes_revoke_old_sessions_and_new_login_uses_updated_roles(): void
    {
        \Illuminate\Support\Facades\Notification::fake();
        $target=$this->member('buyer');
        $target->password=Hash::make('Testing-password-123'); $target->save();
        $this->actingAs($this->member('admin'));
        $this->change($target,['agent'])->assertSessionHasNoErrors();
        $this->actingAs($target)->withSession(['auth_version'=>0])->get('/dashboard/agent')->assertRedirect('/account-signin');
        $this->post('/login',['email'=>$target->email,'password'=>'Testing-password-123'])->assertSessionHasNoErrors();
        $this->post('/verify-email',['code'=>\Illuminate\Support\Facades\Notification::sent($target,\App\Notifications\EmailVerificationCode::class)->last()->code])->assertSessionHasNoErrors();
        $this->get('/dashboard/agent')->assertOk();
        $this->get('/dashboard/buyer')->assertForbidden();
    }

    public function test_registration_cannot_set_staff_roles_or_account_status(): void
    {
        $this->post('/register',['name'=>'New buyer','email'=>'new@example.test','password'=>'Testing-password-123',
            'password_confirmation'=>'Testing-password-123','terms'=>1,'roles'=>['admin'],'is_active'=>false,'auth_version'=>99])
            ->assertSessionHasNoErrors()->assertRedirect('/verify-email');
        $user=User::where('email','new@example.test')->firstOrFail();
        $this->assertSame(['buyer'],$user->roles()->pluck('name')->all());
        $this->assertTrue($user->is_active);
        $this->assertSame(0,$user->auth_version);
        $this->assertNull($user->email_verified_at);
        $this->get('/dashboard/buyer')->assertRedirect('/verify-email');
    }

    public function test_suspended_agents_cannot_receive_new_assignments(): void
    {
        $agent=$this->member('agent');
        $agent->is_active=false; $agent->save();
        $lead=\App\Models\CrmLead::create(['status'=>'new']);
        $this->actingAs($this->member('admin'))->post('/dashboard/admin/leads/'.$lead->id.'/assign',
            ['assigned_to'=>$agent->id])->assertSessionHasErrors('assigned_to');
        $this->assertNull($lead->fresh()->assigned_to);
    }
}
