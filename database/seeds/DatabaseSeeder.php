<?php

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
        factory(App\Article::class, 15)->create();       
    }
}
