<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'buyer' => 'Customer / Buyer',
            'seller' => 'Seller',
            'agent' => 'Agent',
            'sales' => 'LGC Sales Team',
            'verification' => 'Verification Team',
            'admin' => 'Admin',
        ];

        $now = now();
        $records = [];

        foreach ($roles as $name => $label) {
            $records[] = [
                'name' => $name,
                'label' => $label,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('roles')->upsert(
            $records,
            ['name'],
            ['label', 'updated_at']
        );
    }
}