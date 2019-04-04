<?php

use App\Models\Etudiant;
use Faker\Generator as Faker;
use App\Models\Annee as Annee;

$factory->define(Etudiant::class, function (Faker $faker) {
    $annees = Annee::get('id');
    $filieres = \App\Models\Filiere::get('id');
    $cycles = \App\Models\Cycle::get('id');
    return [
        'nom'=>$faker->lastName,
        'prenoms'=>$faker->firstName,
        'date_nsce'=>$faker->dateTimeBetween('-30 years','-20 years'),
        'contact'=>$faker->phoneNumber,
        'email'=>$faker->safeEmail,
        'adresse'=>$faker->address,
        'annee_id'=>$faker->randomElement($annees),
        'filiere_id'=>$faker->randomElement([1]),
        'cycle_id'=>$faker->randomElement($cycles)
    ];
});
