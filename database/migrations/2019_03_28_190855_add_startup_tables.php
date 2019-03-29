<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nom',20)->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('filieres',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nom',20)->unique();
            $table->unsignedBigInteger('departement_id')->index();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('parcours',function (Blueprint $table){
            //Licence-Master-Doctorat
            $table->bigIncrements('id');
            $table->string('nom',20)->unique();
            $table->softDeletes();
        });

        Schema::create('cycles',function (Blueprint $table){
            //L1-L2-L3-M1-M2-...
            $table->bigIncrements('id');
            $table->string('nom',20)->unique();
            $table->unsignedBigInteger('parcours_id');
            $table->unsignedBigInteger('previous_annee_id')->nullable();
            $table->unsignedBigInteger('next_annee_id')->nullable();
            $table->softDeletes();
        });

        Schema::create('semestres',function (Blueprint $table){
            //S1-S2-S3-S4-...
            $table->bigIncrements('id');
            $table->string('nom',20)->unique();
            $table->unsignedBigInteger('annee_id');
            $table->softDeletes();
        });

        Schema::create('etudiants',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenoms');
            $table->date('date_nsce');
            $table->string('contact')->nullable();
            $table->string('email',20)->unique();
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('filiere_id');
            $table->unsignedBigInteger('annee_id');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ue',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nom');
        });

        /*Schema::create('totaux',function (Blueprint $table){
            //
            $table->bigIncrements('id');
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('annee_id');
            $table->softDeletes();
            $table->timestamps();
        });*/

        Schema::create('matieres',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nom',50)->unique();
            $table->unsignedBigInteger('ue_id');
            $table->foreign('ue_id')->references('id')->on('ue')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        /*Schema::create('filiere_ue',function (Blueprint $table){
            //table credit ou table filiere_ue
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filiere_id');
            $table->unsignedBigInteger('ue_id');
            $table->unsignedTinyInteger('credits');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
            $table->foreign('ue_id')->references('id')->on('ue')->onDelete('cascade');
            $table->softDeletes();
        });*/


        Schema::create('credits',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filiere_id');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('semestre_id');
            $table->unsignedTinyInteger('credits');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
        });

        Schema::create('notes',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('etudiant_id');

            $table->unsignedBigInteger('filiere_id')->nullable();
            $table->unsignedBigInteger('semestre_id');
            $table->unsignedBigInteger('ue_id');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedTinyInteger('credits');
            $table->unsignedBigInteger('credit_id');

            $table->unsignedTinyInteger('devoir')->nullable();
            $table->unsignedTinyInteger('examen')->nullable();
            $table->unsignedTinyInteger('rattrapage')->nullable();
            $table->unsignedTinyInteger('moyenne')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('inscriptions',function (Blueprint $table){
           $table->bigIncrements('id');
            $table->unsignedBigInteger('annee_id');
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('cycle_id');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('filiere_id');
           $table->softDeletes();
           $table->timestamps();
        });

        Schema::create('annees',function (Blueprint $table){
           $table->bigIncrements('id');
            $table->unsignedBigInteger('annee');
           $table->softDeletes();
           $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


        Schema::dropIfExists('semestres');
        Schema::dropIfExists('cycles');
        Schema::dropIfExists('annees');
        Schema::dropIfExists('parcours');

//        Schema::dropIfExists('totaux');
        Schema::dropIfExists('etudiants');

        Schema::dropIfExists('credits');
        Schema::dropIfExists('matieres');
        Schema::dropIfExists('ue');

        Schema::dropIfExists('filieres');
        Schema::dropIfExists('departements');
        Schema::dropIfExists('notes');

        Schema::dropIfExists('inscriptions');


    }
}
