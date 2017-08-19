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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(iService\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(iService\Solicitante::class, function (Faker\Generator $faker){
	return [
		'cpf' => $faker->unique()->numberBetween(10000000000, 99999999999),
		'nome' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'endereco' => $faker->address,
		'status' => 1,
		'observacao' => $faker->text
	];
});