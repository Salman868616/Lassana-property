<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class RetiredTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_and_help_links_lead_to_working_pages(): void
    {
        foreach (['blog-layout-v1','blog-single-v1'] as $path) {
            $this->get('/'.$path)->assertRedirect('/properties');
        }
        foreach (['help-topics-v1','help-single-article-v1'] as $path) {
            $this->get('/'.$path)->assertRedirect('/contact-us');
        }
        $this->get('/properties')->assertOk();
        $this->get('/contact-us')->assertOk();
        $this->get('/terms-and-conditions')->assertOk();
    }

    public function test_every_template_documentation_and_error_preview_route_is_retired(): void
    {
        $paths=collect(Route::getRoutes())->map(fn ($route)=>$route->uri())
            ->filter(fn ($uri)=>str_starts_with($uri,'docs/') || str_starts_with($uri,'404-'));
        $this->assertGreaterThan(60,$paths->count());
        foreach ($paths as $path) {
            $this->get('/'.$path)->assertStatus(410)
                ->assertHeader('X-Robots-Tag','noindex, nofollow')
                ->assertSee('Page no longer available')->assertSee('Lassana Property')
                ->assertDontSee('findertheme.com');
        }
    }
}
