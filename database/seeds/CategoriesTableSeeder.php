<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Category;


class CategoriesTableSeeder extends Seeder
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

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'name'             => $faker->name,
                'name_clean'       => $faker->firstname,
                
            ];
        }

        DB::table('categories')->insert($data);
        
    }
}
