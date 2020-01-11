<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //hitung total id post
      $post  = Post::all();
      $users = User::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [                
                'post_id'        =>,
                'is_reply_to_id' =>,
                'comment'        =>,
                'user_id'        =>,
            ];
        }
    }
}
