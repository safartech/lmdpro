<?php

use Illuminate\Database\Seeder;
use App\Etudiant;
use Faker\Factory;

class EtudiantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etudiant::truncate();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
            Etudiant::create([
                'matricule' => 'INJS2019',
                'nom' => $faker->firstName,
                'prenoms' => $faker->lastName,
                'nom_jeune' => $faker->userName,
                'date_nsce' => $faker->date,
                'lieu_nsce' => $faker->address,
                'nationalite' => $faker->country,
                'pays_id' => 1,
                'ethnie' => $faker->country,
                'prefecture' => $faker->country,
                'sexe' => 'M',
                'situation_mat' => 'Celibataire',
                'adresse' => $faker->address,
                'telephone' => $faker->phoneNumber,
                'email' => $faker->email,
                'nom_pere' => $faker->firstName,
                'prenoms_pere' => $faker->lastName,
                'profession_pere_id' => 1,
                'nom_mere' => $faker->firstName,
                'prenoms_mere' => $faker->lastName,
                'profession_mere_id' => 1,
                'pers_prevenir' => $faker->name,
                'prevenir_tel' => $faker->phoneNumber,
                'annee_bac' => $faker->year,
                'serie_bac' => 'A4',
                'num_table' => $faker->creditCardNumber,
                'num_attestation' => $faker->creditCardNumber,
                'pays_bac' => 'Togo',
                'annee_ant' => $faker->year,
                'univ_ant' => 'UNIVERSITE DE LOME',
                'domaine_ant' => 'Sciences de l\'education',
                'etabliss_ant' => 'INJS',
                'parcours_ant' => 'Licence professionnel'
            ]);
        }
    }
}
