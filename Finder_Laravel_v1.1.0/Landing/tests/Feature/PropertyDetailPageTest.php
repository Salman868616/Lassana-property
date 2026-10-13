<?php
namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertyDetailPageTest extends TestCase
{
    use RefreshDatabase;

    private function listing(): Property
    {
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
        $owner = User::factory()->create(['name'=>'Listing owner']);
        $p = new Property;
        $p->forceFill([
            'owner_id'=>$owner->id, 'created_by'=>$owner->id, 'title'=>'Detail page fixture',
            'description'=>'A home near the town.', 'category'=>'house',
            'property_category_id'=>DB::table('property_categories')->where('slug','house')->value('id'),
            'status'=>'published', 'district'=>'Gampaha','city'=>'Nittambuwa','location'=>'Temple Road',
            'total_price'=>2000000,'currency'=>'LKR','land_size_perches'=>20,
        ])->save();
        $p->details()->create(['bedrooms'=>3,'bathrooms'=>2,'floor_area'=>1500]);
        return $p;
    }

    public function test_details_gallery_contact_and_map_use_the_same_property_record(): void
    {
        $p = $this->listing();
        $p->forceFill(['latitude'=>7.142,'longitude'=>80.098])->save();
        foreach ([4,2,1,3] as $order) $p->images()->create(['path'=>'properties/detail/photo-'.$order.'.jpg','sort_order'=>$order]);
        $response = $this->get(route('properties.show',$p->property_code))->assertOk()
            ->assertSee($p->title)->assertSee($p->description)->assertSee($p->property_code)
            ->assertSee('2,000,000.00')->assertSee('Listing owner')->assertSee('1500.00 sq ft')
            ->assertSee('Temple Road, Nittambuwa, Gampaha')
            ->assertSee('https://www.google.com/maps?q=7.1420000,80.0980000',false)
            ->assertSee('action="'.route('properties.enquiries.store',$p).'"',false);
        $html = $response->getContent();
        preg_match_all('/<a[^>]*href="([^"]+)"[^>]*data-glightbox/', $html, $links);
        $this->assertSame(array_map(fn($i)=>asset('storage/properties/detail/photo-'.$i.'.jpg'),[1,2,3,4]), $links[1]);
        $this->assertTrue(strpos($html,'data-property-share') > strpos($html,'data-gallery="property-gallery"'));
    }

    public function test_missing_photos_and_coordinates_have_clear_fallbacks(): void
    {
        $p = $this->listing();
        $this->get(route('properties.show',$p->property_code))->assertOk()
            ->assertSee('No photos available for this property.')
            ->assertSee('Map location is not available for this property yet.')
            ->assertDontSee('https://www.google.com/maps?q=',false);
        $p->forceFill(['latitude'=>0,'longitude'=>0])->save();
        $this->get(route('properties.show',$p->property_code))->assertOk()
            ->assertSee('https://www.google.com/maps?q=0.0000000,0.0000000',false);
    }

    public function test_enquiry_validation_displays_field_errors_and_preserves_input(): void
    {
        $p = $this->listing();
        $url = route('properties.show',$p->property_code);
        $this->from($url)->post(route('properties.enquiries.store',$p),[
            'name'=>'Interested buyer','email'=>'invalid-email','message'=>'',
        ])->assertRedirect($url)->assertSessionHasErrors(['email','message']);
        // Keep the browser session across the validation redirect. A new session ID
        // cannot reload the serialized error bag after assertSessionHasErrors reads it.
        $this->withCookie(config('session.cookie'), session()->getId())
            ->get($url)->assertOk()->assertSee('Interested buyer')
            ->assertSee('id="enquiry-email-error"',false)->assertSee('id="enquiry-message-error"',false)
            ->assertSee('aria-describedby="enquiry-email-error"',false);
        $this->assertDatabaseCount('property_enquiries',0);
    }
}
