<?php

namespace Database\Seeders;

use App\Models\Coupons;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupons::create([
            'coupons_title' => 'save50',
            'coupons_type' => 'percentage',
            'coupons_value' => '50',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->add(1, 'month'),
            'status' => 1,
            'max_use' => 100,
            'createdby' => 1,
        ]);

        Coupons::create([
            'coupons_title' => 'supersave',
            'coupons_type' => 'amount',
            'coupons_value' => '5',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->add(1, 'month'),
            'status' => 1,
            'max_use' => 100,
            'createdby' => 1,
        ]);
    }
}
