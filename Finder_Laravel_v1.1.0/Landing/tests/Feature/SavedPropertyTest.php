<?php
namespace Tests\Feature;
use App\Models\{User, Property, SavedProperty};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
class SavedPropertyTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
    }
    private function member(string $role): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }
    private function listing(): Property
    {
        $seller=$this->member('seller');
        $property=new Property();
        $property->forceFill(['property_code'=>'SAVED-'.uniqid(),'title'=>'Private bookmark test home',
            'owner_id'=>$seller->id,'created_by'=>$seller->id,'category'=>'land','status'=>'published',
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id')])->save();
        return $property;
    }
    public function test_buyer_saves_once_and_removes_with_correct_page_state(): void
    {
        $buyer=$this->member('buyer'); $property=$this->listing();
        $url='/buyer/saved-properties/'.$property->id;
        $this->actingAs($buyer)->get(route('properties.show',$property->property_code))->assertOk()->assertSee('Save property');
        for($i=0;$i<2;$i++) $this->post($url,['user_id'=>999])->assertSessionHasNoErrors()->assertRedirect();
        $this->assertDatabaseCount('saved_properties',1);
        $this->assertDatabaseHas('saved_properties',['user_id'=>$buyer->id,'property_id'=>$property->id]);
        $this->get(route('properties.show',$property->property_code))->assertOk()->assertSee('Remove from saved');
        $this->get('/dashboard/buyer?tab=saved')->assertOk()->assertSee('Saved properties (1)')->assertSee($property->title);
        $this->delete($url)->assertRedirect();
        $this->assertDatabaseCount('saved_properties',0);
    }
    public function test_lists_and_removal_are_scoped_to_the_current_buyer(): void
    {
        $first=$this->member('buyer'); $second=$this->member('buyer'); $property=$this->listing();
        $this->actingAs($first)->post('/buyer/saved-properties/'.$property->id)->assertRedirect();
        $this->actingAs($second)->get('/dashboard/buyer?tab=saved')->assertOk()->assertDontSee($property->title);
        $this->delete('/buyer/saved-properties/'.$property->id,['user_id'=>$first->id])->assertRedirect();
        $this->assertDatabaseHas('saved_properties',['user_id'=>$first->id,'property_id'=>$property->id]);
        $this->post('/buyer/saved-properties/'.$property->id)->assertRedirect();
        $this->assertDatabaseCount('saved_properties',2);
    }
    public function test_listing_badges_reflect_only_the_current_buyers_saved_properties(): void
    {
        $buyer=$this->member('buyer'); $other=$this->member('buyer'); $property=$this->listing();
        $marker='data-saved-property="'.$property->id.'"';
        $this->actingAs($buyer)->post('/buyer/saved-properties/'.$property->id)->assertRedirect();
        foreach(['/properties','/listings-real-estate'] as $url){
            $this->actingAs($buyer)->get($url)->assertOk()->assertSee($marker,false);
            $this->actingAs($other)->get($url)->assertOk()->assertDontSee($marker,false);
        }
        $this->actingAs($buyer)->delete('/buyer/saved-properties/'.$property->id)->assertRedirect();
        $this->get('/properties')->assertOk()->assertDontSee($marker,false);
    }
    public function test_guests_and_non_buyers_cannot_save_or_remove(): void
    {
        $property=$this->listing(); $url='/buyer/saved-properties/'.$property->id;
        $this->post($url)->assertRedirect();
        $this->delete($url)->assertRedirect();
        foreach(['seller','agent','sales','verification','admin'] as $role){
            $this->actingAs($this->member($role))->post($url)->assertForbidden();
            $this->delete($url)->assertForbidden();
        }
        $this->assertDatabaseCount('saved_properties',0);
    }
    public function test_unavailable_listings_cannot_be_saved_and_do_not_leak_details(): void
    {
        $buyer=$this->member('buyer'); $property=$this->listing(); $url='/buyer/saved-properties/'.$property->id;
        $this->actingAs($buyer)->post($url)->assertRedirect();
        $property->update(['status'=>'draft']);
        $this->post($url)->assertNotFound();
        $this->get('/dashboard/buyer?tab=saved')->assertOk()->assertSee('This property is no longer available.')->assertDontSee($property->title);
        $property->delete();
        $this->post($url)->assertNotFound();
        $this->get('/dashboard/buyer?tab=saved')->assertOk()->assertDontSee($property->title);
        $this->delete($url)->assertRedirect();
        $this->assertDatabaseCount('saved_properties',0);
    }
}
