<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('sms:status', function () {
    $this->table(['SMS setting', 'Status'], [
        ['Authentication', config('sms.enabled') ? 'Enabled' : 'Disabled'],
        ['PHP SOAP extension', extension_loaded('soap') ? 'Available' : 'Missing'],
        ['Gateway username', config('sms.username') ? 'Configured' : 'Missing'],
        ['Gateway password', config('sms.password') ? 'Configured' : 'Missing'],
        ['Approved Sender ID', config('sms.sender') ? 'Configured (approval must be confirmed with Mobitel)' : 'Missing'],
        ['Recipient restriction', config('sms.allowed_recipients') ? 'Test allowlist enabled' : 'No restriction'],
    ]);
    $this->comment('Configuration check only. No credentials are displayed and no SMS is sent.');
})->purpose('Check SMS configuration without sending a message');
