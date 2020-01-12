<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
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

         //agar data-data yang termasuk di database semua data indonesia
         $faker = Faker::create('id_ID');

         //hitung total posts 
         $posts = Post::all();
        
         $data = array();
         foreach (range(1, 10) as $index) {
             $data[] = [
                     'post_id'        => rand(1, $posts->count()), 
                     'tag'            => '#' . $faker->jobTitle,
                     'tag_clean'      => $faker->company,
             
                
             ];
         }
 
         DB::table('tags')->insert($data);
         
    }
}
