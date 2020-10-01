<?php

use Faker\Generator as Faker;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'phone'             => $faker->unique()->phoneNumber,
        'whatsapp'          => $faker->unique()->phoneNumber,
        'email'             => $faker->unique()->safeEmail,
        'password'          => '123456', // secret
        'type'              => 'admin' ,
        'active'            => rand(0,1),
        'category_id'       => Category::inRandomOrder()->first()->id ,
        'remember_token'    => str_random(10),
        'role'              => rand(0,1),
        'created_at'        => $faker->date,
        'updated_at'        => $faker->date,
    ];
});
