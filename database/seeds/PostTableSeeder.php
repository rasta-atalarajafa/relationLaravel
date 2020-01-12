<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Author;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = Author::all();
        $faker = Faker::create('id_ID');

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'title'        => $faker->word,
                'article'      => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'title_clean'  => '-',
                'file'         => '-',
                'author_id'    => rand(1, $authors->count()),
                'banner_image' => '-',
                'views'        => rand(10,100) 
            ];
        }

        DB::table('posts')->insert($data);
    }
}
