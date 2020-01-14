<?php

use Illuminate\Database\Seeder;
use App\Comment;
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
      //hitung total id post
      $posts  = Post::all();
      $users  = User::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [                
                'post_id'        =>rand(1, $posts->count()),
                'is_reply_to_id' =>rand(1, $posts->count()),
                'comment'        =>'Good',
                'user_id'        =>rand(1, $users->count()),
            ];
        }
        Comment::insert($data);
    }
}
