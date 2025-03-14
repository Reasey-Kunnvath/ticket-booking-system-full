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
            'status_name' => 'processing'
        ]);

        ModelOrderStatus::create([
            'status_name' => 'complete'
        ]);

        ModelOrderStatus::create([
            'status_name' => 'failed'
        ]);
    }
}
