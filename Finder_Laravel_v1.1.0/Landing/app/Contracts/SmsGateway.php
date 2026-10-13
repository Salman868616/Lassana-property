<?php

namespace App\Contracts;

interface SmsGateway
{
    /** Throws if the provider does not explicitly accept the message. */
    public function send(string $recipient, string $message): void;
}
