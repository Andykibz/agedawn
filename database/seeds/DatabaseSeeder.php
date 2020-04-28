<?php

use App\Tag;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            AboutTableSeeder::class,
            ProductTableSeeder::class,
            AdawnageSeeder::class,
        ]);
        Tag::insert([['name'=>'worship'],['name'=>'faith'],['name'=>'children']]);

        factory(App\Article::class, 20)->create();       
    }
}
