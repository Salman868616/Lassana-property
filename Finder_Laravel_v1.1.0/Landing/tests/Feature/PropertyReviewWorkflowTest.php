<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class PropertyReviewWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
    }

    private function member(string $role): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name', $role)->value('id'));
        return $user;
    }

    private function listing(User $owner): Property
    {
        $p = new Property;
        $p->forceFill([
            'property_code'=>'LP-'.Str::ulid(), 'owner_id'=>$owner->id, 'created_by'=>$owner->id,
            'title'=>'Review land', 'description'=>'Land for sale', 'category'=>'land',
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>'submitted', 'verification_level'=>'unverified', 'district'=>'Gampaha',
            'city'=>'Nittambuwa', 'location'=>'Test location', 'land_size_perches'=>20,
            'total_price'=>2000000, 'currency'=>'LKR',
        ])->save();
        $p->images()->create(['path'=>'fixture.jpg', 'sort_order'=>1]);
        return $p;
    }

    private function checks(): array
    {
        return ['identity_checked'=>1, 'information_checked'=>1, 'photos_checked'=>1, 'remarks'=>'Reviewed with owner.'];
    }

    public function test_full_review_and_publication_flow(): void
    {
        $admin=$this->member('admin');
        $reviewer=$this->member('verification');
        $p=$this->listing($this->member('seller'));
        $this->actingAs($admin)->get('/admin/properties/create')->assertOk();
        $this->post('/admin/properties/'.$p->id.'/start-review')->assertSessionHasNoErrors();
        $this->assertSame('under_review',$p->fresh()->status);
        $this->actingAs($reviewer)->get('/dashboard/verification/properties/'.$p->id)->assertOk();
        $this->post('/verification/properties/'.$p->id.'/approve',$this->checks())->assertSessionHasNoErrors();
        $review=$p->verifications()->latest('id')->first();
        $this->assertEquals($reviewer->id,$review->reviewer_id);
        $this->assertNotNull($review->reviewed_at);
        $this->assertSame('basic',$p->fresh()->verification_level);
        $this->actingAs($admin)->post('/admin/properties/'.$p->id.'/approve')->assertSessionHasNoErrors();
        $this->assertSame('approved',$p->fresh()->status);
        $this->post('/admin/properties/'.$p->id.'/publish')->assertSessionHasNoErrors();
        $this->assertSame('published',$p->fresh()->status);
        $this->assertNotNull($p->fresh()->published_at);
        $this->get('/dashboard/admin/properties/'.$p->id)->assertOk()->assertSee('Mark as sold');
        $code = $p->property_code;
        $this->post('/admin/properties/'.$p->id.'/mark-sold')->assertSessionHasNoErrors()->assertRedirect();
        $this->assertSame('sold', $p->fresh()->status);
        $this->assertSame($code, $p->fresh()->property_code);
        $this->get('/properties/'.$code)->assertNotFound();
        $this->get('/properties')->assertOk()->assertDontSee('Review land');
        $this->get('/')->assertOk()->assertDontSee('Review land');
        $this->get('/dashboard/admin/properties/'.$p->id)->assertOk()->assertSee('Sale confirmed.')->assertDontSee('>Mark as sold<', false);
        $this->assertDatabaseCount('property_sales', 0);
        $this->post('/admin/properties/'.$p->id.'/archive')->assertSessionHasNoErrors();
        $this->assertSame('archived', $p->fresh()->status);
        $this->assertSame($code, $p->fresh()->property_code);
    }

    public function test_only_admin_can_mark_published_properties_as_sold(): void
    {
        $p = $this->listing($this->member('seller'));
        $p->update(['status'=>'published']);
        $url = '/admin/properties/'.$p->id.'/mark-sold';
        $this->post($url)->assertRedirect('/account-signin');
        foreach (['seller','agent','sales','verification','buyer'] as $role) {
            $this->actingAs($this->member($role))->post($url)->assertForbidden();
        }
        $this->assertSame('published', $p->fresh()->status);
        $this->actingAs($this->member('admin'));
        foreach (['draft','submitted','under_review','approved','sold','archived'] as $status) {
            $p->update(['status'=>$status]);
            $this->post($url)->assertSessionHasErrors('status');
            $this->assertSame($status, $p->fresh()->status);
        }
        $p->update(['status'=>'sold']);
        foreach (['submit','start-review','approve','publish','return-to-draft'] as $action) {
            $this->post('/admin/properties/'.$p->id.'/'.$action, ['remarks'=>'Cannot bypass sold status'])
                ->assertSessionHasErrors('status');
        }
        $this->get('/admin/properties/'.$p->id.'/edit')->assertForbidden();
        $this->assertSame('sold', $p->fresh()->status);
    }

    public function test_unverified_and_incomplete_listings_cannot_pass_review(): void
    {
        $p=$this->listing($this->member('seller'));
        $this->actingAs($this->member('admin'));
        $this->post('/admin/properties/'.$p->id.'/start-review')->assertSessionHasNoErrors();
        $this->post('/admin/properties/'.$p->id.'/approve')->assertSessionHasErrors('status');
        $this->post('/admin/properties/'.$p->id.'/publish')->assertSessionHasErrors('status');
        $this->post('/verification/properties/'.$p->id.'/approve',['remarks'=>'Unchecked'])
            ->assertSessionHasErrors(['identity_checked','information_checked','photos_checked']);
        $p->images()->delete();
        $this->post('/verification/properties/'.$p->id.'/approve',$this->checks())->assertSessionHasErrors('photos');
        $this->assertSame('unverified',$p->fresh()->verification_level);
    }

    public function test_returned_listing_shows_feedback_and_requires_new_verification(): void
    {
        $seller=$this->member('seller');
        $admin=$this->member('admin');
        $p=$this->listing($seller);
        $this->actingAs($admin)->post('/admin/properties/'.$p->id.'/start-review');
        $this->post('/verification/properties/'.$p->id.'/approve',$this->checks())->assertSessionHasNoErrors();
        $this->post('/admin/properties/'.$p->id.'/return-to-draft')->assertSessionHasErrors('remarks');
        $this->post('/admin/properties/'.$p->id.'/return-to-draft',['remarks'=>'Please correct the location.'])->assertSessionHasNoErrors();
        $this->assertSame('draft',$p->fresh()->status);
        $this->assertSame('unverified',$p->fresh()->verification_level);
        $this->assertNull($p->fresh()->published_at);
        $this->actingAs($seller)->get('/dashboard/seller/properties/'.$p->id)->assertOk()->assertSee('Please correct the location.');
        $this->get('/seller/properties/'.$p->id.'/edit')->assertOk();
        $this->post('/seller/properties/'.$p->id.'/submit')->assertSessionHasNoErrors();
        $this->actingAs($admin)->post('/admin/properties/'.$p->id.'/start-review')->assertSessionHasNoErrors();
        $this->post('/admin/properties/'.$p->id.'/approve')->assertSessionHasErrors('status');
    }

    public function test_roles_cannot_bypass_review_permissions(): void
    {
        $p=$this->listing($this->member('seller'));
        foreach (['seller','buyer','agent','sales'] as $role) {
            $this->actingAs($this->member($role))->post('/verification/properties/'.$p->id.'/approve',$this->checks())->assertForbidden();
            $this->post('/verification/properties/'.$p->id.'/reject',['remarks'=>'No'])->assertForbidden();
        }
        $this->actingAs($this->member('verification'));
        foreach (['start-review','approve','publish','return-to-draft'] as $action) {
            $this->post('/admin/properties/'.$p->id.'/'.$action)->assertForbidden();
        }
    }

    public function test_reviewed_listings_cannot_be_edited_or_have_photos_removed(): void
    {
        $p=$this->listing($this->member('seller'));
        $this->actingAs($this->member('admin'));
        foreach (['submitted','under_review','approved','published'] as $status) {
            $p->status=$status;
            $p->save();
            $this->get('/admin/properties/'.$p->id.'/edit')->assertForbidden();
            $this->put('/admin/properties/'.$p->id,['title'=>'Changed','owner_id'=>$p->owner_id])->assertForbidden();
            $this->delete('/admin/properties/'.$p->id.'/images/'.$p->images()->first()->id)->assertForbidden();
        }
        $this->assertSame('Review land',$p->fresh()->title);
        $this->assertSame(1,$p->images()->count());
    }

    public function test_verifier_can_return_a_listing_with_feedback(): void
    {
        $p=$this->listing($this->member('seller'));
        $this->actingAs($this->member('admin'))->post('/admin/properties/'.$p->id.'/start-review');
        $this->actingAs($this->member('verification'));
        $this->post('/verification/properties/'.$p->id.'/reject',['remarks'=>'Need clear photos.'])->assertSessionHasNoErrors();
        $this->assertSame('draft',$p->fresh()->status);
        $this->get('/dashboard/verification/properties/'.$p->id)->assertNotFound();
    }
    public function test_admin_submission_validates_drafts_and_cannot_skip_review(): void
    {
        $p = $this->listing($this->member('seller'));
        $p->forceFill(['status'=>'draft', 'description'=>null])->save();
        $this->actingAs($this->member('admin'));
        $this->post('/admin/properties/'.$p->id.'/submit')->assertSessionHasErrors('description');
        $this->assertSame('draft', $p->fresh()->status);
        $p->description = 'Complete description';
        $p->save();
        $p->images()->delete();
        $this->post('/admin/properties/'.$p->id.'/submit')->assertSessionHasErrors('photos');
        $p->images()->create(['path'=>'fixture.jpg','sort_order'=>1]);
        $this->post('/admin/properties/'.$p->id.'/submit')->assertSessionHasNoErrors();
        $this->assertSame('submitted', $p->fresh()->status);
        $this->post('/admin/properties/'.$p->id.'/submit')->assertSessionHasErrors('status');
        $this->post('/admin/properties/'.$p->id.'/approve')->assertSessionHasErrors('status');
        $this->actingAs($this->member('verification'));
        $this->post('/verification/properties/'.$p->id.'/approve', $this->checks())->assertSessionHasErrors('status');
    }

    public function test_incomplete_legacy_submission_cannot_enter_verification(): void
    {
        $p = $this->listing($this->member('seller'));
        $p->images()->delete();
        $this->actingAs($this->member('admin'));
        $this->post('/admin/properties/'.$p->id.'/start-review')->assertSessionHasErrors('photos');
        $this->assertSame('submitted', $p->fresh()->status);
        $this->assertSame(0, $p->verifications()->count());
    }

    public function test_verification_dashboard_prioritizes_pending_checks(): void
    {
        $owner = $this->member('seller');
        $pending = $this->listing($owner);
        $pending->forceFill(['title'=>'Pending checks first','status'=>'under_review'])->save();
        $published = $this->listing($owner);
        $published->forceFill(['title'=>'Published history last','status'=>'published','verification_level'=>'basic'])->save();
        $this->actingAs($this->member('verification'));
        $this->get('/dashboard/verification?tab=properties')->assertOk()->assertSeeInOrder(['Pending checks first','Published history last']);
        $this->get('/dashboard/verification/properties/'.$pending->id)->assertOk()->assertSee('The Verification Team checks');
    }
    public function test_property_contact_names_follow_assignment_and_internal_access(): void
    {
        $seller = $this->member('seller');
        $seller->update(['name'=>'Listing Owner Example']);
        $agent = $this->member('agent');
        $agent->update(['name'=>'Assigned Agent Example']);
        $p = $this->listing($seller);
        $p->forceFill(['status'=>'published'])->save();
        $this->get('/properties/'.$p->property_code)->assertOk()->assertSee('Listed by')->assertSee('Listing Owner Example')->assertSee('Seller / owner')->assertDontSee($seller->email);
        $p->forceFill(['agent_id'=>$agent->id])->save();
        $this->get('/properties/'.$p->property_code)->assertOk()->assertSee('Assigned Agent Example')->assertDontSee('Listing Owner Example')->assertDontSee($agent->email);
        foreach (['admin', 'verification'] as $role) {
            $this->actingAs($this->member($role))->get('/dashboard/'.$role.'/properties/'.$p->id)
                ->assertOk()->assertSee('Listing Owner Example')->assertSee('Assigned Agent Example');
        }
        $p->forceFill(['agent_id'=>null])->save();
        $this->actingAs($seller)->get('/dashboard/seller/properties/'.$p->id)->assertOk()->assertSee('Not assigned');
    }
}