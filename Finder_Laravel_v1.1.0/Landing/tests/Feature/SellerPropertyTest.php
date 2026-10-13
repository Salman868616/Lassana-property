<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SellerPropertyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
        Storage::fake('public');
    }

    private function member(string $role = 'seller'): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name', $role)->value('id'));
        return $user;
    }

    private function photo(): UploadedFile
    {
        // A real 1x1 PNG fixture; generating it does not require the GD extension.
        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jRZkAAAAASUVORK5CYII=', true);
        return UploadedFile::fake()->createWithContent('land.png', $png);
    }
    private function listing(User $seller): Property
    {
        $this->actingAs($seller)->post('/seller/properties', ['title' => 'My land'])->assertSessionHasNoErrors()->assertRedirect();
        return Property::latest('id')->firstOrFail();
    }

    public function test_creation_assigns_owner_and_ignores_protected_fields(): void
    {
        $seller = $this->member();
        $other = $this->member();
        $this->actingAs($seller)->get('/seller/properties/create')->assertOk()->assertDontSee('name="owner_id"', false);
        $this->post('/seller/properties', [
            'title' => 'My land', 'owner_id' => $other->id, 'created_by' => $other->id,
            'agent_id' => $other->id, 'status' => 'published', 'verification_level' => 'silver',
            'category' => 'land', 'property_category_id' => 999, 'currency' => 'USD',
        ])->assertSessionHasNoErrors()->assertRedirect();
        $property = Property::firstOrFail();
        $this->assertEquals($seller->id, $property->owner_id);
        $this->assertEquals($seller->id, $property->created_by);
        $this->assertNull($property->agent_id);
        $this->assertSame('draft', $property->status);
        $this->assertSame('unverified', $property->verification_level);
        $this->assertSame('land', $property->propertyCategory->slug);
        $this->assertSame('LKR', $property->currency);
    }

    public function test_seller_can_edit_and_upload_a_photo(): void
    {
        $seller = $this->member();
        $property = $this->listing($seller);
        $this->get('/seller/properties/'.$property->id.'/edit')->assertOk();
        $this->put('/seller/properties/'.$property->id, [
            'title' => 'Updated land', 'images' => [$this->photo()],
            'status' => 'published', 'owner_id' => 999,
        ])->assertSessionHasNoErrors()->assertRedirect();
        $property->refresh();
        $this->assertSame('Updated land', $property->title);
        $this->assertSame('draft', $property->status);
        $this->assertEquals($seller->id, $property->owner_id);
        $this->assertCount(1, $property->images);
        Storage::disk('public')->assertExists($property->images->first()->path);
    }

    public function test_other_sellers_cannot_edit_or_submit_a_property(): void
    {
        $property = $this->listing($this->member());
        $this->actingAs($this->member());
        $this->get('/seller/properties/'.$property->id.'/edit')->assertNotFound();
        $this->put('/seller/properties/'.$property->id, ['title' => 'Stolen'])->assertNotFound();
        $this->post('/seller/properties/'.$property->id.'/submit')->assertNotFound();
        $this->assertSame('My land', $property->fresh()->title);
    }

    public function test_non_sellers_cannot_use_seller_actions(): void
    {
        $this->get('/seller/properties/create')->assertRedirect('/account-signin');
        foreach (['buyer', 'agent', 'sales', 'verification', 'admin'] as $role) {
            $this->actingAs($this->member($role))->post('/seller/properties', ['title' => 'Blocked'])->assertForbidden();
        }
        $this->assertSame(0, Property::count());
    }

    public function test_complete_submission_locks_editing(): void
    {
        $seller = $this->member();
        $property = $this->listing($seller);
        $this->put('/seller/properties/'.$property->id, [
            'title'=>'Ready land','description'=>'Land for sale','district'=>'Gampaha',
            'city'=>'Nittambuwa','location'=>'Test location','total_price'=>2000000,
            'land_size_perches'=>20,'images'=>[$this->photo()],
        ])->assertSessionHasNoErrors();
        $this->post('/seller/properties/'.$property->id.'/submit')->assertSessionHasNoErrors()->assertRedirect();
        $this->assertSame('submitted', $property->fresh()->status);
        $this->get('/seller/properties/'.$property->id.'/edit')->assertForbidden();
        $this->put('/seller/properties/'.$property->id, ['title'=>'Changed'])->assertForbidden();
        $this->post('/seller/properties/'.$property->id.'/submit')->assertForbidden();
    }

    public function test_incomplete_submission_stays_draft(): void
    {
        $property = $this->listing($this->member());
        $this->post('/seller/properties/'.$property->id.'/submit')
            ->assertSessionHasErrors(['description','district','city','location','land_size_perches','total_price','photos']);
        $this->assertSame('draft', $property->fresh()->status);
    }

    public function test_non_draft_statuses_are_locked(): void
    {
        $property = $this->listing($this->member());
        foreach (['submitted','under_review','approved','published','sold','archived'] as $status) {
            $property->status = $status;
            $property->save();
            $this->put('/seller/properties/'.$property->id, ['title'=>'Changed'])->assertForbidden();
            $this->post('/seller/properties/'.$property->id.'/submit')->assertForbidden();
        }
    }

    public function test_invalid_photo_and_total_photo_limit_are_rejected(): void
    {
        $property = $this->listing($this->member());
        $this->put('/seller/properties/'.$property->id, ['title'=>'Changed','images'=>[UploadedFile::fake()->create('bad.pdf', 10, 'application/pdf')]])->assertSessionHasErrors('images.0');
        for ($i=0; $i<10; $i++) {
            $property->images()->create(['path'=>'fixture-'.$i.'.jpg','sort_order'=>$i]);
        }
        $this->put('/seller/properties/'.$property->id, ['title'=>'Changed','images'=>[$this->photo()]])->assertSessionHasErrors('images');
        $this->assertSame('My land', $property->fresh()->title);
        $this->assertSame(10, $property->images()->count());
    }
}
