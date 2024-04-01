<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index)  {
            Product::create([
                'name' => $faker->city,
                'detail' => $faker->paragraph($nb =2),
                'price' => $faker->numberBetween($min = 500, $max = 8000),
                'quantity'=> $faker->numberBetween($min = 30, $max = 300),
                'unit_sold'=> $faker->numberBetween($min = 30, $max = 300),
            ]);
        }
    }
}
