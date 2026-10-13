<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['land' => 'Land', 'house' => 'House', 'apartment' => 'Apartment', 'villa' => 'Villa', 'commercial' => 'Commercial'];

        foreach ($categories as $slug => $name) {
            // Preserve existing IDs and any category customizations on repeated runs.
            if (! DB::table('property_categories')->where('slug', $slug)->exists()) {
                DB::table('property_categories')->insert([
                    'slug' => $slug,
                    'name' => $name,
                    'is_active' => true,
                    'sort_order' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}