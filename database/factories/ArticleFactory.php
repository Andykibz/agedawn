<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
        
        return [
            'title'     => $faker->sentence(2),
            'slug'      => $faker->unique()->safeEmail,
            'image'     => $faker->randomDigit()%2 ? 'default':Null,
            'headline'  => $faker->sentence(12),
            'body'      => $faker->paragraphs(4,true),
        ];
});
