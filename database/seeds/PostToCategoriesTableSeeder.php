<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Categories;

class PostToCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::all();
        $categories = Categories::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'post_id' => rand(1, $post->count()),
                'category_id' => rand(1, $categories->count()),
            ];
        }
        DB::table('post_to_categories')->insert($data);
        
    }
}
