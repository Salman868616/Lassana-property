<?php

namespace App\Support;

class SriLankaMobile
{
    public static function normalize(?string $number): ?string
    {
        $number = preg_replace('/[\s()\-]/', '', $number ?? '');
        if (preg_match('/^07[0-9]{8}$/', $number)) $number = '94'.substr($number, 1);
        if (str_starts_with($number, '+')) $number = substr($number, 1);
        return preg_match('/^947[0-9]{8}$/', $number) ? $number : null;
    }

    public static function masked(?string $number): string
    {
        $number = self::normalize($number);
        return $number ? '+94 7•• ••• '.substr($number, -3) : 'your mobile number';
    }
}
