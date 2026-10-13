<?php
namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AdminPublishingTest extends TestCase
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

    private function listing(string $status, string $title): Property
    {
        $owner = $this->member('seller');
        $p = new Property;
        $p->forceFill(['owner_id'=>$owner->id, 'created_by'=>$owner->id, 'title'=>$title, 'description'=>'Land for sale',
            'category'=>'land', 'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>$status, 'verification_level'=>'basic', 'district'=>'Gampaha', 'city'=>'Nittambuwa',
            'location'=>'Test location', 'land_size_perches'=>20, 'total_price'=>2000000, 'currency'=>'LKR', 'published_at'=>now()])->save();
        $p->images()->create(['path'=>'fixture.jpg', 'sort_order'=>1]);
        $p->verifications()->create(['level'=>'basic', 'status'=>'approved', 'reviewed_at'=>now()]);
        return $p;
    }

    public function test_queue_filters_paginate_and_exclude_non_review_statuses(): void
    {
        $admin = $this->member('admin');
        foreach (['draft','submitted','under_review','approved','published','sold','archived'] as $status) {
            $this->listing($status, 'Queue fixture '.$status);
        }
        $this->actingAs($admin)->get('/admin/properties?queue=review')->assertOk()
            ->assertSee('Queue fixture submitted')->assertSee('Queue fixture under_review')->assertSee('Queue fixture approved')
            ->assertDontSee('Queue fixture draft')->assertDontSee('Queue fixture published')->assertDontSee('Queue fixture sold')->assertDontSee('Queue fixture archived');
        for ($i=0; $i<16; $i++) $this->listing('submitted', 'Extra submission '.$i);
        $response = $this->get('/admin/properties?queue=review&status=submitted')->assertOk()->assertDontSee('Queue fixture approved');
        $response->assertViewHas('properties', fn ($rows) => $rows->total() === 17 && $rows->count() === 15);
        $this->assertStringContainsString('status=submitted', $response->viewData('properties')->nextPageUrl());
        $this->get('/admin/properties?queue=review&status=submitted&page=2')->assertOk()
            ->assertViewHas('properties', fn ($rows) => $rows->count() === 2);
        $this->get('/admin/properties?queue=review&status=published')->assertSessionHasErrors('status');
        $this->get('/admin/properties?status=made-up')->assertSessionHasErrors('status');
        $this->actingAs($this->member('seller'))->get('/admin/properties?queue=review')->assertForbidden();
    }

    public function test_unpublish_hides_listing_and_alias_records_reason_and_allows_republication(): void
    {
        $admin = $this->member('admin');
        $p = $this->listing('published', 'Unpublish fixture');
        $oldCode = $p->property_code;
        $p->district = 'Colombo'; $p->save();
        $this->actingAs($admin)->get('/dashboard/admin/properties/'.$p->id)->assertOk()->assertSee('Unpublish property');
        $this->post('/admin/properties/'.$p->id.'/unpublish', ['remarks'=>'Temporarily withdrawn by owner.'])->assertSessionHasNoErrors();
        $this->assertSame('approved', $p->fresh()->status);
        $this->assertSame('basic', $p->fresh()->verification_level);
        $this->assertNull($p->fresh()->published_at);
        $this->assertDatabaseHas('property_status_histories', ['property_id'=>$p->id, 'from_status'=>'published', 'to_status'=>'approved', 'actor_id'=>$admin->id, 'remarks'=>'Unpublished: Temporarily withdrawn by owner.']);
        $this->get('/properties/'.$p->property_code)->assertNotFound();
        $this->get('/properties/'.$oldCode)->assertNotFound();
        $this->get('/properties')->assertOk()->assertDontSee('Unpublish fixture');
        $this->get('/')->assertOk()->assertDontSee('Unpublish fixture');
        $this->get('/admin/properties/'.$p->id.'/edit')->assertForbidden();
        $this->post('/admin/properties/'.$p->id.'/publish')->assertSessionHasNoErrors();
        $this->get('/properties/'.$p->property_code)->assertOk();
        $this->assertDatabaseHas('property_status_histories', ['property_id'=>$p->id, 'from_status'=>'approved', 'to_status'=>'published']);
    }

    public function test_unpublish_requires_admin_reason_and_published_status(): void
    {
        $p = $this->listing('published', 'Protected listing');
        $url = '/admin/properties/'.$p->id.'/unpublish';
        $this->post($url, ['remarks'=>'Hide'])->assertRedirect('/account-signin');
        foreach (['seller','agent','buyer','sales','verification'] as $role) {
            $this->actingAs($this->member($role))->post($url, ['remarks'=>'Hide'])->assertForbidden();
        }
        $this->actingAs($this->member('admin'))->post($url)->assertSessionHasErrors('remarks');
        $this->assertSame('published', $p->fresh()->status);
        foreach (['draft','submitted','under_review','approved','sold','archived'] as $status) {
            $p->status = $status; $p->save();
            $this->post($url, ['remarks'=>'Hide'])->assertSessionHasErrors('status');
            $this->assertSame($status, $p->fresh()->status);
        }
        $this->assertDatabaseCount('property_status_histories', 0);
    }
}
