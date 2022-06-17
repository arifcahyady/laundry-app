<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'laundry_type' => 'premium',
            'price' => '15000'
        ]);

        Category::create([
            'laundry_type' => 'express',
            'price' => '10000'
        ]);

        Category::create([
            'laundry_type' => 'basic',
            'price' => '5000'
        ]);
    }
}
