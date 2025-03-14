<?php

namespace Database\Seeders;

use App\Models\PartnershipDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnershipDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PartnershipDetail::create([
            'org_name' => 'PDiddy',
            'org_type' => 'Government',
            'org_address'  => 'Ohio',
            'org_email'  => 'diddy@diddy.com',
            'org_phone_number'  => '069696969',
            'ambassador_name'  => 'Puk',
            'ambassador_email'  => 'puk@puk.com',
            'ambassador_phone'  => '069696969',
            'status' => '1',
            'req_status' => '1',
            'user_id'  => '3'
        ]);
    }
}
