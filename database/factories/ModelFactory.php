<?php


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/* @var $factory type */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->firstName($gender = null|'male'|'female'),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

/**
 * Category
 */
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

/**
 * Product
 */
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'amount' => $faker->randomDigit,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }
    ];
});
