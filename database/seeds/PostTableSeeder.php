<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Author;
use App\Categorie;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hitung total author
        $authors = Author::all();
        $categories = Categorie::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'title'        => 'Postingan x'. $index,
                'article'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'title_clean'  => '-',
                'file'         => '-',
                'author_id'    => rand(1, $authors->count()),
                'category_id'  => rand(1, $categories->count()),
                'banner_image' => '-',
                'views'        => rand(10,100)
            ];
        }

        DB::table('posts')->insert($data);
    }
}
