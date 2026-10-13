<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\{DB, Storage};
use Tests\TestCase;

class ProfilePhotoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }

    private function photo(string $name): \Illuminate\Http\Testing\File
    {
        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jRZkAAAAASUVORK5CYII=', true);
        return UploadedFile::fake()->createWithContent($name, $png);
    }
    public function test_owner_can_upload_replace_remove_and_public_agent_shows_photo(): void
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name','agent')->value('id'));
        $other = User::factory()->create();
        $data = ['name'=>$user->name,'email'=>$user->email,'user_id'=>$other->id];
        $this->actingAs($user)->put('/account-profile', $data + ['profile_photo'=>$this->photo('portrait.png')])->assertSessionHasNoErrors();
        $first = $user->fresh()->profile_photo_path;
        Storage::disk('public')->assertExists($first);
        $this->assertNull($other->fresh()->profile_photo_path);
        $this->get('/agents/'.$user->id)->assertOk()->assertSee($user->fresh()->profilePhotoUrl(),false);
        $this->get('/account-profile')->assertOk()->assertSee('multipart/form-data',false);
        $this->put('/account-profile',$data + ['profile_photo'=>$this->photo('replacement.png')])->assertSessionHasNoErrors();
        $second = $user->fresh()->profile_photo_path;
        $this->assertNotSame($first,$second);
        Storage::disk('public')->assertMissing($first);
        Storage::disk('public')->assertExists($second);
        $this->put('/account-profile',$data + ['remove_profile_photo'=>'1'])->assertSessionHasNoErrors();
        $this->assertNull($user->fresh()->profile_photo_path);
        Storage::disk('public')->assertMissing($second);
    }

    public function test_invalid_upload_and_failed_email_change_preserve_current_picture(): void
    {
        $user = User::factory()->create();
        $path = 'profile-photos/'.$user->id.'/original.jpg';
        Storage::disk('public')->put($path,'existing');
        $user->forceFill(['profile_photo_path'=>$path])->save();
        $data = ['name'=>$user->name,'email'=>$user->email];
        foreach ([UploadedFile::fake()->create('bad.svg',1,'image/svg+xml'),$this->photo('large.png')->size(2049)] as $file) {
            $this->actingAs($user)->put('/account-profile',$data + ['profile_photo'=>$file])->assertSessionHasErrors('profile_photo');
        }
        $this->put('/account-profile',array_replace($data,['email'=>'new@example.test','profile_photo'=>$this->photo('new.png')]))->assertSessionHasErrors('current_password');
        $this->assertSame($path,$user->fresh()->profile_photo_path);
        Storage::disk('public')->assertExists($path);
        $this->assertCount(1,Storage::disk('public')->allFiles());
    }

    public function test_missing_and_unsafe_paths_have_fallback_and_cannot_be_deleted(): void
    {
        $user = User::factory()->create();
        Storage::disk('public')->put('unrelated.jpg','keep');
        $user->forceFill(['profile_photo_path'=>'unrelated.jpg'])->save();
        $this->assertNull($user->profilePhotoUrl());
        $this->actingAs($user)->put('/account-profile',['name'=>$user->name,'email'=>$user->email,'remove_profile_photo'=>1])->assertSessionHasNoErrors();
        Storage::disk('public')->assertExists('unrelated.jpg');
        $user->forceFill(['profile_photo_path'=>'profile-photos/'.$user->id.'/missing.jpg']);
        $this->assertNull($user->profilePhotoUrl());
    }
}
