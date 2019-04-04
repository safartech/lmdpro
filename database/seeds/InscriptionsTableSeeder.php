<?php

use App\Models\Inscription;
use Illuminate\Database\Seeder;

class InscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inscription::class,200)->create();
    }
}
