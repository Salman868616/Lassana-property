<?php
namespace App\Services;

class PropertyIdentifier
{
    public static function format(int $id, ?string $district): string
    {
        $letters = preg_replace('/[^A-Z]/', '', strtoupper(trim($district ?? '')));
        $prefix = $letters === '' ? 'UND' : substr($letters, 0, 3);
        return 'LP-'.$prefix.'-'.str_pad((string) $id, 5, '0', STR_PAD_LEFT);
    }
}
