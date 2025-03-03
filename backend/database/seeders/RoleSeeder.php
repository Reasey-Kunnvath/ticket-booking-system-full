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
            ['id' => $roles['admin'], 'role_name' => 'admin'],
            ['id' => $roles['event_provider'], 'role_name' => 'event_provider'],
            ['id' => $roles['user'], 'role_name' => 'user'],
        ]);
    }
}
