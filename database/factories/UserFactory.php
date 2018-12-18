<?php

use Faker\Generator as Faker;
use App\User;
use App\Message;

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
$factory->define(User::class, function (Faker $faker) {
    static $password;
    return [
        'user_psp' =>$faker->numberBetween(100,500),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->PhoneNumber,
        'password' => $password ?: $password = 'secret',
        'status' => $status = $faker->randomElement([User::USUARIO_ACTIVO,User::USUARIO_INACTIVO]),
        'credito' =>$credito = $faker->numberBetween(10,500),
		'user_img_pr'=>'http://via.placeholder.com/150x150',
        'verified'=>$verificado = $faker-> randomElement([User::USUARIO_VERIFICADO,User::USUARIO_NO_VERIFICADO]),
        'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarVerificationToken(),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Message::class, function (Faker $faker) {
    do{
        $from = rand(1,15);
        $to = rand(1,15);
    }while($from == $to);
    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence,

    ];
});
