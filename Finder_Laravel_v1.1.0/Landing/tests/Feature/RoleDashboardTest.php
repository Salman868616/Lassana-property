<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use App\Services\DashboardAccess;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RoleDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
    }

    private function member(string ...$roles): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->whereIn('name', $roles)->pluck('id'));
        return $user;
    }

    private function listing(User $owner, ?User $agent = null, string $title = 'Private listing'): Property
    {
        $property = new Property();
        $property->forceFill([
            'property_code' => 'TEST-'.\Illuminate\Support\Str::ulid(),
            'title' => $title,
            'owner_id' => $owner->id,
            'created_by' => $owner->id,
            'agent_id' => $agent?->id,
            'property_category_id' => DB::table('property_categories')->where('slug', 'land')->value('id'),
            'category' => 'land', 'status' => 'draft',
        ])->save();
        return $property;
    }

    public function test_guests_must_sign_in(): void
    {
        $this->get('/dashboard')->assertRedirect('/account-signin');
    }

    public function test_each_role_can_open_its_own_dashboard(): void
    {
        foreach (array_keys(DashboardAccess::ROLES) as $role) {
            $user = $this->member($role);
            $this->actingAs($user)->get('/dashboard')->assertRedirect('/dashboard/'.$role);
            $this->get('/dashboard/'.$role)->assertOk();
        }
    }

    public function test_seller_cannot_read_another_owners_property_or_enquiry(): void
    {
        $seller = $this->member('seller');
        $other = $this->member('seller');
        $mine = $this->listing($seller, title: 'My listing');
        $theirs = $this->listing($other, title: 'Other private listing');
        $theirs->enquiries()->create(['name'=>'Private customer','email'=>'private@example.test','message'=>'Private message']);
        $this->actingAs($seller)->get('/dashboard/seller?tab=properties')->assertOk()
            ->assertSee('My listing')->assertDontSee('Other private listing')->assertDontSee('private@example.test');
        $this->get('/dashboard/seller/properties/'.$mine->id)->assertOk();
        $this->get('/dashboard/seller/properties/'.$theirs->id)->assertNotFound();
        $this->get('/dashboard/admin')->assertForbidden();
        $this->get('/admin/properties')->assertForbidden();
    }

    public function test_agent_only_reads_assigned_properties_and_leads(): void
    {
        $agent = $this->member('agent');
        $other = $this->member('agent');
        $owner = $this->member('seller');
        $mine = $this->listing($owner, $agent, 'Assigned listing');
        $theirs = $this->listing($owner, $other, 'Unassigned listing');
        DB::table('crm_leads')->insert(['assigned_to'=>$other->id, 'notes'=>'Confidential lead notes']);
        $this->actingAs($agent)->get('/dashboard/agent?tab=properties')->assertOk()
            ->assertSee('Assigned listing')->assertDontSee('Unassigned listing')->assertDontSee('Confidential lead notes');
        $this->get('/dashboard/agent/properties/'.$mine->id)->assertOk();
        $this->get('/dashboard/agent/properties/'.$theirs->id)->assertNotFound();
    }

    public function test_buyer_sees_only_account_linked_viewings(): void
    {
        $buyer = $this->member('buyer');
        $other = $this->member('buyer');
        $property = $this->listing($this->member('seller'));
        DB::table('property_viewings')->insert([
            ['property_id'=>$property->id,'customer_id'=>$buyer->id,'scheduled_at'=>'2026-10-04 10:00:00','status'=>'scheduled'],
            ['property_id'=>$property->id,'customer_id'=>$other->id,'scheduled_at'=>'2026-10-05 10:00:00','status'=>'other-private-status'],
        ]);
        $this->actingAs($buyer)->get('/dashboard/buyer?tab=viewings')->assertOk()->assertSee('04 Oct 2026')->assertDontSee('other-private-status');
        $this->get('/dashboard/buyer/properties/'.$property->id)->assertNotFound();
        $this->get('/dashboard/sales')->assertForbidden();
    }

    public function test_multiple_roles_are_available_but_do_not_grant_admin_access(): void
    {
        $user = $this->member('seller', 'agent');
        $this->actingAs($user)->get('/dashboard/seller')->assertOk()->assertSee('/dashboard/agent', false);
        $this->get('/dashboard/agent')->assertOk();
        $this->get('/dashboard/admin')->assertForbidden();
    }

    public function test_verification_cannot_view_draft_properties(): void
    {
        $reviewer = $this->member('verification');
        $property = $this->listing($this->member('seller'));
        $this->actingAs($reviewer)->get('/dashboard/verification/properties/'.$property->id)->assertNotFound();
        $property->status = 'submitted';
        $property->save();
        $this->get('/dashboard/verification/properties/'.$property->id)->assertOk();
    }
    public function test_role_sections_are_separate_and_role_specific(): void
    {
        $sections = [
            'seller'=>['properties'=>'properties-list'],
            'verification'=>['properties'=>'properties-list'],
            'buyer'=>['saved'=>'saved-properties','requests'=>'property-requests','viewings'=>'viewings-list'],
            'sales'=>['properties'=>'properties-list','leads'=>'lead-list','enquiries'=>'enquiries-list','requests'=>'property-requests','viewings'=>'viewings-list'],
            'agent'=>['properties'=>'properties-list','leads'=>'lead-list','enquiries'=>'enquiries-list','requests'=>'property-requests','viewings'=>'viewings-list'],
            'admin'=>['leads'=>'lead-list','enquiries'=>null,'requests'=>'property-requests','viewings'=>'admin-viewings'],
        ];
        foreach ($sections as $role=>$tabs) {
            $this->actingAs($this->member($role));
            $this->get('/dashboard/'.$role)->assertOk()->assertDontSee('id="lead-list"',false)->assertDontSee('id="properties-list"',false);
            foreach ($tabs as $tab=>$id) {
                $response=$this->get('/dashboard/'.$role.'?tab='.$tab)->assertOk();
                if ($id) $response->assertSee('id="'.$id.'"',false);
                foreach ($tabs as $other=>$otherId) if ($other !== $tab && $otherId) $response->assertDontSee('id="'.$otherId.'"',false);
            }
        }
        $this->actingAs($this->member('buyer'))->get('/dashboard/buyer?tab=leads')->assertSessionHasErrors('tab');
        $this->get('/dashboard/admin?tab=leads')->assertForbidden();
    }
}