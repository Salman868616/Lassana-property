<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PropertyVideoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
        Storage::fake('local');
        Storage::fake('public');
    }

    private function member(string $role): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }

    private function listing(User $owner): Property
    {
        $p=new Property();
        $p->forceFill(['owner_id'=>$owner->id,'created_by'=>$owner->id,'title'=>'Video fixture',
            'category'=>'house','property_category_id'=>DB::table('property_categories')->where('slug','house')->value('id'),
            'status'=>'draft'])->save();
        return $p;
    }

    private function video(): UploadedFile
    {
        return UploadedFile::fake()->create('tour.mp4', 10, 'video/mp4');
    }

    public function test_admin_and_owner_save_both_options_replace_and_remove_upload(): void
    {
        $owner=$this->member('seller');
        foreach (['seller','admin'] as $role) {
            $p=$this->listing($owner);
            $this->actingAs($role === 'seller' ? $owner : $this->member('admin'));
            $url='/dashboard/'.$role.'/properties/'.$p->id.'/videos';
            $this->post($url,['video_url'=>'https://www.youtube.com/watch?v=abcdefghijk','video'=>$this->video()])->assertSessionHasNoErrors();
            $p->refresh();
            $old=$p->video_path;
            $this->assertSame('https://www.youtube.com/watch?v=abcdefghijk',$p->video_url);
            Storage::disk('local')->assertExists($old);
            Storage::disk('public')->assertMissing($old);
            $this->get('/dashboard/'.$role.'/properties/'.$p->id)->assertOk()->assertSee('Edit property media')->assertSee('property-videos/'.$p->id);
            $this->get('/property-videos/'.$p->id)->assertOk()->assertHeader('Content-Type','video/mp4')->assertHeader('X-Content-Type-Options','nosniff');
            $this->post($url,['video_url'=>'https://vimeo.com/123456','video'=>$this->video()])->assertSessionHasNoErrors();
            Storage::disk('local')->assertMissing($old);
            $new=$p->fresh()->video_path;
            Storage::disk('local')->assertExists($new);
            $this->post($url,['video_url'=>'','remove_video'=>1])->assertSessionHasNoErrors();
            $this->assertNull($p->fresh()->video_path);
            $this->assertNull($p->fresh()->video_url);
            Storage::disk('local')->assertMissing($new);
        }
    }

    public function test_public_playback_requires_published_status_and_internal_access_is_scoped(): void
    {
        $owner=$this->member('seller');
        $p=$this->listing($owner);
        $url='/property-videos/'.$p->id;
        $this->actingAs($owner)->post('/dashboard/seller/properties/'.$p->id.'/videos',['video'=>$this->video()])->assertSessionHasNoErrors();
        $this->actingAs($this->member('seller'))->get($url)->assertNotFound();
        $buyer=$this->member('buyer');
        $this->actingAs($buyer)->get($url)->assertNotFound();
        $p->update(['status'=>'published']);
        $this->app['auth']->forgetGuards();
        $this->get($url)->assertOk();
        $this->get('/properties/'.$p->property_code)->assertOk()->assertSee('property-videos/'.$p->id)->assertDontSee('Save videos');
        foreach (['sold','archived'] as $status) {
            $p->update(['status'=>$status]);
            $this->get($url)->assertNotFound();
        }
        $this->actingAs($owner)->get($url)->assertOk();
        $this->actingAs($this->member('admin'))->get($url)->assertOk();
    }

    public function test_edit_permissions_and_submission_lock_cannot_be_bypassed(): void
    {
        $owner=$this->member('seller');
        $p=$this->listing($owner);
        $url='/dashboard/seller/properties/'.$p->id.'/videos';
        $this->post($url)->assertRedirect('/account-signin');
        $this->actingAs($this->member('seller'))->post($url)->assertNotFound();
        foreach (['buyer','agent','sales','verification'] as $role) {
            $this->actingAs($this->member($role))->post('/dashboard/admin/properties/'.$p->id.'/videos')->assertForbidden();
        }
        foreach (['seller','admin'] as $role) {
            $this->actingAs($role === 'seller' ? $owner : $this->member('admin'));
            foreach (['submitted','under_review','approved','published','sold','archived'] as $status) {
                $p->update(['status'=>$status]);
                $this->post('/dashboard/'.$role.'/properties/'.$p->id.'/videos',['video'=>$this->video()])->assertForbidden();
            }
        }
        $this->assertNull($p->fresh()->video_path);
        $this->assertCount(0,Storage::disk('local')->allFiles());
    }

    public function test_invalid_urls_files_sizes_and_unsafe_paths_are_rejected(): void
    {
        $owner=$this->member('seller');
        $p=$this->listing($owner);
        $this->actingAs($owner);
        $url='/dashboard/seller/properties/'.$p->id.'/videos';
        foreach (['javascript:alert(1)','http://youtube.com/watch?v=x','https://youtube.com.evil.test/x','https://evil.test','https://user@youtube.com/watch?v=x'] as $link) {
            $this->post($url,['video_url'=>$link])->assertSessionHasErrors('video_url');
        }
        $this->post($url,['video'=>UploadedFile::fake()->create('script.mp4',1,'text/plain')])->assertSessionHasErrors('video');
        $this->post($url,['video'=>UploadedFile::fake()->create('large.mp4',51201,'video/mp4')])->assertSessionHasErrors('video');
        $this->assertCount(0,Storage::disk('local')->allFiles());
        $p->video_path='../secret.mp4'; $p->save();
        $this->get('/property-videos/'.$p->id)->assertNotFound();
    }

    public function test_add_and_edit_forms_save_both_video_options_and_reject_invalid_changes(): void
    {
        $owner = $this->member('seller');
        foreach (['seller', 'admin'] as $role) {
            $this->actingAs($role === 'seller' ? $owner : $this->member('admin'));
            $base = '/'.$role.'/properties';
            $data = ['title'=>'Media form test', 'owner_id'=>$owner->id, 'category'=>'land'];
            $this->get($base.'/create')->assertOk()->assertSee('name="video"', false)->assertSee('name="video_url"', false);
            $this->post($base, $data + ['video'=>$this->video(), 'video_url'=>'https://youtu.be/abcdefghijk'])->assertSessionHasNoErrors()->assertRedirect();
            $p = Property::latest('id')->firstOrFail();
            $old = $p->video_path;
            Storage::disk('local')->assertExists($old);
            $this->assertSame('https://youtu.be/abcdefghijk', $p->video_url);
            $edit = $this->get($base.'/'.$p->id.'/edit')->assertOk()->assertSee('Remove uploaded video');
            $this->assertSame(1, substr_count($edit->getContent(), 'name="video"'));
            foreach ([1, 2] as $order) {
                $p->images()->create(['path'=>'fixture-'.$order.'.jpg', 'sort_order'=>$order]);
            }
            $withPhotos = $this->get($base.'/'.$p->id.'/edit')->assertOk();
            $this->assertSame(1, substr_count($withPhotos->getContent(), 'name="video"'));
            $this->put($base.'/'.$p->id, array_replace($data, ['title'=>'Must not save', 'video_url'=>'https://example.com/video']))->assertSessionHasErrors('video_url');
            $this->assertSame('Media form test', $p->fresh()->title);
            $this->assertSame($old, $p->fresh()->video_path);
            Storage::disk('local')->assertExists($old);
            $this->put($base.'/'.$p->id, $data + ['video'=>$this->video()])->assertSessionHasNoErrors();
            Storage::disk('local')->assertMissing($old);
            $new = $p->fresh()->video_path;
            Storage::disk('local')->assertExists($new);
            $this->assertSame('https://youtu.be/abcdefghijk', $p->fresh()->video_url);
            $this->put($base.'/'.$p->id, $data + ['remove_video'=>1, 'video_url'=>''])->assertSessionHasNoErrors();
            Storage::disk('local')->assertMissing($new);
            $this->assertNull($p->fresh()->video_path);
            $this->assertNull($p->fresh()->video_url);
        }
    }
}
