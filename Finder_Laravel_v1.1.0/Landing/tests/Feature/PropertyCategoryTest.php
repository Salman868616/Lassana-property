<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertyCategoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
    }

    private function member(string $role): User
    {
        $u=User::factory()->create();
        $u->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $u;
    }

    private function data(string $category): array
    {
        return ['category'=>$category,'title'=>'Sample '.$category,'description'=>'Property for sale',
            'district'=>'Colombo','city'=>'Dehiwala','location'=>'Sample address','total_price'=>1000000,
            'land_size_perches'=>10,'details'=>['bedrooms'=>2,'bathrooms'=>1,'floor_area'=>1200,
            'parking_spaces'=>1,'total_floors'=>2,'floor_number'=>3,'unit_type'=>'Office']];
    }

    public function test_seller_and_admin_can_create_all_categories_with_matching_details(): void
    {
        $owner=$this->member('seller');
        foreach(['seller','admin'] as $role) {
            $this->actingAs($role === 'seller' ? $owner : $this->member('admin'));
            $prefix=$role === 'seller' ? '/seller/properties' : '/admin/properties';
            $this->get($prefix.'/create')->assertOk()->assertSee('Property category');
            foreach(['land','house','apartment','commercial'] as $category) {
                $this->post($prefix,$this->data($category)+['owner_id'=>$owner->id])->assertSessionHasNoErrors();
                $p=Property::latest('id')->firstOrFail();
                $this->assertSame($category,$p->category);
                $this->assertSame($category,$p->propertyCategory->slug);
                $this->assertSame('draft',$p->status);
                $this->get($prefix.'/'.$p->id.'/edit')->assertOk();
                if($category === 'land') $this->assertNull($p->details);
                else {
                    $this->assertSame('1200.00',$p->details->floor_area);
                    $this->assertSame($category,$p->details->property_type);
                    if($category === 'commercial') $this->assertNull($p->details->bedrooms);
                    if($category === 'apartment') $this->assertNull($p->land_size_perches);
                }
            }
        }
    }

    public function test_category_changes_clear_inapplicable_fields_and_preserve_protection(): void
    {
        $seller=$this->member('seller');
        $this->actingAs($seller)->post('/seller/properties',$this->data('house'))->assertSessionHasNoErrors();
        $p=Property::latest('id')->firstOrFail();
        $this->put('/seller/properties/'.$p->id,$this->data('commercial')+['owner_id'=>999,'status'=>'published','property_category_id'=>999])->assertSessionHasNoErrors();
        $p->refresh();
        $this->assertSame('commercial',$p->propertyCategory->slug);
        $this->assertNull($p->details->bedrooms);
        $this->assertNull($p->land_size_perches);
        $this->assertSame('draft',$p->status);
        $this->assertEquals($seller->id,$p->owner_id);
        $this->put('/seller/properties/'.$p->id,$this->data('land'))->assertSessionHasNoErrors();
        $this->assertNull($p->fresh()->details);
    }

    public function test_building_submission_and_review_require_category_details(): void
    {
        foreach(['house','apartment','commercial'] as $category) {
            $this->actingAs($this->member('seller'));
            $data=$this->data($category); unset($data['details'],$data['land_size_perches']);
            $this->post('/seller/properties',$data)->assertSessionHasNoErrors();
            $p=Property::latest('id')->firstOrFail();
            $p->images()->create(['path'=>'fixture.jpg','sort_order'=>1]);
            $this->post('/seller/properties/'.$p->id.'/submit')->assertSessionHasErrors('floor_area');
            $complete=$this->data($category); unset($complete['land_size_perches']);
            $this->put('/seller/properties/'.$p->id,$complete)->assertSessionHasNoErrors();
            $this->post('/seller/properties/'.$p->id.'/submit')->assertSessionHasNoErrors();
            $this->actingAs($this->member('admin'));
            $this->post('/admin/properties/'.$p->id.'/start-review')->assertSessionHasNoErrors();
            $this->post('/verification/properties/'.$p->id.'/approve',['identity_checked'=>1,'information_checked'=>1,'photos_checked'=>1,'remarks'=>'Sample checks'])->assertSessionHasNoErrors();
            $this->post('/admin/properties/'.$p->id.'/approve')->assertSessionHasNoErrors();
            $this->post('/admin/properties/'.$p->id.'/publish')->assertSessionHasNoErrors();
            $this->get('/properties/'.$p->property_code)->assertOk()->assertSee('1200.00 sq ft')->assertDontSee('Price per perch');
            $this->get('/properties?category='.$category)->assertOk()->assertSee('Sample '.$category);
        }
    }

    public function test_house_age_and_condition_save_display_validate_and_clear(): void
    {
        $owner=$this->member('seller');
        foreach (['admin','seller'] as $role) {
            $this->actingAs($role === 'seller' ? $owner : $this->member('admin'));
            $prefix='/'.$role.'/properties';
            $data=$this->data('house') + ['owner_id'=>$owner->id];
            $data['details'] += ['property_age'=>0,'condition'=>'New'];
            $this->post($prefix,$data)->assertSessionHasNoErrors();
            $p=Property::latest('id')->firstOrFail();
            $this->assertEquals(0,$p->details->property_age);
            $this->assertSame('New',$p->details->condition);
            $this->get($prefix.'/'.$p->id.'/edit')->assertOk()->assertSee('Property age')->assertSee('value="New"',false);
            $p->update(['status'=>'published']);
            $this->get('/properties/'.$p->property_code)->assertOk()->assertSee('Property age (years)')->assertSee('>0<',false)->assertSee('New');
            $this->get('/dashboard/'.$role.'/properties/'.$p->id)->assertOk()->assertSee('Property age (years): 0')->assertSee('Condition: New');
            $p->update(['status'=>'draft']);
            foreach ([-1,1.5,65536,'invalid'] as $age) {
                $invalid=$data;
                $invalid['details']['property_age']=$age;
                $this->put($prefix.'/'.$p->id,$invalid)->assertSessionHasErrors('details.property_age');
            }
            $invalid=$data;
            $invalid['details']['condition']=str_repeat('x',51);
            $this->put($prefix.'/'.$p->id,$invalid)->assertSessionHasErrors('details.condition');
            $this->assertEquals(0,$p->fresh()->details->property_age);
            $data['details']['property_age']=15;
            $data['details']['condition']='Needs renovation';
            $this->put($prefix.'/'.$p->id,$data)->assertSessionHasNoErrors();
            $this->assertEquals(15,$p->fresh()->details->property_age);
            $this->assertSame('Needs renovation',$p->fresh()->details->condition);
            $clear=$data;
            $clear['details']['property_age']='';
            $clear['details']['condition']='';
            $this->put($prefix.'/'.$p->id,$clear)->assertSessionHasNoErrors();
            $this->assertNull($p->fresh()->details->property_age);
            $this->assertNull($p->fresh()->details->condition);
            $this->put($prefix.'/'.$p->id,$data)->assertSessionHasNoErrors();
            $data['category']='apartment';
            $this->put($prefix.'/'.$p->id,$data)->assertSessionHasNoErrors();
            $this->assertNull($p->fresh()->details->property_age);
            $this->assertNull($p->fresh()->details->condition);
        }
    }

    public function test_invalid_and_inactive_categories_and_invalid_details_are_rejected(): void
    {
        $this->actingAs($this->member('seller'));
        $this->post('/seller/properties',$this->data('unknown'))->assertSessionHasErrors('category');
        DB::table('property_categories')->where('slug','house')->update(['is_active'=>false]);
        $this->post('/seller/properties',$this->data('house'))->assertSessionHasErrors('category');
        $data=$this->data('apartment'); $data['details']['bedrooms']=256;
        $this->post('/seller/properties',$data)->assertSessionHasErrors('details.bedrooms');
        $this->assertSame(0,Property::count());
    }
    public function test_apartment_fields_save_render_clear_and_reject_invalid_input(): void
    {
        $owner = $this->member('seller');
        foreach (['seller', 'admin'] as $role) {
            $this->actingAs($role === 'seller' ? $owner : $this->member('admin'));
            $prefix = '/'.$role.'/properties';
            $data = $this->data('apartment') + ['owner_id'=>$owner->id];
            $data['details'] += ['developer'=>'Lassana Developments', 'amenities'=>"Swimming pool\n Gym \nSwimming pool\n"];
            $data['details']['unit_type'] = 'Penthouse';
            $this->post($prefix, $data)->assertSessionHasNoErrors();
            $p = Property::latest('id')->firstOrFail();
            $this->assertSame('Lassana Developments', $p->details->developer);
            $this->assertSame('Penthouse', $p->details->unit_type);
            $this->assertSame(['Swimming pool','Gym'], $p->details->amenities);
            $this->get($prefix.'/'.$p->id.'/edit')->assertOk()->assertSee('Lassana Developments')->assertSee('Swimming pool');
            $p->forceFill(['status'=>'published'])->save();
            $this->get('/properties/'.$p->property_code)->assertOk()->assertSee('Facilities')->assertSee('Swimming pool, Gym')->assertSee('Penthouse')->assertSee('Lassana Developments');
            $this->get('/properties?category=apartment')->assertOk()->assertSee('Swimming pool, Gym');
            $p->forceFill(['status'=>'draft'])->save();
            $invalid = $data;
            $invalid['details']['developer'] = str_repeat('x',151);
            $invalid['details']['unit_type'] = str_repeat('x',101);
            $invalid['details']['amenities'] = str_repeat('x',3001);
            $this->put($prefix.'/'.$p->id, $invalid)->assertSessionHasErrors(['details.developer','details.unit_type','details.amenities']);
            $data['details']['amenities'] = '';
            $this->put($prefix.'/'.$p->id, $data)->assertSessionHasNoErrors();
            $this->assertSame([], $p->fresh()->details->amenities);
            $this->put($prefix.'/'.$p->id, $this->data('house') + ['owner_id'=>$owner->id])->assertSessionHasNoErrors();
            $this->assertNull($p->fresh()->details->developer);
            $this->assertNull($p->fresh()->details->amenities);
            $this->assertNull($p->fresh()->details->unit_type);
        }
    }
}