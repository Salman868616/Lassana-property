<?php
namespace Tests\Feature;
use App\Models\{Property, RevenuePayment, User};
use App\Services\ManagementOverview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
class RevenueTrackingTest extends TestCase {
    use RefreshDatabase;
    protected function setUp(): void {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
        $this->travelTo(\Carbon\Carbon::parse('2026-10-06 10:00:00','Asia/Colombo'));
    }
    private function sheetXml(string $bytes): string {
        $file=tempnam(sys_get_temp_dir(),'lp-test-');
        file_put_contents($file,$bytes);
        $zip=new \ZipArchive;
        try {
            $this->assertTrue($zip->open($file) === true);
            $xml=$zip->getFromName('xl/worksheets/sheet1.xml');
            $this->assertNotFalse($xml);
            $this->assertStringNotContainsString('<f>', $xml);
            $this->assertNotFalse(simplexml_load_string($xml));
            $this->assertStringContainsString('state="frozen"',$xml);
            return $xml;
        } finally { $zip->close(); unlink($file); }
    }
    private function member(string $role): User {
        $u=User::factory()->create();
        $u->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $u;
    }
    private function data(): array {
        $owner=$this->member('seller');
        $p=new Property;
        $p->forceFill(['owner_id'=>$owner->id,'created_by'=>$owner->id,'title'=>'Revenue fixture','category'=>'land','status'=>'published','verification_level'=>'basic','property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id')])->save();
        return ['property_code'=>$p->property_code,'type'=>'listing','amount'=>'1500.25','paid_on'=>'2026-10-06','reference'=>'RCPT-001','method'=>'cash','notes'=>'Received'];
    }
    public function test_payment_records_trusted_actor_and_totals_without_changing_property(): void {
        $admin=$this->member('admin'); $data=$this->data();
        $this->actingAs($admin)->post('/admin/revenue',$data+['recorded_by'=>999,'currency'=>'USD','voided_at'=>'2026-10-06'])->assertRedirect('/admin/revenue');
        $p=RevenuePayment::firstOrFail();
        $this->assertSame($admin->id,$p->recorded_by); $this->assertSame('LKR',$p->currency); $this->assertNull($p->voided_at);
        $this->assertSame('1500.25',$p->amount);
        $this->assertDatabaseHas('properties',['id'=>$p->property_id,'status'=>'published','verification_level'=>'basic']);
        $this->assertEquals(1500.25,app(ManagementOverview::class)->build($admin)['revenue']['listing']);
        $this->get('/admin/revenue')->assertOk()->assertSee('1,500.25')->assertSee('RCPT-001');
    }
    public function test_invalid_and_duplicate_receipts_cannot_change_totals(): void {
        $this->actingAs($this->member('admin')); $data=$this->data();
        foreach (['amount'=>'-1','property_code'=>'MISSING','type'=>'subscription','paid_on'=>'2026-10-07','method'=>'invalid'] as $field=>$value) {
            $this->post('/admin/revenue',array_replace($data,[$field=>$value]))->assertSessionHasErrors($field);
        }
        $this->post('/admin/revenue',array_replace($data,['amount'=>'1.001']))->assertSessionHasErrors('amount');
        $this->assertDatabaseCount('revenue_payments',0);
        $this->post('/admin/revenue',$data)->assertRedirect();
        $this->post('/admin/revenue',array_replace($data,['reference'=>' rcpt-001 ']))->assertSessionHasErrors('reference');
        $this->assertDatabaseCount('revenue_payments',1);
    }
    public function test_void_keeps_history_and_is_excluded_from_totals(): void {
        $admin=$this->member('admin'); $this->actingAs($admin); $data=$this->data();
        $this->post('/admin/revenue',$data); $payment=RevenuePayment::firstOrFail();
        $this->post('/admin/revenue/'.$payment->id.'/void',[])->assertSessionHasErrors('void_reason');
        $this->post('/admin/revenue/'.$payment->id.'/void',['void_reason'=>'Incorrect amount'])->assertRedirect();
        $payment->refresh(); $time=$payment->voided_at->toDateTimeString();
        $this->assertSame($admin->id,$payment->voided_by);
        $this->assertEquals(0,app(ManagementOverview::class)->build($admin)['revenue']['total']);
        $this->post('/admin/revenue/'.$payment->id.'/void',['void_reason'=>'Another reason'])->assertSessionHasErrors('void_reason');
        $this->assertSame('Incorrect amount',$payment->fresh()->void_reason);
        $this->assertSame($time,$payment->fresh()->voided_at->toDateTimeString());
        $this->assertDatabaseCount('revenue_payments',1);
    }
    public function test_filter_and_excel_match_and_keep_formulas_as_text(): void {
        $admin=$this->member('admin'); $this->actingAs($admin); $data=$this->data();
        $this->post('/admin/revenue',$data);
        $this->post('/admin/revenue',array_replace($data,['reference'=>'RCPT-002','type'=>'verification','amount'=>'500.00','paid_on'=>'2026-10-05','notes'=>'=1+1']));
        $url='/admin/revenue?type=verification&from=2026-10-05&to=2026-10-05';
        $this->get($url)->assertOk()->assertSee('RCPT-002')->assertDontSee('RCPT-001')->assertViewHas('totals',fn($t)=>(float)$t['total']===500.0);
        $response=$this->get('/admin/revenue/download?type=verification&from=2026-10-05&to=2026-10-05')->assertOk();
        $response->assertHeader('Content-Type','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $csv=$this->sheetXml($response->streamedContent());
        $this->assertStringContainsString('RCPT-002',$csv); $this->assertStringNotContainsString('RCPT-001',$csv);
        $this->assertStringContainsString("=1+1",$csv);
        $this->get('/admin/revenue?from=2026-10-06&to=2026-10-05')->assertSessionHasErrors('to');
    }
    public function test_export_includes_all_pages_and_deleted_property_keeps_payment_history(): void {
        $admin=$this->member('admin'); $this->actingAs($admin); $data=$this->data();
        $this->post('/admin/revenue',$data);
        $original=RevenuePayment::firstOrFail();
        for ($i=2;$i<=22;$i++) {
            $copy=$original->replicate(); $copy->reference='RCPT-'.str_pad($i,3,'0',STR_PAD_LEFT); $copy->save();
        }
        Property::findOrFail($original->property_id)->delete();
        $this->get('/admin/revenue')->assertOk()->assertViewHas('payments',fn($p)=>$p->count()===20 && $p->total()===22);
        $csv=$this->sheetXml($this->get('/admin/revenue/download')->assertOk()->streamedContent());
        $this->assertStringContainsString('RCPT-001',$csv);
        $this->assertStringContainsString('RCPT-022',$csv);
        $this->assertStringContainsString($data['property_code'],$csv);
        $this->assertEquals(33005.50,app(ManagementOverview::class)->build($admin)['revenue']['total']);
    }
    public function test_only_admin_can_read_record_export_or_void(): void {
        $this->get('/admin/revenue')->assertRedirect('/account-signin');
        $data=$this->data();
        foreach (['buyer','seller','agent','sales','verification'] as $role) {
            $this->actingAs($this->member($role));
            $this->get('/admin/revenue')->assertForbidden();
            $this->get('/admin/revenue/download')->assertForbidden();
            $this->post('/admin/revenue',$data)->assertForbidden();
        }
        $admin=$this->member('admin'); $this->actingAs($admin)->post('/admin/revenue',$data);
        $payment=RevenuePayment::firstOrFail();
        $this->actingAs($this->member('agent'))->post('/admin/revenue/'.$payment->id.'/void',['void_reason'=>'Not permitted'])->assertForbidden();
        $this->assertNull($payment->fresh()->voided_at);
    }
}
