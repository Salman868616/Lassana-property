<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LegacyAccountRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_legacy_pages_require_signin_and_pending_otp_cannot_bypass_it(): void
    {
        foreach (['account-listings','account-reviews','account-favorites','account-payment','account-settings',
            'add-property-type','add-property-location','add-property-photos','add-property-details',
            'add-property-price','add-property-contact-info','add-property-promotion'] as $path) {
            $this->get('/'.$path)->assertRedirect('/account-signin');
        }
        $user=User::factory()->create();
        $this->actingAs($user)->withSession(['otp_verified'=>null])->get('/add-property-type')->assertRedirect('/verify-email');
    }

    public function test_legacy_routes_use_real_role_scoped_pages_and_never_save_wizard_data(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        foreach (['admin','seller','agent','buyer','sales','verification'] as $role) {
            $user=User::factory()->create();
            $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
            $this->actingAs($user);
            $destination=in_array($role,['admin','seller','agent'])
                ? route($role.'.properties.create') : route('account-profile');
            foreach (['type','location','photos','details','price','contact-info','promotion'] as $step) {
                $this->get('/add-property-'.$step)->assertRedirect($destination);
            }
            foreach (['type','location'] as $step) {
                $this->post('/add-property-'.$step,['type'=>'house','city'=>'Fake city'])
                    ->assertStatus(303)->assertRedirect($destination);
            }
            $listDestination=match($role) {
                'admin'=>route('admin.properties.index'),
                'seller','agent'=>route('dashboard.role',['role'=>$role,'tab'=>'properties']),
                default=>route('account-profile'),
            };
            $this->get('/account-listings')->assertRedirect($listDestination);
            $this->get('/account-favorites')->assertRedirect($role==='buyer'
                ? route('dashboard.role',['role'=>'buyer','tab'=>'saved']) : route('account-profile'));
            foreach (['reviews','payment','settings'] as $page) {
                $this->get('/account-'.$page)->assertRedirect('/account-profile');
            }
        }
        $this->assertDatabaseCount('properties',0);
        $this->assertDatabaseCount('revenue_payments',0);
    }
}
