<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //hitung total posts dan user
        $posts = Post::all();
        $users = User::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                    'post_id'          => rand(1, $posts->count()), 
                    'is_reply_to_id'   =>  $index ,
                    'comment'          => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius maxime consequuntur, amet nostrum consectetur 
                                           quam ipsum deserunt nemo molestiae ex repellendus aliquam! Perferendis, tempore autem quis laudantium et 
                                           expedita repudiandae.',
                    'user_id'          =>  rand(1, $users->count()),
            
               
            ];
        }

        DB::table('comments')->insert($data);
        
    }
}
