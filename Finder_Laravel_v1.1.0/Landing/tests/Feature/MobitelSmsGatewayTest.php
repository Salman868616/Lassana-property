<?php

namespace Tests\Feature;

use App\Exceptions\SmsDeliveryException;
use App\Services\{MobitelSmsGateway, MobitelSoapClient};
use App\Support\SriLankaMobile;
use Mockery;
use SoapClient;
use Tests\TestCase;

class MobitelSmsGatewayTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['sms.enabled' => true, 'sms.username' => 'test-user', 'sms.password' => 'test-secret',
            'sms.sender' => 'TestSender', 'sms.allowed_recipients' => []]);
    }

    public function test_documented_soap_payload_and_explicit_success_close_session(): void
    {
        $soap = Mockery::mock(SoapClient::class);
        $session = (object) ['sessionId' => 'test-session'];
        $soap->shouldReceive('createSession')->once()->with(Mockery::on(fn ($args) =>
            $args->user->username === 'test-user' && $args->user->password === 'test-secret'))
            ->andReturn((object) ['return' => $session]);
        $soap->shouldReceive('sendMessages')->once()->with(Mockery::on(fn ($args) =>
            $args->session === $session && $args->smsMessage->recipients === ['94771234567'] &&
            $args->smsMessage->message === 'Test message' && $args->smsMessage->sender === 'TestSender' &&
            $args->smsMessage->messageType === 0))->andReturn((object) ['return' => 200]);
        $soap->shouldReceive('closeSession')->once()->with(Mockery::on(fn ($args) => $args->session === $session));
        $factory = Mockery::mock(MobitelSoapClient::class);
        $factory->shouldReceive('make')->once()->andReturn($soap);
        (new MobitelSmsGateway($factory))->send('94771234567', 'Test message');
        $this->assertTrue(true);
    }

    public function test_http_success_with_a_provider_error_is_not_accepted(): void
    {
        foreach ([159, 169, 151, null, ''] as $result) {
            $soap = Mockery::mock(SoapClient::class);
            $soap->shouldReceive('createSession')->once()->andReturn((object) ['return' => (object) ['sessionId' => 'test-session']]);
            $soap->shouldReceive('sendMessages')->once()->andReturn((object) ['return' => $result]);
            $soap->shouldReceive('closeSession')->once();
            $factory = Mockery::mock(MobitelSoapClient::class);
            $factory->shouldReceive('make')->once()->andReturn($soap);
            try {
                (new MobitelSmsGateway($factory))->send('94771234567', 'Test message');
                $this->fail('A rejected message must throw.');
            } catch (SmsDeliveryException $exception) {
                $this->assertSame('SMS gateway did not accept the message.', $exception->getMessage());
            }
        }
    }

    public function test_timeout_is_sanitized_and_not_retried(): void
    {
        $soap = Mockery::mock(SoapClient::class);
        $soap->shouldReceive('createSession')->once()->andReturn((object) ['return' => (object) ['sessionId' => 'test-session']]);
        $soap->shouldReceive('sendMessages')->once()->andThrow(new \SoapFault('HTTP', 'test-secret 123456'));
        $soap->shouldReceive('closeSession')->once();
        $factory = Mockery::mock(MobitelSoapClient::class);
        $factory->shouldReceive('make')->once()->andReturn($soap);
        try {
            (new MobitelSmsGateway($factory))->send('94771234567', 'Test message');
            $this->fail('A failed send must throw.');
        } catch (SmsDeliveryException $exception) {
            $this->assertSame('SMS gateway is temporarily unavailable.', $exception->getMessage());
            $this->assertNull($exception->getPrevious());
        }
    }

    public function test_allowlist_and_configuration_prevent_network_calls(): void
    {
        $factory = Mockery::mock(MobitelSoapClient::class);
        $factory->shouldNotReceive('make');
        foreach ([['sms.enabled' => false], ['sms.enabled' => true, 'sms.password' => ''],
            ['sms.password' => 'test-secret', 'sms.allowed_recipients' => ['94761112222']]] as $settings) {
            config($settings);
            try {
                (new MobitelSmsGateway($factory))->send('94771234567', 'Test message');
                $this->fail('Disabled or restricted delivery must be rejected.');
            } catch (SmsDeliveryException $exception) {
                $this->assertNotEmpty($exception->getMessage());
            }
        }
    }

    public function test_mobile_numbers_are_normalized_without_accepting_landlines_or_foreign_numbers(): void
    {
        foreach (['0771234567', '94771234567', '+94 77 123 4567', '(077) 123-4567'] as $phone) {
            $this->assertSame('94771234567', SriLankaMobile::normalize($phone));
        }
        foreach (['2445661', '0111234567', '+447712345678', '947712345678', 'abc0771234567', ''] as $phone) {
            $this->assertNull(SriLankaMobile::normalize($phone));
        }
    }
}
