<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class transactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransactionStatus::create([
            'status_name' => 'processing'
        ]);

        TransactionStatus::create([
            'status_name' => 'complete'
        ]);

        TransactionStatus::create([
            'status_name' => 'failed'
        ]);
    }
}
