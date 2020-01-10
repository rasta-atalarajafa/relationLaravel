<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'name'     => 'Administrator'. $index,
                'email'    => 'admin'.$index.'@gmail.com',
                'password' => Hash::make('admin'),
            ];
        }

        DB::table('users')->insert($data);
    }
}
