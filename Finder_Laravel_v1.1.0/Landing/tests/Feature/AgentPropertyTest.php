<?php
namespace Tests\Feature;

use App\Models\{Property,User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\{DB,Storage};
use Tests\TestCase;

class AgentPropertyTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
        foreach(['public','local','property_documents'] as $disk) Storage::fake($disk);
    }
    private function member(string $role): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }
    private function photo(): UploadedFile
    {
        return UploadedFile::fake()->createWithContent('land.png',base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jRZkAAAAASUVORK5CYII='));
    }
    private function listing(User $agent,User $seller): Property
    {
        $this->actingAs($agent)->post('/agent/properties',[
            'title'=>'Agent land','seller_email'=>$seller->email,'category'=>'land',
            'owner_id'=>999,'agent_id'=>999,'status'=>'published','verification_level'=>'silver',
        ])->assertRedirect()->assertSessionHasNoErrors();
        return Property::latest('id')->firstOrFail();
    }
    public function test_agent_draft_records_seller_and_agent_separately_and_shows_actions(): void
    {
        $agent=$this->member('agent');$seller=$this->member('seller');
        $this->actingAs($agent)->get('/agent/properties/create')->assertOk()->assertSee('Registered seller email');
        $p=$this->listing($agent,$seller);
        $this->assertEquals($seller->id,$p->owner_id);
        $this->assertEquals($agent->id,$p->agent_id);
        $this->assertEquals($agent->id,$p->created_by);
        $this->assertSame('draft',$p->status);
        $this->assertSame('unverified',$p->verification_level);
        $this->get('/dashboard/agent?tab=properties')->assertOk()->assertSee('/agent/properties/create',false);
        $this->get('/dashboard/agent/properties/'.$p->id)->assertOk()->assertSee('Submit for review')->assertSee('Upload private document');
        $this->get('/agent/properties/'.$p->id.'/edit')->assertOk();
        $this->put('/agent/properties/'.$p->id,['title'=>'Edited','owner_id'=>$agent->id,'agent_id'=>999])->assertSessionHasNoErrors();
        $this->assertEquals($seller->id,$p->fresh()->owner_id);
        $this->assertEquals($agent->id,$p->fresh()->agent_id);
    }
    public function test_non_agents_and_invalid_sellers_cannot_create(): void
    {
        $this->get('/agent/properties/create')->assertRedirect();
        foreach(['buyer','seller','admin','sales','verification'] as $role) $this->actingAs($this->member($role))->post('/agent/properties',['title'=>'Blocked'])->assertForbidden();
        $agent=$this->member('agent');$buyer=$this->member('buyer');$seller=$this->member('seller');
        $seller->forceFill(['is_active'=>false])->save();
        foreach(['',$buyer->email,$seller->email,'absent@example.test'] as $email) $this->actingAs($agent)->post('/agent/properties',['title'=>'Bad','seller_email'=>$email])->assertSessionHasErrors('seller_email');
        $this->assertSame(0,Property::count());
    }
    public function test_agent_uploads_media_and_submits_but_cannot_skip_review(): void
    {
        $agent=$this->member('agent');$p=$this->listing($agent,$this->member('seller'));
        $this->post('/agent/properties/'.$p->id.'/submit')->assertSessionHasErrors();
        $this->put('/agent/properties/'.$p->id,[
            'title'=>'Ready land','description'=>'Land for sale','district'=>'Gampaha','city'=>'Nittambuwa',
            'location'=>'Test location','total_price'=>2000000,'land_size_perches'=>20,'images'=>[$this->photo()],
            'video_url'=>'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ])->assertSessionHasNoErrors();
        $this->assertCount(1,$p->fresh()->images);
        $this->assertNotNull($p->fresh()->video_url);
        $this->post('/agent/properties/'.$p->id.'/documents',['document_type'=>'survey','document'=>$this->photo()])->assertSessionHasNoErrors();
        $doc=$p->documents()->firstOrFail();
        $this->get('/dashboard/agent/properties/'.$p->id.'/documents/'.$doc->id.'/download')->assertOk();
        $this->post('/agent/properties/'.$p->id.'/submit')->assertSessionHasNoErrors();
        $this->assertSame('submitted',$p->fresh()->status);
        foreach(['submitted','under_review','approved','published','sold','archived'] as $status) {
            $p->status=$status;$p->save();
            $this->put('/agent/properties/'.$p->id,['title'=>'Blocked'])->assertForbidden();
            $this->post('/agent/properties/'.$p->id.'/documents')->assertForbidden();
            $this->post('/dashboard/agent/properties/'.$p->id.'/videos')->assertForbidden();
        }
        $this->post('/admin/properties/'.$p->id.'/publish')->assertForbidden();
        $this->post('/verification/properties/'.$p->id.'/approve')->assertForbidden();
    }
    public function test_another_agent_cannot_read_edit_submit_or_upload_to_listing(): void
    {
        $p=$this->listing($this->member('agent'),$this->member('seller'));
        $this->actingAs($this->member('agent'));
        $this->get('/dashboard/agent/properties/'.$p->id)->assertNotFound();
        $this->get('/agent/properties/'.$p->id.'/edit')->assertNotFound();
        $this->put('/agent/properties/'.$p->id,['title'=>'Stolen'])->assertNotFound();
        $this->post('/agent/properties/'.$p->id.'/submit')->assertNotFound();
        $this->post('/agent/properties/'.$p->id.'/documents')->assertNotFound();
        $this->post('/dashboard/agent/properties/'.$p->id.'/videos')->assertNotFound();
        $this->assertSame('draft',$p->fresh()->status);
    }
}
