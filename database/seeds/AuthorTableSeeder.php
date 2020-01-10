<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorTableSeeder extends Seeder
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
                'display_name' => 'Author '. $index,
                'first_name'   => 'author',
                'last_name'    => 'postingan '. $index,
            ];
        }

        Author::insert($data);
    }
    
}
