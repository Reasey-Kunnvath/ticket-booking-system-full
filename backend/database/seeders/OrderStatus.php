<?php

namespace Database\Seeders;

use App\Models\OrderStatus as ModelOrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ModelOrderStatus::create([
            'status_name' => 'processing',
            'status_color' => '#fca903'
        ]);

        ModelOrderStatus::create([
            'status_name' => 'complete',
            'status_color' => '#00de00'
        ]);

        ModelOrderStatus::create([
            'status_name' => 'failed',
            'status_color' => '#e60000'
        ]);
    }
}
