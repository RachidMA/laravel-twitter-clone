<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Plumber',
            'Electrician',
            'Carpenter',
            'Tiler/Granger',
            'Welder',
            'HVAC Technician',
            'Painter',
            'Handyman',
            'Landscaper',
            'Lawn Mower Operator'
        ];
        foreach ($categories as $category) {
            \App\Models\Category::factory()->create([
                'name' => $category,
            ]);
        }
    }
}
