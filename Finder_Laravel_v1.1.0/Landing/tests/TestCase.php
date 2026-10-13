<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function actingAs(\Illuminate\Contracts\Auth\Authenticatable $user, $guard = null)
    {
        $this->withSession(['otp_verified'=>[$user->getAuthIdentifier(), $user->email]]);
        return parent::actingAs($user, $guard);
    }
}
