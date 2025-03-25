<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin_role_id = config('roles.admin');
        $event_provider_role_id = config('roles.event-provider');
        $user_role_id = config('roles.user');

        DB::table('roles')->insertOrIgnore([
            ['id' => $admin_role_id, 'role_name' => 'Admin'],
            ['id' => $event_provider_role_id, 'role_name' => 'Event Provider'],
            ['id' => $user_role_id, 'role_name' => 'User'],
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role_id' => $admin_role_id,
            'phone_number' => '012222333',
        ]);

        User::factory()->create([
            'name' => 'Event Provider',
            'email' => 'eventprovider@eventprovider.com',
            'password' => bcrypt('12345678'),
            'role_id' => $event_provider_role_id,
            'phone_number' => '023222333',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
            'role_id' => $user_role_id,
            'phone_number' => '021222333',
        ]);
    }
}