<?php

namespace App\Services;

use SoapClient;

class MobitelSoapClient
{
    public function make(): SoapClient
    {
        return new SoapClient(config('sms.wsdl'), [
            'connection_timeout' => (int) config('sms.timeout', 15),
            'exceptions' => true,
            'trace' => false,
            'cache_wsdl' => WSDL_CACHE_DISK,
            'stream_context' => stream_context_create([
                'http' => ['timeout' => (int) config('sms.timeout', 15)],
                'ssl' => ['verify_peer' => true, 'verify_peer_name' => true],
            ]),
        ]);
    }
}
