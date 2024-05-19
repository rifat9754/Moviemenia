<?php

namespace Database\Seeders;

use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            "title"=>"This is my title",
            "date"=>"0000",
            "description"=>"zzz",
            "category1_id"=>"1",
            "video_type"=>"zzz",
            "thumbnail"=>"zzz",
            "meta_title"=>"zzz",
            "meta_description"=>"zzz",
            "meta_keywords"=>"zzz",
        ];
        Post::create($data);
    }
}
