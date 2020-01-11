<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'name'     => 'name' . $index,
                'name_clean'    => 'clean' .$index,
                
            ];
        }

        DB::table('categories')->insert($data);
        
    }
}
