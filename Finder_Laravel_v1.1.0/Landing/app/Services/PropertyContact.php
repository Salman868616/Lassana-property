<?php
namespace App\Services;

use App\Models\Property;

class PropertyContact
{
    public static function phone(?string $value): ?string
    {
        $value = trim($value ?? '');
        if (!preg_match('/^\+?[0-9 ()-]+$/', $value)) return null;
        $digits = preg_replace('/[^0-9]/', '', $value);
        if (str_starts_with($digits, '00')) $digits = substr($digits, 2);
        elseif (strlen($digits) === 10 && $digits[0] === '0') $digits = '94'.substr($digits, 1);
        return preg_match('/^[1-9][0-9]{7,14}$/', $digits) ? '+'.$digits : null;
    }

    public function forProperty(Property $property): array
    {
        $phone = self::phone(config('company.phone_uri'));
        $email = config('company.email');
        $whatsapp = self::phone(config('company.whatsapp'));
        $url = route('properties.show', $property->property_code);
        $message = 'Hello, I am interested in '.$property->title.' ('.$property->property_code.").\n".$url;
        return [
            'heading' => 'Contact Lassana Property',
            'name' => 'Lassana Property sales team',
            'phone' => $phone,
            'email' => filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null,
            'whatsapp' => $whatsapp ? 'https://wa.me/'.substr($whatsapp, 1).'?text='.rawurlencode($message) : null,
        ];
    }
}
