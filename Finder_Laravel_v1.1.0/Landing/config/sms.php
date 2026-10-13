<?php

return [
    // Enable only after the gateway account and approved Sender ID are tested.
    'enabled' => env('SMS_ENABLED', false),
    'username' => env('MOBITEL_SMS_USERNAME'),
    'password' => env('MOBITEL_SMS_PASSWORD'),
    'sender' => env('MOBITEL_SMS_ALIAS') ?: env('MOBITEL_SMS_SENDER'),
    'wsdl' => env('MOBITEL_ESMS_WSDL', 'https://msmsenterpriseapi.mobitel.lk/mSMSEnterpriseAPI/mSMSEnterpriseAPI.wsdl'),
    'timeout' => 15,
    // Optional staging restriction: comma-separated numbers in 947XXXXXXXX format.
    'allowed_recipients' => array_values(array_filter(array_map('trim', explode(',', env('SMS_ALLOWED_RECIPIENTS', ''))))),
];
