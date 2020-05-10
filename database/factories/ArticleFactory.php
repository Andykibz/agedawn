<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Generator;
use Faker\Factory as Factory;

function generate_paragraph( $n ){
    $faker = Factory::create();
    $par = '';
    for ($i=0; $i < $n; $i++) { 
        $par .= '<p>'.$faker->paragraph($nbSentences = 10, $variableNbSentences = true).'</p>';
    }
    return $par;
}

$factory->define(Article::class, function (Generator $faker) {
        $imgArr = [
            'default_medium.jpg','faith_1.jpeg','hands.jpg',null,null,null
        ];
        $title = $faker->sentence(2);

        $index = $faker->randomDigit()%6;
        return [
            'title'     => $title,
            'slug'      => str_slug($title),
            'type'      => ( $index > 2  ) ? 'weekly' : 'article',
            'image'     => $imgArr[ $index ],
            'headline'  => $faker->sentence(15),
            // 'body'      => $faker->paragraphs(5,true),
            'body'      => generate_paragraph( $faker->numberBetween($min = 2, $max = 9) ),
        ];
});
