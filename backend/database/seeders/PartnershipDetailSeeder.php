<?php

namespace Database\Seeders;

use App\Models\PartnershipDetail;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnershipDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partnership = PartnershipDetail::create([
            'org_name' => 'PDiddy',
            'org_type' => 'Government',
            'org_address'  => 'Ohio',
            'org_email'  => 'diddy@diddy.com',
            'org_phone_number'  => '069696969',
            'ambassador_name'  => 'Puk',
            'ambassador_email'  => 'puk@puk.com',
            'ambassador_phone'  => '069696969',
            'status' => '1',
            //default pending
            'req_status' => '2',
            // 'user_id'  => '3'
        ]);

        User::factory()->create([
            'name' => 'Event Provider',
            'email' => 'eventprovider@eventprovider.com',
            'password' => bcrypt('12345678'),
            'role_id' => config("roles.event-provider"),
            'phone_number' => '023222333',
            'partnership_id' => $partnership->partnership_id
        ]);
    }
}
