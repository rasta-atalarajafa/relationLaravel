<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;


class RelatedsTableSeeder extends Seeder
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
                     'post_id'               => rand(1, $posts->count()), 
                     'related_post_id'       => $index,

             
                
             ];
         }
 
         DB::table('relateds')->insert($data);
    }
}
