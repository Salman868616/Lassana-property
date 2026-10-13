<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DocumentReviewTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
        Storage::fake('property_documents');
    }

    private function member(string $role): User
    {
        $u=User::factory()->create();
        $u->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $u;
    }

    private function fixture(): array
    {
        $seller=$this->member('seller');
        $this->actingAs($seller)->post('/seller/properties',['title'=>'Review documents'])->assertSessionHasNoErrors();
        $p=Property::latest('id')->firstOrFail();
        $p->status='under_review'; $p->save();
        $path='properties/'.$p->id.'/sample.pdf';
        Storage::disk('property_documents')->put($path,'%PDF-1.4 sample');
        $d=$p->documents()->create(['uploaded_by'=>$seller->id,'document_type'=>'survey','path'=>$path,'status'=>'pending']);
        return [$seller,$p,$d];
    }

    private function url($p,$d,string $role='admin'): string
    {
        return '/dashboard/'.$role.'/properties/'.$p->id.'/documents/'.$d->id.'/review';
    }

    private function decision(string $value='approved'): array
    {
        return ['decision'=>$value,'remarks'=>'Sample evidence checked.','evidence_checked'=>1];
    }

    public function test_admin_approval_records_reviewer_and_leaves_property_unchanged(): void
    {
        [$seller,$p,$d]=$this->fixture();
        $admin=$this->member('admin');
        $this->actingAs($admin)->post($this->url($p,$d),$this->decision())->assertSessionHasNoErrors();
        $this->assertSame('approved',$d->fresh()->status);
        $this->assertNotNull($d->fresh()->verified_at);
        $this->assertEquals($admin->id,$d->fresh()->review->reviewer_id);
        $this->assertSame('under_review',$p->fresh()->status);
        $this->assertSame('unverified',$p->fresh()->verification_level);
        $this->actingAs($seller)->get('/dashboard/seller/properties/'.$p->id)->assertOk()->assertSee('Sample evidence checked.');
    }

    public function test_verifier_rejection_preserves_file_and_cannot_be_overwritten(): void
    {
        [, $p,$d]=$this->fixture();
        $this->actingAs($this->member('verification'));
        $this->post($this->url($p,$d,'verification'),$this->decision('rejected'))->assertSessionHasNoErrors();
        $this->assertSame('rejected',$d->fresh()->status);
        $this->assertNull($d->fresh()->verified_at);
        Storage::disk('property_documents')->assertExists($d->path);
        $this->post($this->url($p,$d,'verification'),$this->decision())->assertSessionHasErrors('decision');
        $this->assertSame(1,$d->review()->count());
        $this->assertSame('rejected',$d->fresh()->review->decision);
    }

    public function test_reviews_require_notes_confirmation_and_available_file_for_approval(): void
    {
        [, $p,$d]=$this->fixture();
        $this->actingAs($this->member('admin'));
        $this->post($this->url($p,$d),['decision'=>'approved'])->assertSessionHasErrors(['remarks','evidence_checked']);
        $this->post($this->url($p,$d),array_replace($this->decision(),['decision'=>'published']))->assertSessionHasErrors('decision');
        Storage::disk('property_documents')->delete($d->path);
        $this->post($this->url($p,$d),$this->decision())->assertNotFound();
        $this->assertSame('pending',$d->fresh()->status);
        $this->assertSame(0,$d->review()->count());
    }

    public function test_unrelated_roles_and_mismatched_documents_are_blocked(): void
    {
        [, $p,$d]=$this->fixture();
        foreach(['seller','agent','buyer','sales'] as $role) {
            $this->actingAs($this->member($role))->post($this->url($p,$d),$this->decision())->assertForbidden();
        }
        [, $other]=$this->fixture();
        $this->actingAs($this->member('admin'))->post($this->url($other,$d),$this->decision())->assertNotFound();
        $this->assertSame('pending',$d->fresh()->status);
    }

    public function test_only_under_review_properties_allow_document_decisions(): void
    {
        [, $p,$d]=$this->fixture();
        $this->actingAs($this->member('admin'));
        foreach(['draft','submitted','approved','published'] as $status) {
            $p->status=$status; $p->save();
            $this->post($this->url($p,$d),$this->decision())->assertForbidden();
        }
        $this->assertSame('pending',$d->fresh()->status);
        $this->assertSame(0,$d->review()->count());
    }
}
