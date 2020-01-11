<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categorie;

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
                'name'       =>'Postingan asmw'. $index,
                'name_clean' =>'-',
            ];
        }
        DB::table('categories')->insert($data);
    }
}
