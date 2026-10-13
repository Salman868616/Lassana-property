<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPropertyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
        Storage::fake('public');
        Storage::fake('property_documents');
    }

    private function member(string $role): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name', $role)->value('id'));
        return $user;
    }

    private function listing(User $owner, string $status = 'draft'): Property
    {
        $property = new Property();
        $property->forceFill(['owner_id'=>$owner->id, 'created_by'=>$owner->id,
            'title'=>'Archive fixture', 'category'=>'land', 'district'=>'Gampaha',
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>$status, 'published_at'=>$status === 'published' ? now() : null])->save();
        return $property;
    }

    public function test_admin_can_create_edit_reload_and_archive_without_changing_id(): void
    {
        $admin = $this->member('admin');
        $owner = $this->member('seller');
        $this->actingAs($admin);
        $data = ['owner_id'=>$owner->id, 'title'=>'T06 original land', 'category'=>'land', 'district'=>'Gampaha'];
        $this->post('/admin/properties', $data + ['status'=>'published', 'property_code'=>'FORGED'])
            ->assertSessionHasNoErrors()->assertRedirect(route('admin.properties.index'));
        $property = Property::latest('id')->firstOrFail();
        $code = sprintf('LP-GAM-%05d', $property->id);
        $this->assertSame($code, $property->property_code);
        $this->assertSame('draft', $property->status);
        $this->get('/admin/properties/'.$property->id.'/edit')->assertOk()->assertSee('T06 original land');
        $this->put('/admin/properties/'.$property->id, array_replace($data, ['title'=>'T06 revised land']))
            ->assertSessionHasNoErrors();
        $this->assertSame('T06 revised land', $property->fresh()->title);
        $this->get('/dashboard/admin/properties/'.$property->id)->assertOk()->assertSee('T06 revised land');
        $this->post('/admin/properties/'.$property->id.'/archive')->assertSessionHasNoErrors()->assertRedirect();
        $this->assertSame('archived', $property->fresh()->status);
        $this->assertSame($code, $property->fresh()->property_code);
        $this->assertNull($property->fresh()->deleted_at);
        $this->get('/admin/properties')->assertOk()->assertSee($code);
        $this->get('/dashboard/admin/properties/'.$property->id)->assertOk()->assertSee('Archived property');
        $this->get('/admin/properties/'.$property->id.'/edit')->assertForbidden();
        $this->put('/admin/properties/'.$property->id, $data)->assertForbidden();
        foreach (['archive','submit','start-review','approve','publish','return-to-draft'] as $action) {
            $this->post('/admin/properties/'.$property->id.'/'.$action, ['remarks'=>'Cannot bypass archive'])
                ->assertSessionHasErrors('status');
        }
        $this->assertSame('archived', $property->fresh()->status);
    }

    public function test_archive_hides_public_listing_and_alias_but_retains_related_records(): void
    {
        $owner = $this->member('seller');
        $property = $this->listing($owner, 'published');
        $oldCode = $property->property_code;
        $property->update(['district'=>'Colombo']);
        Storage::disk('public')->put('archive/photo.jpg', 'photo fixture');
        Storage::disk('property_documents')->put('archive/survey.pdf', 'private fixture');
        $image = $property->images()->create(['path'=>'archive/photo.jpg','sort_order'=>1]);
        $document = $property->documents()->create(['uploaded_by'=>$owner->id,'document_type'=>'survey','path'=>'archive/survey.pdf','status'=>'pending']);
        $enquiry = $property->enquiries()->create(['name'=>'Customer','email'=>'customer@example.test','message'=>'Interested']);
        $this->get('/properties/'.$property->property_code)->assertOk();
        $this->actingAs($this->member('admin'))->post('/admin/properties/'.$property->id.'/archive')->assertSessionHasNoErrors();
        $this->assertNull($property->fresh()->published_at);
        $this->get('/properties/'.$property->property_code)->assertNotFound();
        $this->get('/properties/'.$oldCode)->assertNotFound();
        $this->get('/properties')->assertOk()->assertDontSee('Archive fixture');
        $this->get('/')->assertOk()->assertDontSee('Archive fixture');
        $this->assertNotNull($image->fresh());
        $this->assertNotNull($document->fresh());
        $this->assertNotNull($enquiry->fresh());
        Storage::disk('public')->assertExists('archive/photo.jpg');
        Storage::disk('property_documents')->assertExists('archive/survey.pdf');
        $this->actingAs($owner)->get('/dashboard/seller/properties/'.$property->id)->assertOk();
    }

    public function test_admin_photo_limit_counts_existing_photos_and_preserves_draft_on_failure(): void
    {
        $owner=$this->member('seller');
        $property=$this->listing($owner);
        for ($i=1; $i<=9; $i++) $property->images()->create(['path'=>'fixture-'.$i.'.jpg','sort_order'=>$i]);
        $this->actingAs($this->member('admin'));
        $photo = fn () => \Illuminate\Http\UploadedFile::fake()->createWithContent('photo.png',
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jRZkAAAAASUVORK5CYII='));
        $data=['owner_id'=>$owner->id,'title'=>'Ten photos','category'=>'land'];
        $this->put('/admin/properties/'.$property->id,$data+['images'=>[$photo()]])->assertSessionHasNoErrors();
        $this->assertSame(10,$property->images()->count());
        $this->put('/admin/properties/'.$property->id,array_replace($data,['title'=>'Must not save','images'=>[$photo()]]))
            ->assertSessionHasErrors('images');
        $this->assertSame('Ten photos',$property->fresh()->title);
        $this->assertSame(10,$property->images()->count());
        $this->assertCount(1,Storage::disk('public')->allFiles());
    }

    public function test_only_admin_can_archive_and_invalid_drafts_are_not_saved(): void
    {
        $owner = $this->member('seller');
        $property = $this->listing($owner);
        $url = '/admin/properties/'.$property->id.'/archive';
        $this->post($url)->assertRedirect('/account-signin');
        foreach (['buyer','seller','agent','sales','verification'] as $role) {
            $this->actingAs($this->member($role))->post($url)->assertForbidden();
        }
        $this->assertSame('draft', $property->fresh()->status);
        $this->actingAs($this->member('admin'));
        $this->post('/admin/properties', ['owner_id'=>$owner->id,'title'=>'','total_price'=>-1])
            ->assertSessionHasErrors(['title','total_price']);
        $this->assertDatabaseCount('properties', 1);
        foreach (['draft','submitted','under_review','approved','published','sold'] as $status) {
            $listing = $this->listing($owner, $status);
            $this->post('/admin/properties/'.$listing->id.'/archive')->assertSessionHasNoErrors();
            $this->assertSame('archived', $listing->fresh()->status);
        }
    }
    public function test_admin_can_only_assign_active_sellers_as_owners(): void
    {
        $admin = $this->member('admin');
        $seller = $this->member('seller');
        $buyer = $this->member('buyer');
        $inactive = $this->member('seller');
        $inactive->is_active = false; $inactive->save();
        $dual = $this->member('buyer');
        $dual->roles()->attach(DB::table('roles')->where('name','seller')->value('id'));
        $property = $this->listing($seller);
        $this->actingAs($admin);
        foreach (['/admin/properties/create', '/admin/properties/'.$property->id.'/edit'] as $url) {
            $ids = $this->get($url)->assertOk()->viewData('owners')->modelKeys();
            $this->assertEqualsCanonicalizing([$seller->id, $dual->id], $ids);
        }
        foreach ([$buyer, $inactive, $admin] as $invalid) {
            $data = ['owner_id'=>$invalid->id, 'title'=>'Invalid owner assignment'];
            $this->post('/admin/properties', $data)->assertSessionHasErrors('owner_id');
            $this->put('/admin/properties/'.$property->id, $data)->assertSessionHasErrors('owner_id');
            $this->assertSame($seller->id, $property->fresh()->owner_id);
        }
        $this->assertDatabaseCount('properties', 1);
        $this->post('/admin/properties', ['owner_id'=>$dual->id,'title'=>'Dual role owner'])
            ->assertSessionHasNoErrors()->assertRedirect();
        $this->assertDatabaseHas('properties',['title'=>'Dual role owner','owner_id'=>$dual->id]);
    }

    public function test_invalid_legacy_owner_is_not_silently_reassigned(): void
    {
        $admin = $this->member('admin');
        $buyer = $this->member('buyer');
        $seller = $this->member('seller');
        $property = $this->listing($buyer);
        $this->actingAs($admin)->get('/admin/properties/'.$property->id.'/edit')->assertOk()
            ->assertSee('The currently assigned owner is not an active seller.');
        $this->assertSame($buyer->id, $property->fresh()->owner_id);
        $this->put('/admin/properties/'.$property->id, ['owner_id'=>$buyer->id,'title'=>'Keep invalid owner'])
            ->assertSessionHasErrors('owner_id');
        $this->put('/admin/properties/'.$property->id, ['owner_id'=>$seller->id,'title'=>'Corrected owner'])
            ->assertSessionHasNoErrors()->assertRedirect();
        $this->assertSame($seller->id, $property->fresh()->owner_id);
    }
}
