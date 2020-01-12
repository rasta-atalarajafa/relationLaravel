<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Post;
use App\User;

class CommentsTableSeeder extends Seeder
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

        //hitung total posts dan user
        $posts = Post::all();
        $users = User::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                    'post_id'          => rand(1, $posts->count()), 
                    'is_reply_to_id'   => $faker->randomDigit ,
                    'comment'          => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
                    'user_id'          =>  rand(1, $users->count()),
            
               
            ];
        }

        DB::table('comments')->insert($data);
        
    }
}
