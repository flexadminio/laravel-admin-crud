<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Men's shoes",
            "Women's shoes",
            "Kid's shoes",
            "Men's T-shirt",
            "Women's T-shirt",
            "Kid's T-shirt",
            "Laptop",
            "HDD",
            "Flower"
        ];
        foreach ($categories as $cat) {
            Category::create(['name' => $cat]);
        }
    }
}
