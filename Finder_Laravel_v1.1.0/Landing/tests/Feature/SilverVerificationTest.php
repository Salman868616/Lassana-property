<?php
namespace Tests\Feature;

use App\Models\{Property,User};
use App\Services\PropertyReviewWorkflow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{DB,Storage};
use Tests\TestCase;

class SilverVerificationTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
        Storage::fake('property_documents');
    }
    private function member(string $role): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }
    private function fixture(): array
    {
        $reviewer=$this->member('verification'); $seller=$this->member('seller');
        $p=new Property;
        $p->forceFill(['owner_id'=>$seller->id,'created_by'=>$seller->id,'title'=>'Silver land','description'=>'Surveyed land',
            'category'=>'land','property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>'under_review','verification_level'=>'unverified','district'=>'Gampaha','city'=>'Nittambuwa',
            'location'=>'Test location','land_size_perches'=>20,'total_price'=>2000000,'currency'=>'LKR'])->save();
        $p->images()->create(['path'=>'fixture.jpg','sort_order'=>1]);
        app(PropertyReviewWorkflow::class)->verify($p->id,$reviewer,'Identity, details and photos reviewed.');
        $data=['survey_checked'=>1,'documents_checked'=>1,'remarks'=>'Survey boundaries and ownership evidence checked.'];
        foreach (['survey','ownership'] as $type) {
            $path='properties/'.$p->id.'/'.$type.'.pdf';
            Storage::disk('property_documents')->put($path,'test document');
            $doc=$p->documents()->create(['uploaded_by'=>$seller->id,'document_type'=>$type,'path'=>$path,'status'=>'approved','verified_at'=>now()]);
            $doc->review()->create(['reviewer_id'=>$reviewer->id,'decision'=>'approved','remarks'=>'Evidence reviewed.']);
            $data[$type.'_document_id']=$doc->id;
        }
        return [$p->refresh(),$reviewer,$data];
    }
    public function test_silver_records_evidence_reviewer_and_time_and_allows_admin_publication(): void
    {
        [$p,$reviewer,$data]=$this->fixture(); $url='/verification/properties/'.$p->id.'/silver';
        $this->actingAs($reviewer)->get('/dashboard/verification/properties/'.$p->id)->assertOk()->assertSee('Confirm Silver verification');
        $this->post($url,$data)->assertRedirect()->assertSessionHasNoErrors();
        $this->assertSame('silver',$p->fresh()->verification_level);
        $this->assertSame('under_review',$p->fresh()->status);
        $review=$p->verifications()->latest('id')->first();
        $this->assertEquals($reviewer->id,$review->reviewer_id);
        $this->assertNotNull($review->reviewed_at);
        $this->assertStringContainsString('Survey document #'.$data['survey_document_id'],$review->remarks);
        $this->assertStringContainsString($data['remarks'],$review->remarks);
        $this->post($url,$data)->assertSessionHasErrors('verification');
        $this->assertSame(1,$p->verifications()->where('level','silver')->count());
        $this->actingAs($this->member('admin'))->get('/dashboard/admin/properties/'.$p->id)->assertOk()->assertSee('Approve listing');
        $this->post('/admin/properties/'.$p->id.'/approve')->assertSessionHasNoErrors();
        $this->post('/admin/properties/'.$p->id.'/publish')->assertSessionHasNoErrors();
        $this->assertSame('published',$p->fresh()->status);
        $this->get('/properties/'.$p->property_code)->assertOk()->assertSee('Silver');
        $this->post('/admin/properties/'.$p->id.'/return-to-draft',['remarks'=>'Updated evidence required'])->assertSessionHasNoErrors();
        $this->assertSame('unverified',$p->fresh()->verification_level);
    }
    public function test_missing_checks_and_invalid_evidence_cannot_grant_silver(): void
    {
        [$p,$reviewer,$data]=$this->fixture(); $url='/verification/properties/'.$p->id.'/silver';
        $this->actingAs($reviewer);
        foreach (['survey_checked','documents_checked','remarks','survey_document_id','ownership_document_id'] as $field) {
            $invalid=$data; unset($invalid[$field]);
            $this->post($url,$invalid)->assertSessionHasErrors($field);
        }
        [$other,,$foreign]=$this->fixture();
        $this->post($url,array_replace($data,['survey_document_id'=>$foreign['survey_document_id']]))->assertSessionHasErrors('survey_document_id');
        $this->post($url,array_replace($data,['survey_document_id'=>$data['ownership_document_id']]))->assertSessionHasErrors('survey_document_id');
        $doc=$p->documents()->findOrFail($data['survey_document_id']);
        foreach (['pending','rejected'] as $status) {
            $doc->update(['status'=>$status]);
            $this->post($url,$data)->assertSessionHasErrors('survey_document_id');
        }
        $doc->update(['status'=>'approved']);
        Storage::disk('property_documents')->delete($doc->path);
        $this->post($url,$data)->assertSessionHasErrors('survey_document_id');
        $this->assertSame('basic',$p->fresh()->verification_level);
        $this->assertSame(0,$p->verifications()->where('level','silver')->count());
    }
    public function test_roles_status_and_basic_prerequisite_cannot_be_bypassed(): void
    {
        [$p,$reviewer,$data]=$this->fixture(); $url='/verification/properties/'.$p->id.'/silver';
        $this->post($url,$data)->assertRedirect('/account-signin');
        foreach (['seller','agent','buyer','sales'] as $role) {
            $this->actingAs($this->member($role))->post($url,$data)->assertForbidden();
        }
        $this->actingAs($reviewer);
        foreach (['draft','submitted','sold','archived'] as $status) {
            $p->update(['status'=>$status]);
            $this->post($url,$data)->assertSessionHasErrors('status');
        }
        $p->refresh()->update(['status'=>'under_review','verification_level'=>'unverified']);
        $this->assertSame('unverified',$p->fresh()->verification_level);
        $this->post($url,$data)->assertSessionHasErrors('verification');
        $p->update(['verification_level'=>'basic']);
        $p->verifications()->delete();
        $this->post($url,$data)->assertSessionHasErrors('status');
    }
    public function test_upgrade_preserves_approved_and_published_status(): void
    {
        foreach (['approved','published'] as $status) {
            [$p,$reviewer,$data]=$this->fixture();
            $p->forceFill(['status'=>$status,'published_at'=>$status==='published' ? now() : null])->save();
            $published=$p->fresh()->published_at?->toISOString();
            $this->actingAs($reviewer)->post('/verification/properties/'.$p->id.'/silver',$data)->assertSessionHasNoErrors();
            $this->assertSame($status,$p->fresh()->status);
            $this->assertSame($published,$p->fresh()->published_at?->toISOString());
        }
    }
}
