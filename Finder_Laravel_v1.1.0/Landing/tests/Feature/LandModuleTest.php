<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LandModuleTest extends TestCase
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

    private function data(User $owner): array
    {
        return ['owner_id'=>$owner->id,'category'=>'land','title'=>'Land module fixture',
            'description'=>'Land for sale','district'=>'Gampaha','city'=>'Nittambuwa','location'=>'Sample address',
            'land_size_perches'=>'12.5000','price_per_perch'=>'100000.25','total_price'=>'1250003.13',
            'road_access'=>'20-foot road','land_shape'=>'Rectangular','facing_direction'=>'north',
            'electricity_available'=>'1','water_available'=>'0','survey_available'=>'1',
            'latitude'=>'7.1420000','longitude'=>'80.0980000'];
    }

    public function test_admin_and_seller_save_reopen_and_clear_land_details(): void
    {
        $owner=$this->member('seller');
        foreach (['admin','seller'] as $role) {
            $this->actingAs($role === 'seller' ? $owner : $this->member('admin'));
            $prefix='/'.$role.'/properties';
            $data=$this->data($owner);
            $this->post($prefix,$data)->assertSessionHasNoErrors();
            $p=Property::latest('id')->firstOrFail();
            foreach (['land_size_perches','price_per_perch','total_price','latitude','longitude','road_access','land_shape','facing_direction','district','city','location'] as $field) {
                $this->assertSame($data[$field],$p->{$field});
            }
            $this->assertTrue($p->electricity_available);
            $this->assertFalse($p->water_available);
            $this->assertTrue($p->survey_available);
            $this->get($prefix.'/'.$p->id.'/edit')->assertOk()->assertSee('20-foot road')->assertSee('Rectangular');
            $this->get('/dashboard/'.$role.'/properties/'.$p->id)->assertOk()
                ->assertSee('12.5000 perches')->assertSee('100,000.25')->assertSee('Survey available')
                ->assertSee('https://www.google.com/maps?q=7.1420000,80.0980000',false)->assertSee('>No<',false);
            $changed=array_replace($data,['land_size_perches'=>'15.0000','price_per_perch'=>'200000.00','total_price'=>'3000000.00']);
            $this->put($prefix.'/'.$p->id,$changed)->assertSessionHasNoErrors();
            $this->assertSame('15.0000',$p->fresh()->land_size_perches);
            $this->assertSame('200000.00',$p->fresh()->price_per_perch);
            $this->assertSame('3000000.00',$p->fresh()->total_price);
            $cleared=array_replace($changed,array_fill_keys(['price_per_perch','road_access','land_shape','facing_direction','electricity_available','water_available','survey_available','latitude','longitude'],''));
            $this->put($prefix.'/'.$p->id,$cleared)->assertSessionHasNoErrors();
            $this->assertNull($p->fresh()->survey_available);
            $this->assertNull($p->fresh()->price_per_perch);
            $this->get('/dashboard/'.$role.'/properties/'.$p->id)->assertOk()->assertSee('Unknown')->assertDontSee('View on Google Maps');
        }
    }

    public function test_invalid_land_values_are_rejected_without_creating_records(): void
    {
        $owner=$this->member('seller');
        foreach (['admin','seller'] as $role) {
            $this->actingAs($role === 'seller' ? $owner : $this->member('admin'));
            foreach (['land_size_perches'=>0,'price_per_perch'=>-1,'total_price'=>'12.345',
                'electricity_available'=>'maybe','water_available'=>2,'survey_available'=>'yes',
                'facing_direction'=>'up','latitude'=>91,'longitude'=>181,'city'=>'INVALID CITY'] as $field=>$value) {
                $this->post('/'.$role.'/properties',array_replace($this->data($owner),[$field=>$value]))
                    ->assertSessionHasErrors($field);
            }
            $this->post('/'.$role.'/properties',array_replace($this->data($owner),['longitude'=>'']))
                ->assertSessionHasErrors('longitude');
        }
        $this->assertDatabaseCount('properties',0);
    }

    public function test_published_land_shows_pricing_utilities_and_map_without_private_survey_path(): void
    {
        $owner=$this->member('seller');
        $this->actingAs($owner)->post('/seller/properties',$this->data($owner))->assertSessionHasNoErrors();
        $p=Property::latest('id')->firstOrFail();
        $p->update(['status'=>'published']);
        $p->documents()->create(['uploaded_by'=>$owner->id,'document_type'=>'survey','path'=>'private-surveys/secret.pdf','status'=>'pending']);
        $this->get('/properties/'.$p->property_code)->assertOk()->assertSee('12.50 perches')
            ->assertSee('100,000.25')->assertSee('1,250,003.13')->assertSee('20-foot road')
            ->assertSee('Rectangular')->assertSee('North')->assertSee('Survey available')->assertSee('>No<',false)
            ->assertSee('View on Google Maps')->assertDontSee('private-surveys/secret.pdf');
    }
}
