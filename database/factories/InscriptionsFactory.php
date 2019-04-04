<?php

use App\Models\Annee;
use App\Models\Cycle;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Inscription;
use Faker\Generator as Faker;

$factory->define(Inscription::class, function (Faker $faker) {
    $etudiants = Etudiant::get('id');
    $filieres = [1];
    $cycles = Cycle::get('id');
    $annees = Annee::get('id');
    return [
        'etudiant_id'=>$faker->randomElement($etudiants),
        'filiere_id'=>$faker->randomElement($filieres),
        'cycle_id'=>$faker->randomElement($cycles),
        'annee_id'=>$faker->randomElement($annees),
    ];
});
