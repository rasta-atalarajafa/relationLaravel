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
        $posts  = Post::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [                
                'post_id'   =>rand(1, $posts->count()),
                'tag'       =>'postingan asmw'. $index,
                'tag_clean' =>'-',
            ]; 
        }
        Tag::insert($data);
    }
}
