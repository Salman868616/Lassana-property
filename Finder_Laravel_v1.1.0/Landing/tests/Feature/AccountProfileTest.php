<?php
namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{DB,Hash};
use Tests\TestCase;
class AccountProfileTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void { parent::setUp(); $this->seed(\Database\Seeders\RoleSeeder::class); }
    private function member(string $role): User
    {
        $user=User::factory()->create(['password'=>Hash::make('Profile-test-password-123')]);
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }
    public function test_guests_are_redirected_and_all_roles_have_their_own_profile(): void
    {
        $this->get('/account-profile')->assertRedirect();
        $this->put('/account-profile',[])->assertRedirect();
        foreach(['buyer','seller','agent','sales','verification','admin'] as $role){
            $user=$this->member($role);
            $response=$this->actingAs($user)->get('/account-profile')->assertOk()->assertSee($user->email)->assertDontSee('Michael Williams');
            if($role==='agent') $response->assertSee('Agent professional details');
            else $response->assertDontSee('Agent professional details');
        }
    }
    public function test_update_is_self_only_and_does_not_change_roles_password_or_status(): void
    {
        $buyer=$this->member('buyer');$other=$this->member('seller');$oldPassword=$buyer->password;
        $this->actingAs($buyer)->put('/account-profile',[
            'name'=>'Updated buyer','email'=>$buyer->email,'phone'=>'0771234567','city'=>'Colombo','bio'=>'Looking for land',
            'id'=>$other->id,'user_id'=>$other->id,'roles'=>['admin'],'is_active'=>false,'auth_version'=>100,'password'=>'malicious-change',
        ])->assertRedirect('/account-profile')->assertSessionHasNoErrors();
        $buyer->refresh();
        $this->assertSame('Updated buyer',$buyer->name); $this->assertSame('Colombo',$buyer->city);
        $this->assertTrue($buyer->is_active); $this->assertFalse($buyer->hasRole('admin'));
        $this->assertSame($oldPassword,$buyer->password);$this->assertSame(0,$buyer->auth_version);
        $this->assertSame($other->name,$other->fresh()->name);
    }
    public function test_agents_can_save_professional_details_but_other_roles_cannot(): void
    {
        $agent=$this->member('agent');
        $data=['name'=>$agent->name,'email'=>$agent->email,'agency_name'=>'Example Agency','service_areas'=>'Gampaha, Colombo'];
        $this->actingAs($agent)->put('/account-profile',$data)->assertSessionHasNoErrors();
        $this->assertSame('Example Agency',$agent->fresh()->agency_name);
        $buyer=$this->member('buyer');
        $this->actingAs($buyer)->put('/account-profile',array_replace($data,['email'=>$buyer->email]))->assertSessionHasErrors('agency_name');
        $this->assertNull($buyer->fresh()->agency_name);
    }
    public function test_email_change_requires_password_resets_verification_and_revokes_old_sessions(): void
    {
        $user=$this->member('buyer');$original=$user->email;
        $data=['name'=>$user->name,'email'=>'changed@example.test'];
        $this->actingAs($user)->put('/account-profile',$data)->assertSessionHasErrors('current_password');
        $this->put('/account-profile',$data+['current_password'=>'wrong'])->assertSessionHasErrors('current_password');
        $this->assertSame($original,$user->fresh()->email);
        $this->put('/account-profile',$data+['current_password'=>'Profile-test-password-123'])->assertSessionHasNoErrors()->assertSessionHas('auth_version',1);
        $user->refresh();$this->assertSame('changed@example.test',$user->email);
        $this->assertNull($user->email_verified_at);$this->assertNull($user->remember_token);
        $this->get('/account-profile')->assertRedirect('/verify-email');
        $this->withSession(['auth_version'=>0])->get('/account-profile')->assertRedirect();
    }
    public function test_duplicate_email_invalid_fields_and_suspended_accounts_are_rejected(): void
    {
        $user=$this->member('buyer');$other=$this->member('buyer');
        $this->actingAs($user)->put('/account-profile',['name'=>'','email'=>$other->email,'phone'=>str_repeat('1',31)])
            ->assertSessionHasErrors(['name','email','phone']);
        $user->is_active=false;$user->save();
        $this->get('/account-profile')->assertRedirect();
    }
}
