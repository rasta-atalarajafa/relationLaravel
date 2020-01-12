<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //agar data-data yang termasuk di database semua data indonesia
        $faker = Faker::create('id_ID');

        //hitung total author
        $authors = Author::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'title'        =>  $faker->title,
                'article'      =>  $faker->sentence($nbWords = 6, $variableNbWords = true) ,
                'title_clean'  =>  '-',
                'file'         =>  '-',
                'author_id'    =>  rand(1, $authors->count()),
                'banner_image' =>  '-',
                'views'        =>  rand(10,100) 
            ];
        }

        DB::table('posts')->insert($data);
    }
}
