<?php

namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            "1 color",
            "1 colors",
            "technology",
            "cheap",
            "high quality"
        ];
        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
