<?php

use App\Models\Matiere;
use Illuminate\Database\Seeder;

class MatieresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Matiere::class,80)->create();
    }
}
