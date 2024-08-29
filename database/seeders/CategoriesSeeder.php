<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'general',
            'entertainment',
            'sports',
            'movies',
            'politics',
            'cars'
        ];

        foreach ($categories as $category) {
            Categories::create([
                "name" => $category
            ]);
        }
    }
}
