<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::all();
        $user = User::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'post_id' => rand(1, $post->count()),
                'is_reply_to_id' =>  $index,
                'comment' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam earum excepturi quo sit! Placeat molestiae ipsum, tenetur omnis quidem magni, provident animi dolor, atque quo unde. Ducimus impedit maxime voluptates?',
                'user_id' => rand(1, $user->count()),
            ];
        }

        DB::table('comments')->insert($data);

    }
}
