<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        foreach (range(1, 5) as $index) {
            $data[] = [
                'name'       => 'Kategori #'. $index,
                'name_clean' => '-',
            ];
        }

        DB::table('categories')->insert($data);
    }
}
