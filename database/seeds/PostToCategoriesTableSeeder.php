<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categorie;
use App\Post;

class PostToCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Categorie::all();
        $posts      = Post::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [                
                'category_id' =>rand(1, $categories->count()),
                'post_id'     =>rand(1, $posts->count()),
            ]; 
        }
        DB::table('post_to_categories')->insert($data);
    }
}
