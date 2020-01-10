<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Author;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // count total author
        $authors = Author::all();

        $data = array();
        foreach (range(1, 30) as $index) {
            $data[] = [
                'title' => 'Postingan #'. $index,
                'article' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates minima et quasi, ipsa eos assumenda suscipit animi numquam! Quis dolor suscipit ab nihil optio exercitationem magni? Sapiente deleniti dolores provident?',
                'title_clean' => '-',
                'file' => '-',
                'author_id' => rand(1, $authors->count()),
                'banner_image' => '-',
                'views' => rand(10, 100)
            ];
        }

        DB::table('posts')->insert($data);
    }
}
