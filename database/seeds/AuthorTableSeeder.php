<?php

use Illuminate\Database\Seeder;
use App\Author;
use Faker\Factory as Faker;


class AuthorTableSeeder extends Seeder
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
                'display_name' => $faker->name,
                'first_name'   => $faker->firstname,
                'last_name'    => $faker->lastname,
            ];
        }
        Author::insert($data);
    }
    
}
