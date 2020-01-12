<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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
                'name'     => $faker->name,
                'email'    => $faker->email,
                'password' => Hash::make('admin'),
            ];
        }

        DB::table('users')->insert($data);
    }
}
