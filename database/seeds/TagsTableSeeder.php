<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagsTableSeeder extends Seeder
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
                'name'   => 'Tag '. $index,
            ];
        }

        Tag::insert($data);
    }
}
