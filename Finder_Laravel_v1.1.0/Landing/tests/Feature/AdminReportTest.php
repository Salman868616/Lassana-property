<?php
namespace Tests\Feature;

use App\Models\{User, Property, CrmLead};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AdminReportTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
    }

    private function member(string $role, string $name = 'Report member'): User
    {
        $u=User::factory()->create(['name'=>$name]);
        $u->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $u;
    }

    private function property(User $owner, string $title, string $created): Property
    {
        $p=new Property;
        $p->forceFill(['owner_id'=>$owner->id,'created_by'=>$owner->id,'title'=>$title,
            'category'=>'land','property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'district'=>'Gampaha','city'=>'Nittambuwa','status'=>'published','currency'=>'LKR','total_price'=>1000000,
            'created_at'=>$created])->save();
        return $p;
    }

    public function test_only_admins_can_view_and_download_reports(): void
    {
        foreach (['/admin/reports','/admin/reports/download'] as $url) $this->get($url)->assertRedirect();
        foreach (['buyer','seller','agent','sales','verification'] as $role) {
            $this->actingAs($this->member($role));
            $this->get('/admin/reports')->assertForbidden();
            $this->get('/admin/reports/download')->assertForbidden();
        }
        $this->actingAs($this->member('admin'));
        $this->get('/admin/reports')->assertOk();
        $this->get('/dashboard/admin?section=reports')->assertRedirect(route('admin.reports.index'));
    }

    public function test_property_dates_use_inclusive_colombo_days_and_export_matches_filters(): void
    {
        $admin=$this->member('admin');
        $a=$this->property($admin,'First local minute','2026-10-01 18:30:00');
        $b=$this->property($admin,'Last local minute','2026-10-02 18:29:59');
        $this->property($admin,'Previous day','2026-10-01 18:29:59');
        $this->property($admin,'Next day','2026-10-02 18:30:00');
        $this->property($admin,'Deleted example','2026-10-02 01:00:00')->delete();
        $other=$this->property($admin,'Wrong district','2026-10-02 01:00:00');
        $other->district='Colombo'; $other->save();
        $draft=$this->property($admin,'Wrong status','2026-10-02 01:00:00');
        $draft->status='draft'; $draft->save();
        $params=['type'=>'properties','from'=>'2026-10-02','to'=>'2026-10-02','category'=>'land','district'=>'Gampaha','property_status'=>'published'];
        $this->actingAs($admin);
        $response=$this->get('/admin/reports?'.http_build_query($params))->assertOk();
        $this->assertSame([$b->id,$a->id],$response->viewData('records')->modelKeys());
        $csv=$this->get('/admin/reports/download?'.http_build_query($params))->assertOk()->streamedContent();
        $this->assertStringContainsString('First local minute',$csv);
        $this->assertStringContainsString('Last local minute',$csv);
        foreach (['Previous day','Next day','Deleted example','Wrong district','Wrong status'] as $excluded) $this->assertStringNotContainsString($excluded,$csv);
    }

    public function test_users_and_leads_filters_and_invalid_dates(): void
    {
        $admin=$this->member('admin');
        $agent=$this->member('agent','Agent report example');
        $agent->forceFill(['is_active'=>false])->save();
        $this->member('seller');
        $lead=CrmLead::create(['assigned_to'=>$agent->id,'status'=>'interested','source'=>'website']);
        CrmLead::create(['assigned_to'=>null,'status'=>'new','source'=>'website']);
        $this->actingAs($admin);
        $response=$this->get('/admin/reports?type=users&role=agent&account_status=suspended')->assertOk();
        $this->assertSame([$agent->id],$response->viewData('records')->modelKeys());
        $response=$this->get('/admin/reports?type=leads&stage=interested&assignee='.$agent->id)->assertOk();
        $this->assertSame([$lead->id],$response->viewData('records')->modelKeys());
        $response=$this->get('/admin/reports?type=leads&assignee=unassigned')->assertOk();
        $this->assertSame(1,$response->viewData('records')->total());
        foreach (['/admin/reports','/admin/reports/download'] as $url) {
            $this->get($url.'?from=2026-10-03&to=2026-10-01')->assertSessionHasErrors('to');
            $this->get($url.'?type=invalid')->assertSessionHasErrors('type');
            $this->get($url.'?stage=invalid')->assertSessionHasErrors('stage');
        }
    }

    public function test_csv_includes_all_pages_and_neutralizes_formulas(): void
    {
        $admin=$this->member('admin');
        for($i=0;$i<27;$i++) $this->property($admin,'Listing '.$i,'2026-10-02 00:00:00');
        $this->property($admin,'=HYPERLINK("example")','2026-10-02 00:00:00');
        $this->actingAs($admin);
        $page=$this->get('/admin/reports')->assertOk();
        $this->assertCount(25,$page->viewData('records'));
        $this->assertSame(28,$page->viewData('records')->total());
        $csv=$this->get('/admin/reports/download')->assertOk()->streamedContent();
        $stream=fopen('php://temp','w+'); fwrite($stream,$csv); rewind($stream);
        $rows=[]; while(($row=fgetcsv($stream,0,',','"',''))!==false) $rows[]=$row;
        fclose($stream);
        $this->assertCount(29,$rows);
        $this->assertSame('\'=HYPERLINK("example")',$rows[28][1]);
    }
}
