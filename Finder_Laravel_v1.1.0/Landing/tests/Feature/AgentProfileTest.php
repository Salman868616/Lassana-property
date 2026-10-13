<?php

namespace Tests\Feature;

use App\Models\{User, Property};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AgentProfileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
    }

    private function agent(): User
    {
        $agent = User::factory()->create();
        $agent->roles()->attach(DB::table('roles')->where('name', 'agent')->value('id'));
        return $agent;
    }

    private function property(User $agent, string $status): Property
    {
        $property = new Property;
        $property->forceFill([
            'owner_id'=>$agent->id, 'created_by'=>$agent->id, 'agent_id'=>$agent->id,
            'title'=>'Fixture '.\Illuminate\Support\Str::uuid(), 'description'=>'Test property',
            'category'=>'land', 'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>$status, 'district'=>'Gampaha', 'city'=>'Nittambuwa',
            'total_price'=>2000000, 'currency'=>'LKR', 'published_at'=>now(),
        ])->save();
        return $property;
    }

    public function test_only_active_agents_have_public_profiles_and_directory_entries(): void
    {
        $active = $this->agent();
        $inactive = $this->agent();
        $inactive->forceFill(['is_active'=>false])->save();
        $buyer = User::factory()->create();
        $this->get('/agents')->assertOk()->assertSee($active->name)->assertDontSee($inactive->name)->assertDontSee($buyer->name);
        $this->get('/agents/'.$active->id)->assertOk()->assertSee($active->name);
        foreach ([$inactive, $buyer] as $user) $this->get('/agents/'.$user->id)->assertNotFound();
        $this->get('/agents/999999')->assertNotFound();
        $this->get('/vendor-real-estate')->assertRedirect('/agents');
        $this->get('/')->assertOk()->assertSee(route('agents.show',$active),false)->assertDontSee('Ivy Taylor');
    }

    public function test_profile_only_lists_assigned_published_non_deleted_properties(): void
    {
        $agent = $this->agent();
        $public = $this->property($agent,'published');
        $hidden = [];
        foreach (['draft','submitted','under_review','approved','sold','archived'] as $status) $hidden[] = $this->property($agent,$status);
        $deleted = $this->property($agent,'published');
        $deleted->delete();
        $hidden[] = $deleted;
        $hidden[] = $this->property($this->agent(),'published');
        $response = $this->get('/agents/'.$agent->id)->assertOk()->assertSee($public->title)->assertSee('No photo available');
        $this->assertSame(1,$response->viewData('properties')->total());
        foreach ($hidden as $property) $response->assertDontSee($property->title);
        $this->get('/properties/'.$public->property_code)->assertOk()->assertSee(route('agents.show',$agent),false);
    }

    public function test_profile_escapes_biography_and_paginates_real_listings(): void
    {
        $agent = $this->agent();
        $agent->forceFill(['bio'=>'<script>alert(1)</script>', 'agency_name'=>'Example agency', 'service_areas'=>'Gampaha'])->save();
        $empty = $this->get('/agents/'.$agent->id)->assertOk()->assertSee('no published properties')->assertSee('Example agency')->assertSee('Gampaha');
        $empty->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;',false)->assertDontSee('<script>alert(1)</script>',false);
        for ($i=0;$i<10;$i++) $this->property($agent,'published');
        $response = $this->get('/agents/'.$agent->id)->assertOk();
        $this->assertCount(9,$response->viewData('properties'));
        $this->assertSame(10,$response->viewData('properties')->total());
        $this->assertCount(1,$this->get('/agents/'.$agent->id.'?page=2')->assertOk()->viewData('properties'));
    }
}
