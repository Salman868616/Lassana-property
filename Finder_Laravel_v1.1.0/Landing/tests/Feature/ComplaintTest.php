<?php
namespace Tests\Feature;
use App\Models\{User,Complaint};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
class ComplaintTest extends TestCase {
    use RefreshDatabase;
    private function member($role) {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }
    protected function setUp(): void {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }
    public function test_submission_uses_signed_in_owner_and_escapes_content(): void {
        $user=$this->member('buyer');$other=$this->member('buyer');
        $this->actingAs($user)->get('/account/complaints/create')->assertOk();
        $this->post('/account/complaints',['category'=>'property','property_reference'=>'LP-TEST',
            'subject'=>'<script>alert(1)</script>','message'=>'Issue details','user_id'=>$other->id,'status'=>'resolved'])
            ->assertSessionHasNoErrors();
        $item=Complaint::firstOrFail();
        $this->assertSame($user->id,$item->user_id);
        $this->assertSame('open',$item->status);
        $this->get('/account/complaints/'.$item->id)->assertOk()->assertSee('&lt;script&gt;',false)->assertDontSee('<script>alert(1)</script>',false);
        $this->actingAs($other)->get('/account/complaints/'.$item->id)->assertNotFound();
        $this->get('/account/complaints')->assertOk()->assertDontSee('LP-TEST');
    }
    public function test_only_admin_can_review_and_history_and_totals_are_preserved(): void {
        $user=$this->member('buyer');
        $this->actingAs($user)->post('/account/complaints',['category'=>'service','subject'=>'Delayed response','message'=>'Please follow up.']);
        $item=Complaint::firstOrFail();
        foreach(['buyer','seller','agent','sales','verification'] as $role) {
            $this->actingAs($this->member($role))->get('/admin/complaints')->assertForbidden();
            $this->put('/admin/complaints/'.$item->id,['status'=>'resolved','response'=>'Changed'])->assertForbidden();
        }
        $admin=$this->member('admin');$this->actingAs($admin);
        $this->get('/admin/complaints')->assertOk()->assertSee('Delayed response');
        $this->get('/admin/complaints/'.$item->id)->assertOk();
        foreach(['in_progress','resolved'] as $status) {
            $this->put('/admin/complaints/'.$item->id,['status'=>$status,'response'=>'Response '.$status,'reviewer_id'=>$user->id])
                ->assertSessionHasNoErrors();
        }
        $this->assertSame('resolved',$item->fresh()->status);
        $this->assertDatabaseCount('complaint_updates',2);
        $this->assertDatabaseHas('complaint_updates',['reviewer_id'=>$admin->id,'status'=>'resolved']);
        $totals=app(\App\Services\ManagementOverview::class)->build($admin)['complaints'];
        $this->assertSame(1,(int)$totals['resolved']);
        $this->get('/admin/complaints?status=open')->assertDontSee('Delayed response');
        $this->get('/dashboard/admin?section=management')->assertOk()->assertSee('Total complaints');
        $this->actingAs($user)->get('/account/complaints/'.$item->id)->assertSee('Response in_progress')->assertSee('Response resolved');
    }
    public function test_validation_guests_and_pending_otp_are_blocked(): void {
        $this->get('/account/complaints')->assertRedirect('/account-signin');
        $user=$this->member('buyer');$this->actingAs($user);
        $this->post('/account/complaints',['category'=>'property'])->assertSessionHasErrors(['property_reference','subject','message']);
        $this->assertDatabaseCount('complaints',0);
        $this->withSession(['otp_verified'=>null])->post('/account/complaints',['category'=>'service','subject'=>'Hi','message'=>'Details'])->assertRedirect('/verify-email');
        $this->assertDatabaseCount('complaints',0);
        $admin=$this->member('admin');$this->actingAs($admin);
        $this->put('/admin/complaints/1',['status'=>'invalid','response'=>''])->assertSessionHasErrors(['status','response']);
        $this->assertDatabaseCount('complaint_updates',0);
    }
}
