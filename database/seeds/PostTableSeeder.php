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
        //hitung total author
        $authors = Author::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'title'        => 'Postingan #'. $index,
                'article'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quas minima quia sed maiores, deserunt incidunt? 
                                   Minima eaque enim modi aut sunt accusantium atque, nostrum quaerat blanditiis vel nam deserunt.',
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