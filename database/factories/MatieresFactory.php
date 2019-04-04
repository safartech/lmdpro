<?php

use App\Models\Matiere;
use App\Models\Ue;
use Faker\Generator as Faker;

$factory->define(Matiere::class, function (Faker $faker) {
    $ues = Ue::get('id');
    return [
        'nom'=>strtoupper($faker->jobTitle),
        'ue_id'=>$faker->randomElement($ues)
    ];
});
