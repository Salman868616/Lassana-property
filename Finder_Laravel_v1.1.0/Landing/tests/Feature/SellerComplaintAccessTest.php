<?php

namespace Tests\Feature;

use App\Models\{Complaint, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SellerComplaintAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }

    private function member(string ...$roles): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->whereIn('name',$roles)->pluck('id'));
        return $user;
    }

    private function complaint(User $user): Complaint
    {
        $item=new Complaint(['category'=>'service','subject'=>'Existing complaint','message'=>'Private complaint details']);
        $item->user_id=$user->id;
        $item->status='open';
        $item->save();
        return $item;
    }

    public function test_seller_only_accounts_cannot_access_or_submit_complaints(): void
    {
        $seller=$this->member('seller');
        $old=$this->complaint($seller);
        $other=$this->complaint($this->member('buyer'));
        $this->actingAs($seller);
        foreach (['/account/complaints','/account/complaints/create','/account/complaints/'.$old->id,
            '/account/complaints/'.$other->id,'/account/complaints?role=buyer','/account/complaints?status=invalid'] as $url) {
            $this->get($url)->assertForbidden()->assertDontSee($old->message);
        }
        $this->getJson('/account/complaints')->assertForbidden();
        $this->post('/account/complaints',['category'=>'service','subject'=>'Blocked','message'=>'Should not save','role'=>'buyer'])
            ->assertForbidden();
        $this->postJson('/account/complaints',[])->assertForbidden();
        $this->assertDatabaseCount('complaints',2);
        $this->get('/admin/complaints')->assertForbidden();
        $this->put('/admin/complaints/'.$old->id,['status'=>'resolved','response'=>'Should not save'])->assertForbidden();
        $this->assertDatabaseCount('complaint_updates',0);
        $this->get('/dashboard/seller')->assertOk()->assertDontSee('href="'.route('complaints.index').'"',false)
            ->assertDontSee('href="'.route('complaints.create').'"',false);

        // Retain historical submissions for admin review; removal of access is not deletion.
        $this->actingAs($this->member('admin'))->get('/admin/complaints/'.$old->id)
            ->assertOk()->assertSee($old->message);
    }

    public function test_buyer_seller_accounts_keep_complaints_in_buyer_workspace_only(): void
    {
        $user=$this->member('seller','buyer');
        $this->actingAs($user)->get('/dashboard/seller')->assertOk()
            ->assertDontSee('href="'.route('complaints.index').'"',false)
            ->assertDontSee('href="'.route('complaints.create').'"',false);
        $this->get('/dashboard/buyer')->assertOk()->assertSee('href="'.route('complaints.create').'"',false);
        $this->get('/account/complaints/create')->assertOk()->assertViewHas('role','buyer');
        $this->post('/account/complaints',['category'=>'service','subject'=>'Buyer service issue','message'=>'Please review.'])
            ->assertSessionHasNoErrors()->assertRedirect();
        $item=Complaint::firstOrFail();
        $this->assertSame($user->id,$item->user_id);
        $this->get('/account/complaints')->assertOk()->assertViewHas('role','buyer')->assertSee($item->subject);
        $this->get('/account/complaints/'.$item->id)->assertOk()->assertViewHas('role','buyer');
        $this->get('/admin/complaints')->assertForbidden();
    }

    public function test_other_role_workspaces_and_admin_review_keep_existing_access(): void
    {
        foreach (['admin','agent','sales','verification','buyer'] as $role) {
            $user=$this->member('seller',$role);
            $this->actingAs($user);
            $this->get('/account/complaints/create')->assertOk()->assertViewHas('role',$role);
            $this->get('/dashboard/'.$role)->assertOk()->assertSee('href="'.route($role==='admin' ? 'admin.complaints.index' : 'complaints.index').'"',false);
            $this->get('/dashboard/seller')->assertOk()->assertDontSee('href="'.route('complaints.index').'"',false);
        }
        $admin=$this->member('admin','seller');
        $item=$this->complaint($this->member('buyer'));
        $this->actingAs($admin)->put('/admin/complaints/'.$item->id,['status'=>'resolved','response'=>'Admin response'])
            ->assertSessionHasNoErrors();
        $this->assertSame('resolved',$item->fresh()->status);
        $this->assertDatabaseHas('complaint_updates',['complaint_id'=>$item->id,'reviewer_id'=>$admin->id,'response'=>'Admin response']);
    }
}
