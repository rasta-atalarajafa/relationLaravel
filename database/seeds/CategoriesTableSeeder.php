<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categories;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'name' => $faker->name,
                'name_clean' => $faker->firstName,
            ];
        }
        DB::table('categories')->insert($data);
        
    }
}
