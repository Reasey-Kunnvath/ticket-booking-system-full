<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventCategory::create([
            'cate_name' => 'Concert',
            'cate_description' => 'Oracle',
            'status' => 1,
            'created_by' => 1,
        ]);

        EventCategory::create([
            'cate_name' => 'Diddy',
            'cate_description' => 'Party',
            'status' => 1,
            'created_by' => 1,
        ]);
    }
}