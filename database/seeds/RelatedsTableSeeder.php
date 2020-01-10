<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;

class RelatedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::all();

        $data = array();
        foreach (range(1, 10) as $index) {
            $data[] = [
                'post_id' => rand(1, $post->count()),
                'related_post_id' => $index,
            ];
        }
        DB::table('relateds')->insert($data);
        
    }
}
