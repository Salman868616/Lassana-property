<?php

namespace App\Services;

use App\Contracts\SmsGateway;
use App\Exceptions\SmsDeliveryException;
use App\Support\SriLankaMobile;

class MobitelSmsGateway implements SmsGateway
{
    public function __construct(private MobitelSoapClient $clients) {}

    public function send(string $recipient, #[\SensitiveParameter] string $message): void
    {
        if (!config('sms.enabled') || !extension_loaded('soap') ||
            !config('sms.username') || !config('sms.password') ||
            !preg_match('/^[a-zA-Z0-9 ]{1,11}$/', (string) config('sms.sender'))) {
            throw new SmsDeliveryException('SMS gateway is not configured.');
        }
        if (!SriLankaMobile::normalize($recipient) || $recipient !== SriLankaMobile::normalize($recipient) ||
            strlen($message) > 160 || !preg_match('/^[\x20-\x7E]+$/', $message)) {
            throw new SmsDeliveryException('Invalid SMS recipient or message.');
        }
        $allowed = config('sms.allowed_recipients', []);
        if ($allowed && !in_array($recipient, $allowed, true)) {
            throw new SmsDeliveryException('Recipient is not enabled for SMS testing.');
        }

        $client = null;
        $session = null;
        try {
            $client = $this->clients->make();
            $session = $client->createSession((object) ['user' => (object) [
                'username' => config('sms.username'), 'password' => config('sms.password'),
            ]])->return ?? null;
            if (!is_object($session) || empty($session->sessionId)) {
                throw new SmsDeliveryException('SMS gateway authentication failed.');
            }
            $result = $client->sendMessages((object) [
                'session' => $session,
                'smsMessage' => (object) [
                    'message' => $message, 'recipients' => [$recipient],
                    'sender' => config('sms.sender'), 'messageType' => 0,
                ],
            ])->return ?? null;
            if ((string) $result !== '200') {
                // Never include provider response bodies: they may contain credentials or OTPs.
                throw new SmsDeliveryException('SMS gateway did not accept the message.');
            }
        } catch (SmsDeliveryException $exception) {
            throw $exception;
        } catch (\Throwable) {
            // Do not retain the SOAP exception as a previous exception or retry an uncertain send.
            throw new SmsDeliveryException('SMS gateway is temporarily unavailable.');
        } finally {
            if ($client && is_object($session) && !empty($session->sessionId)) {
                try { $client->closeSession((object) ['session' => $session]); }
                catch (\Throwable) { /* An accepted message must not be resent on cleanup failure. */ }
            }
        }
    }
}
