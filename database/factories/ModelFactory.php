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

$factory->define(App\Models\EvaUsuario::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'usu_usuario' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
        'usu_clave' => $password ?: $password = bcrypt(env('APP_KEY')),
//        'remember_token' => str_random(10),
    ];
});
