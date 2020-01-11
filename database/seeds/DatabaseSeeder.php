<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(PostTableSeeder::class); 
        $this->call(CommentsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class); 
        $this->call(PostToCategoriesTableSeeder::class);
        $this->call(RelatedsTableSeeder::class);
        $this->call(TagsTableSeeder::class); 
    }
}
