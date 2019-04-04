<?php

use App\Models\Credit;
use Faker\Generator as Faker;

$factory->define(Credit::class, function (Faker $faker) {
    $matieres = \App\Models\Matiere::get();
    $semestres =  \App\Models\Semestre::get();
    return [
        //
        'matiere_id'=>$faker->randomElement($matieres),
        'semestre_id'=>$faker->randomElement($semestres),
        'filiere_id'=>1,
        'credits'=>$faker->randomElement([1,2,3,4,5,6,7,8,9]),
    ];
});
