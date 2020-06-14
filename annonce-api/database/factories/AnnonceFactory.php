<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Annonce;
use App\User;
use App\Category;

use Faker\Generator as Faker;

function getInstanceOf($class, $returnIdOnly = true)
{
    $instance = $class::inRandomOrder()->first() ?? factory($class)->create();
    return $returnIdOnly ? $instance->id : $instance;
}



$factory->define(Annonce::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomFloat(2,  1, 1000),
        'user_id' => getInstanceOf(User::class),
        'category_id' => getInstanceOf(Category::class)

    ];
});
