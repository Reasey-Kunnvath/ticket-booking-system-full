<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = config('roles');


        DB::table('roles')->insertOrIgnore([
            [
                'id' => $roles['admin'],
                'role_name' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => $roles['event-provider'],
                'role_name' => 'event-provider',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => $roles['user'],
                'role_name' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
