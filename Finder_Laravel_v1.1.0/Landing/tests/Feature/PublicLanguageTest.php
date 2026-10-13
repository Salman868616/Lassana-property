<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicLanguageTest extends TestCase
{
    use RefreshDatabase;

    public function test_tamil_persists_across_public_pages_and_preserves_search_filters(): void
    {
        $this->post('/language', ['locale'=>'ta', 'return_path'=>'/properties?category=land&min_price=100000'])
            ->assertRedirect(url('/properties?category=land&min_price=100000'))
            ->assertSessionHas('public_locale', 'ta');
        foreach (['/'=>'முகப்பு', '/services'=>'சொத்து தொடர்பான சேவைகள்', '/faqs'=>'அடிக்கடி கேட்கப்படும் கேள்விகள்', '/properties?category=land'=>'காணி'] as $url=>$translation) {
            $response=$this->get($url)->assertOk()->assertSee('lang="ta"', false)->assertSee($translation);
            $this->assertMatchesRegularExpression('/<option value="ta" lang="ta"\s+selected/', $response->getContent());
        }
        $this->get('/account-signin')->assertOk()->assertSee('Welcome back');
        $this->post('/language', ['locale'=>'si', 'return_path'=>'/'])->assertRedirect(url('/').'/');
        $this->get('/')->assertOk()->assertSee('lang="si"', false)->assertSee('මුල් පිටුව');
        $this->post('/language', ['locale'=>'en', 'return_path'=>'/'])->assertRedirect(url('/').'/');
        $this->get('/')->assertOk()->assertSee('lang="en"', false)->assertSee('Find your land or home in Sri Lanka');
    }

    public function test_selector_has_three_languages_and_only_a_noscript_submit_fallback(): void
    {
        $html=$this->get('/')->assertOk()->getContent();
        preg_match('~<form[^>]*action="[^"]*/language"[^>]*>(.*?)</form>~s', $html, $match);
        $this->assertNotEmpty($match);
        $form=$match[1];
        foreach (['en','si','ta'] as $locale) $this->assertStringContainsString('value="'.$locale.'" lang="'.$locale.'"', $form);
        $this->assertStringContainsString('data-auto-language', $form);
        $this->assertStringContainsString('name="_token"', $form);
        $this->assertStringContainsString('name="return_path"', $form);
        $this->assertStringContainsString('Selecting a language reloads this page.', $form);
        $this->assertStringNotContainsString('<button', preg_replace('~<noscript>.*?</noscript>~s', '', $form));
        $this->assertStringContainsString('public-language.js', $html);
    }

    public function test_public_language_information_includes_tamil(): void
    {
        foreach (['en','si','ta'] as $locale) {
            $this->withSession(['public_locale'=>$locale])->get('/faqs')->assertOk()
                ->assertDontSee('Tamil is planned for a later release.')
                ->assertDontSee('Tamil support is planned.');
        }
        $this->withSession(['public_locale'=>'en'])->get('/')->assertSee('Available in English, Sinhala and Tamil.');
    }

    public function test_tamil_cannot_redirect_to_an_external_site_or_select_an_unknown_locale(): void
    {
        $this->post('/language', ['locale'=>'fr'])->assertSessionHasErrors('locale');
        foreach (['https://example.com','//example.com','/%2fexample.com','/\\example.com',"/\r\nLocation: https://example.com"] as $path) {
            $this->post('/language', ['locale'=>'ta','return_path'=>$path])->assertRedirect(url('/').'/');
        }
        $this->withSession(['public_locale'=>'unknown'])->get('/')->assertOk()->assertSee('lang="en"',false);
    }

    public function test_tamil_catalog_matches_existing_public_translations_and_keeps_placeholders(): void
    {
        $si=json_decode(file_get_contents(lang_path('si.json')),true,512,JSON_THROW_ON_ERROR);
        $ta=json_decode(file_get_contents(lang_path('ta.json')),true,512,JSON_THROW_ON_ERROR);
        $this->assertEqualsCanonicalizing(array_keys($si),array_keys($ta));
        foreach ($si as $key=>$value) {
            $this->assertNotSame('',trim($ta[$key]),$key);
            preg_match_all('/:[A-Za-z_]+/',$key,$expected);
            preg_match_all('/:[A-Za-z_]+/',$ta[$key],$actual);
            $this->assertEqualsCanonicalizing($expected[0],$actual[0],$key);
        }
        app()->setLocale('ta');
        $this->assertSame('485 சொத்துகளில் 6 காண்பிக்கப்படுகின்றன',__('Showing :shown of :total properties',['shown'=>6,'total'=>485]));
        $this->assertSame('அடுத்தது »',__('pagination.next'));
    }
}
