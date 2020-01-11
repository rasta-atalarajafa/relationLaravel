<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //hitung total posts 
         $posts = Post::all();
        
 
         $data = array();
         foreach (range(1, 10) as $index) {
             $data[] = [
                     'post_id'        => rand(1, $posts->count()), 
                     'tag'      => 'Tags' . $index,
                     'tag_clean'      => 'clean' . $index,
             
                
             ];
         }
 
         DB::table('tags')->insert($data);
         
    }
}
