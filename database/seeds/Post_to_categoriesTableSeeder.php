<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;

class Post_to_categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //hitung total posts 
          $posts               = Post::all();
          $categories  =  Category::all();
        
 
          $data = array();
          foreach (range(1, 10) as $index) {
              $data[] = [
                    'category_id'   => rand(1, $categories->count()),
                    'post_id'       => rand(1, $posts->count()), 
                      
              
                 
              ];
          }
  
          DB::table('post_to_categories')->insert($data);
    }
}
