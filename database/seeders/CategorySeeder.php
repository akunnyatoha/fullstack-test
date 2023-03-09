<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "title" => "now_playing"
            ],
            [
                "title" => "popular"
            ],
            [
                "title" => "top_rated"
            ],
            [
                "title" => "up_coming"
            ],
        ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
