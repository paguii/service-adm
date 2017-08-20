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

$factory->define(iService\NivelAcesso::class, function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->company,
    ];
});

$factory->define(iService\AreaAtendimento::class, function (Faker\Generator $faker) {
    return [
		'situacao' => 1,
		'nome' => $faker->name,
        'descricao' => $faker->text,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(iService\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
		'name' => $faker->name,
		'nivelacesso_id' => $faker->numberBetween(1,5),
        'email' => $faker->unique()->safeEmail,
		'password' => $password ?: $password = bcrypt('secret'),
		'situacao' => 1,
        'remember_token' => str_random(10),
    ];
});

$factory->define(iService\Solicitante::class, function (Faker\Generator $faker){
	return [
		'cpf' => $faker->unique()->numberBetween(10000000000, 99999999999),
		'nome' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'endereco' => $faker->address,
		'situacao' => 1,
		'observacao' => $faker->text
	];
});