<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use Faker\Factory as Faker;

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
        $faker = Faker::create('id_ID');

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'post_id' => rand(1, $post->count()),
                'is_reply_to_id' =>  $faker->randomDigit,
                'comment' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'user_id' => rand(1, $user->count()),
            ];
        }

        DB::table('comments')->insert($data);

    }
}
