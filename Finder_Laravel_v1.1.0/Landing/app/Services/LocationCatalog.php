<?php
namespace App\Services;

use Illuminate\Validation\ValidationException;

class LocationCatalog
{
    public static function all(): array
    {
        static $data;
        return $data ??= json_decode(file_get_contents(resource_path('data/sri-lanka-locations.json')), true, 512, JSON_THROW_ON_ERROR);
    }

    public static function options(): array
    {
        static $result;
        if ($result !== null) return $result;
        $result = [];
        $data = self::all();
        foreach ($data['districts'] as $district) {
            $cities = array_values(array_unique(array_column(array_filter($data['cities'],
                fn ($city) => $city['district_id'] === $district['id']), 'name_en')));
            sort($cities, SORT_NATURAL | SORT_FLAG_CASE);
            $result[$district['name_en']] = $cities;
        }
        ksort($result);
        return $result;
    }

    public static function validate(array $data, $existing = null): array
    {
        $district = trim($data['district'] ?? '');
        $city = trim($data['city'] ?? '');
        // Preserve a saved pair even when absent from the source catalogue.
        if ($existing && $district === ($existing->district ?? '') && $city === ($existing->city ?? '')) return $data;
        if ($district === '' && $city === '') return $data;
        $options = self::options();
        $canonical = collect(array_keys($options))->first(fn ($name) => strcasecmp($name, $district) === 0);
        if (!$canonical) throw ValidationException::withMessages(['district'=>'Choose a district from the list.']);
        if ($city !== '') {
            $matched = collect($options[$canonical])->first(fn ($name) => strcasecmp($name, $city) === 0);
            if (!$matched) throw ValidationException::withMessages(['city'=>'Choose a city belonging to the selected district.']);
            $data['city'] = $matched;
        }
        $data['district'] = $canonical;
        return $data;
    }
}
