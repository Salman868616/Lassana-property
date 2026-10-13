<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PropertyDocumentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
        Storage::fake('property_documents');
        Storage::fake('public');
    }

    private function member(string $role): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }

    private function listing(User $seller): Property
    {
        $this->actingAs($seller)->post('/seller/properties',['title'=>'Document test'])->assertSessionHasNoErrors();
        return Property::latest('id')->firstOrFail();
    }

    private function payload(): array
    {
        return ['document_type'=>'survey','document'=>UploadedFile::fake()->createWithContent('survey.pdf', "%PDF-1.4\n1 0 obj\n<< /Type /Catalog >>\nendobj\n%%EOF")];
    }

    private function downloadUrl(Property $property, int $id, string $role='seller'): string
    {
        return '/dashboard/'.$role.'/properties/'.$property->id.'/documents/'.$id.'/download';
    }

    public function test_owner_uploads_privately_and_downloads_without_public_exposure(): void
    {
        $seller=$this->member('seller');
        $p=$this->listing($seller);
        $this->post('/seller/properties/'.$p->id.'/documents',$this->payload()+['status'=>'verified','uploaded_by'=>999])
            ->assertSessionHasNoErrors()->assertRedirect();
        $file=$p->documents()->firstOrFail();
        $this->assertEquals($seller->id,$file->uploaded_by);
        $this->assertSame('pending',$file->status);
        $this->assertNull($file->verified_at);
        Storage::disk('property_documents')->assertExists($file->path);
        Storage::disk('public')->assertMissing($file->path);
        $response=$this->get($this->downloadUrl($p,$file->id));
        $response->assertOk()->assertDownload('property-'.$p->id.'-document-'.$file->id.'.pdf');
        $response->assertHeader('X-Content-Type-Options','nosniff');
        $this->assertStringContainsString('no-store',$response->headers->get('Cache-Control'));
        $this->get('/dashboard/seller/properties/'.$p->id)->assertOk()->assertSee('Download document');
    }

    public function test_other_owners_and_unrelated_roles_cannot_access_documents(): void
    {
        $owner=$this->member('seller');
        $p=$this->listing($owner);
        $this->post('/seller/properties/'.$p->id.'/documents',$this->payload());
        $file=$p->documents()->firstOrFail();
        $other=$this->member('seller');
        $otherProperty=$this->listing($other);
        $this->get($this->downloadUrl($p,$file->id))->assertNotFound();
        $this->get($this->downloadUrl($otherProperty,$file->id))->assertNotFound();
        $this->post('/seller/properties/'.$p->id.'/documents',$this->payload())->assertNotFound();
        foreach(['buyer','agent','sales'] as $role) {
            $this->actingAs($this->member($role))->get($this->downloadUrl($p,$file->id,'admin'))->assertForbidden();
            $this->post('/seller/properties/'.$p->id.'/documents',$this->payload())->assertForbidden();
        }
        $this->app['auth']->forgetGuards();
        $this->get($this->downloadUrl($p,$file->id))->assertRedirect('/account-signin');
    }

    public function test_admin_and_verifier_download_permissions_follow_property_status(): void
    {
        $p=$this->listing($this->member('seller'));
        $this->post('/seller/properties/'.$p->id.'/documents',$this->payload());
        $file=$p->documents()->firstOrFail();
        $this->actingAs($this->member('admin'))->get($this->downloadUrl($p,$file->id,'admin'))->assertOk();
        $this->actingAs($this->member('verification'))->get($this->downloadUrl($p,$file->id,'verification'))->assertNotFound();
        $p->status='under_review'; $p->save();
        $this->get($this->downloadUrl($p,$file->id,'verification'))->assertOk();
        Storage::disk('property_documents')->delete($file->path);
        $this->get($this->downloadUrl($p,$file->id,'verification'))->assertNotFound();
    }

    public function test_invalid_files_and_document_limit_are_rejected(): void
    {
        $p=$this->listing($this->member('seller'));
        $url='/seller/properties/'.$p->id.'/documents';
        $this->post($url,['document_type'=>'survey','document'=>UploadedFile::fake()->createWithContent('script.php','<?php echo 1;')])->assertSessionHasErrors('document');
        $this->post($url,['document_type'=>'survey','document'=>UploadedFile::fake()->create('big.pdf',10241,'application/pdf')])->assertSessionHasErrors('document');
        $this->post($url,array_replace($this->payload(),['document_type'=>'unknown']))->assertSessionHasErrors('document_type');
        for($i=0;$i<10;$i++) {
            $p->documents()->create(['uploaded_by'=>$p->owner_id,'document_type'=>'survey','path'=>'properties/'.$p->id.'/fixture'.$i.'.pdf','status'=>'pending']);
        }
        $this->post($url,$this->payload())->assertSessionHasErrors('document');
        $this->assertSame(10,$p->documents()->count());
        $this->assertCount(0,Storage::disk('property_documents')->allFiles());
    }

    public function test_uploads_lock_after_submission_and_download_rejects_unsafe_paths(): void
    {
        $p=$this->listing($this->member('seller'));
        foreach(['submitted','under_review','approved','published'] as $status) {
            $p->status=$status; $p->save();
            $this->post('/seller/properties/'.$p->id.'/documents',$this->payload())->assertForbidden();
        }
        $file=$p->documents()->create(['uploaded_by'=>$p->owner_id,'document_type'=>'survey','path'=>'../outside.pdf','status'=>'pending']);
        $this->get($this->downloadUrl($p,$file->id))->assertNotFound();
        $this->assertCount(0,Storage::disk('property_documents')->allFiles());
    }
}
