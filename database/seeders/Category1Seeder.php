<?php

namespace Database\Seeders;

use App\Models\Category1;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            "cat_name" => "Bollywood",
            "cat-status" => "Published",
        ];
        Category1::create($data);
    }
}
