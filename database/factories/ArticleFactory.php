<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
        $imgArr = [
            'default_medium.jpg','faith_1.jpeg','hands.jpg'
        ];
        $title = $faker->sentence(2);
        return [
            'title'     => $title,
            'slug'      => str_slug($title),
            'image'     => $imgArr[ $faker->randomDigit()%3 ],
            'headline'  => $faker->sentence(15),
            'body'      => $faker->paragraphs(5,true),
        ];
});
