<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Usuario::class, function (Faker $faker) {
    return [
        'primer_nombre' => $faker->name,
        'segundo_nombre' => $faker->name,
        'primer_apellido' => $faker->name,
        'segundo_apellido' => $faker->name,
        'correo' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(10)),
        'fecha_nacimiento' => now(),
        'estado_id' => 2,
    ];
});
