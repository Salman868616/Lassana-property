<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\PropertyStatusHistory;
use App\Models\User;
use App\Services\PropertyReviewWorkflow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertyStatusHistoryTest extends TestCase
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

    private function draft(User $owner): Property
    {
        $this->actingAs($owner)->post('/seller/properties', ['title'=>'History land'])->assertSessionHasNoErrors();
        $p = Property::latest('id')->firstOrFail();
        $p->forceFill(['description'=>'A complete land listing', 'district'=>'Gampaha', 'city'=>'Nittambuwa',
            'location'=>'Test location', 'land_size_perches'=>20, 'total_price'=>2000000])->save();
        $p->images()->create(['path'=>'fixture.jpg', 'sort_order'=>1]);
        return $p;
    }

    private function checks(): array
    {
        return ['identity_checked'=>1, 'information_checked'=>1, 'photos_checked'=>1, 'remarks'=>'Checked all details.'];
    }

    public function test_full_lifecycle_records_order_actor_and_time_without_duplicates(): void
    {
        $seller = $this->member('seller');
        $admin = $this->member('admin');
        $verifier = $this->member('verification');
        $p = $this->draft($seller);
        $this->post('/seller/properties/'.$p->id.'/submit')->assertSessionHasNoErrors();
        $this->actingAs($admin)->post('/admin/properties/'.$p->id.'/start-review')->assertSessionHasNoErrors();
        $this->actingAs($verifier)->post('/verification/properties/'.$p->id.'/approve', $this->checks())->assertSessionHasNoErrors();
        $this->assertDatabaseCount('property_status_histories', 3);
        $this->actingAs($admin);
        foreach (['approve', 'publish', 'mark-sold', 'archive'] as $action) {
            $this->post('/admin/properties/'.$p->id.'/'.$action)->assertSessionHasNoErrors();
        }
        $rows = PropertyStatusHistory::where('property_id', $p->id)->orderBy('id')->get();
        $this->assertSame(['draft','submitted','under_review','approved','published','sold','archived'], $rows->pluck('to_status')->all());
        $this->assertSame([null,'draft','submitted','under_review','approved','published','sold'], $rows->pluck('from_status')->all());
        $this->assertSame([$seller->id,$seller->id,$admin->id,$admin->id,$admin->id,$admin->id,$admin->id], $rows->pluck('actor_id')->all());
        foreach ($rows as $row) $this->assertNotNull($row->created_at);
        $admin->name = 'Renamed admin'; $admin->save();
        $this->assertNotSame('Renamed admin', $rows->last()->fresh()->actor_name);
        $this->post('/admin/properties/'.$p->id.'/archive')->assertSessionHasErrors('status');
        $this->assertDatabaseCount('property_status_histories', 7);
        $this->get('/dashboard/admin/properties/'.$p->id)->assertOk()->assertSee('Status history')->assertSee('Archived');
    }

    public function test_corrections_are_recorded_and_history_is_private(): void
    {
        $seller = $this->member('seller');
        $admin = $this->member('admin');
        $verifier = $this->member('verification');
        $p = $this->draft($seller);
        $this->post('/seller/properties/'.$p->id.'/submit')->assertSessionHasNoErrors();
        $this->actingAs($admin)->post('/admin/properties/'.$p->id.'/start-review')->assertSessionHasNoErrors();
        $note = 'Please correct the boundary measurement.';
        $this->actingAs($verifier)->post('/verification/properties/'.$p->id.'/reject', ['remarks'=>$note])->assertSessionHasNoErrors();
        $this->assertDatabaseHas('property_status_histories', ['property_id'=>$p->id, 'from_status'=>'under_review', 'to_status'=>'draft', 'actor_id'=>$verifier->id, 'remarks'=>$note]);
        $this->actingAs($seller)->get('/dashboard/seller/properties/'.$p->id)->assertOk()->assertSee($note);
        $this->post('/seller/properties/'.$p->id.'/submit')->assertSessionHasNoErrors();
        $this->actingAs($this->member('seller'))->get('/dashboard/seller/properties/'.$p->id)->assertNotFound();
        $agent = $this->member('agent');
        $p->agent_id = $agent->id; $p->save();
        $this->actingAs($agent)->get('/dashboard/agent/properties/'.$p->id)->assertOk()->assertDontSee('Status history')->assertDontSee($note);
        $p->status = 'published'; $p->save();
        $this->get('/properties/'.$p->property_code)->assertOk()->assertDontSee('Status history')->assertDontSee($note);
    }

    public function test_invalid_and_unauthorized_actions_leave_history_unchanged(): void
    {
        $seller = $this->member('seller');
        $p = $this->draft($seller);
        $this->post('/admin/properties/'.$p->id.'/archive')->assertForbidden();
        $this->actingAs($this->member('admin'))->post('/admin/properties/'.$p->id.'/publish')->assertSessionHasErrors('status');
        $this->assertDatabaseCount('property_status_histories', 1);
        $this->assertSame('draft', $p->fresh()->status);
        $p->description = null; $p->save();
        $this->actingAs($seller)->post('/seller/properties/'.$p->id.'/submit')->assertSessionHasErrors('description');
        $this->assertDatabaseCount('property_status_histories', 1);
    }

    public function test_transaction_rollback_reverts_status_and_history_together(): void
    {
        $p = $this->draft($this->member('seller'));
        $admin = $this->member('admin');
        try {
            DB::transaction(function () use ($p, $admin) {
                app(PropertyReviewWorkflow::class)->archive($p->id, $admin);
                throw new \RuntimeException('Rollback fixture');
            });
        } catch (\RuntimeException $error) {
            $this->assertSame('Rollback fixture', $error->getMessage());
        }
        $this->assertSame('draft', $p->fresh()->status);
        $this->assertDatabaseCount('property_status_histories', 1);
    }

    public function test_admin_creation_and_submission_record_admin_actor(): void
    {
        $owner = $this->member('seller');
        $admin = $this->member('admin');
        $this->actingAs($admin)->post('/admin/properties', ['owner_id'=>$owner->id, 'title'=>'Admin history', 'category'=>'land'])->assertSessionHasNoErrors();
        $p = Property::latest('id')->firstOrFail();
        $this->assertDatabaseHas('property_status_histories', ['property_id'=>$p->id, 'event'=>'created', 'to_status'=>'draft', 'actor_id'=>$admin->id]);
        $p->forceFill(['description'=>'Complete land', 'district'=>'Gampaha', 'city'=>'Nittambuwa', 'location'=>'Test', 'land_size_perches'=>20, 'total_price'=>2000000])->save();
        $p->images()->create(['path'=>'fixture.jpg', 'sort_order'=>1]);
        $this->post('/admin/properties/'.$p->id.'/submit')->assertSessionHasNoErrors();
        $this->assertDatabaseHas('property_status_histories', ['property_id'=>$p->id, 'from_status'=>'draft', 'to_status'=>'submitted', 'actor_id'=>$admin->id]);
    }

    public function test_existing_records_get_honest_baseline_including_soft_deleted_properties(): void
    {
        $owner = $this->member('seller');
        $p = $this->draft($owner);
        $p->status = 'published'; $p->save();
        $deleted = $this->draft($owner); $deleted->delete();
        $migration = require database_path('migrations/2026_10_03_120000_create_property_status_histories.php');
        $migration->down(); $migration->up();
        $this->assertDatabaseCount('property_status_histories', 2);
        $this->assertDatabaseHas('property_status_histories', ['property_id'=>$p->id, 'event'=>'baseline', 'from_status'=>null, 'to_status'=>'published', 'actor_id'=>null]);
        $this->assertDatabaseHas('property_status_histories', ['property_id'=>$deleted->id, 'event'=>'baseline', 'to_status'=>'draft']);
        $this->assertSame('published', $p->fresh()->status);
    }
}
