<?php

use App\Tag;
use App\Meta;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        Meta::create([ 'type' =>  'config',  'name' =>  'AccessControl', 'slug' =>  'accesscontrol', 'value' =>  FALSE]);

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
