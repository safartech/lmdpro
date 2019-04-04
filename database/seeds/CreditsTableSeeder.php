<?php

use App\Models\Credit;
use Illuminate\Database\Seeder;

class CreditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Credit::class,100)->create();
    }
}
