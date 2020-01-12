<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::all();
        $faker = Faker::create('id_ID');

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'post_id' => rand(1, $post->count()),
                'tag' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'tag_clean' => $faker->randomNumber($nbDigits = NULL, $strict = false)
            ];
        }
        DB::table('tags')->insert($data);
    }
}
