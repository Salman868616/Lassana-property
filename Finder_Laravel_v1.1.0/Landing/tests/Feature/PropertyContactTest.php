<?php
namespace Tests\Feature;

use App\Models\{Property, User};
use App\Services\PropertyContact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyContactTest extends TestCase
{
    use RefreshDatabase;

    private function listing(): Property
    {
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
        $category = \App\Models\PropertyCategory::where('slug', 'house')->firstOrFail();
        $seller = User::factory()->create(['name'=>'Seller contact fixture']);
        $seller->forceFill(['phone'=>'+94771112222'])->save();
        $property = new Property;
        $property->forceFill(['owner_id'=>$seller->id, 'created_by'=>$seller->id,
            'title'=>'Garden house & land', 'category'=>'house', 'property_category_id'=>$category->id, 'status'=>'published',
            'district'=>'Gampaha', 'city'=>'Nittambuwa', 'currency'=>'LKR', 'total_price'=>2000000])->save();
        config(['company.phone_uri'=>'+94706920601', 'company.email'=>'sales@example.test', 'company.whatsapp'=>'+94706920601']);
        return $property;
    }

    public function test_direct_contacts_always_use_sales_team_with_or_without_an_agent(): void
    {
        $property = $this->listing();
        $agent = User::factory()->create();
        $agent->forceFill(['phone'=>'+94773334444'])->save();
        foreach ([null, $agent->id] as $agentId) {
            $property->forceFill(['agent_id'=>$agentId])->save();
            $response = $this->get(route('properties.show', $property->property_code))->assertOk();
            $response->assertSee('Contact our sales team')->assertSee('LASSANA PROPERTY')
                ->assertSee('href="tel:+94706920601"', false)
                ->assertSee('href="mailto:sales@example.test"', false)
                ->assertDontSee($property->owner->email)->assertDontSee('+94771112222')
                ->assertDontSee($agent->email)->assertDontSee('+94773334444')
                ->assertDontSee('href="#property-enquiry-form"', false)
                ->assertSee('id="property-enquiry-form"', false)
                ->assertSee('action="'.route('properties.enquiries.store', $property).'"', false);
            $contact = $response->viewData('contact');
            $this->assertSame('/94706920601', parse_url($contact['whatsapp'], PHP_URL_PATH));
            parse_str(parse_url($contact['whatsapp'], PHP_URL_QUERY), $query);
            $this->assertStringContainsString($property->property_code, $query['text']);
            $this->assertStringContainsString(route('properties.show', $property->property_code), $query['text']);
        }
    }

    public function test_missing_whatsapp_does_not_create_a_direct_chat_link(): void
    {
        $property = $this->listing();
        config(['company.whatsapp'=>null]);
        $response = $this->get(route('properties.show', $property->property_code))->assertOk();
        $this->assertNull($response->viewData('contact')['whatsapp']);
        $response->assertDontSee('https://wa.me/94706920601', false)->assertSee('Send enquiry');
    }

    public function test_contact_details_do_not_make_unpublished_properties_accessible(): void
    {
        $property = $this->listing();
        foreach (['draft','submitted','under_review','approved','sold','archived'] as $status) {
            $property->forceFill(['status'=>$status])->save();
            $this->get(route('properties.show', $property->property_code))->assertNotFound();
        }
    }

    public function test_phone_links_are_normalized_and_invalid_configuration_is_hidden(): void
    {
        $this->assertSame('+94771234567', PropertyContact::phone('077 123 4567'));
        $this->assertSame('+94771234567', PropertyContact::phone('0094 77 123 4567'));
        $this->assertNull(PropertyContact::phone('javascript:alert(1)'));
        $property = $this->listing();
        config(['company.phone_uri'=>'not a phone','company.email'=>'invalid','company.whatsapp'=>'bad']);
        $contact = app(PropertyContact::class)->forProperty($property);
        $this->assertNull($contact['phone']);
        $this->assertNull($contact['email']);
        $this->assertNull($contact['whatsapp']);
    }
}
