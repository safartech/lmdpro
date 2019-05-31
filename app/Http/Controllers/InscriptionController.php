<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Departement;
use App\Models\Domaine;
use App\Models\Etudiant;
use App\Models\Filieres;
use App\Models\Mention;
use App\Models\Parcour;
use App\Models\Filiere;
use App\Models\Pays;
use App\Models\Type_parcours;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays=Pays::get();
        $domaines=Domaine::get();
        $cycle=Cycle::get();
        $mentions=Mention::get();
        $filieres=Filieres::get();
        $t_parcours=Type_parcours::get();


        return compact('pays','domaines','t_parcours','mentions','filieres','cycle');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $etudiant= new Etudiant();
            $etudiant->nom=$request->input('nom');
            $etudiant->prenoms=$request->input('prenoms');
            $etudiant->nom_jeune=$request->input('nom_jeune');
            $etudiant->date_nsce=$request->input('date_nsce');
            $etudiant->lieu_nsce=$request->input('lieu_nsce');
            $etudiant->nationalite=$request->input('nationalite');
            $etudiant->pays=$request->input('pays');
            $etudiant->ethnie=$request->input('ethnie');
            $etudiant->prefecture=$request->input('prefecture');
            $etudiant->sexe=$request->input('sexe');
            $etudiant->situation_mat=$request->input('situation_mat');
            $etudiant->adresse=$request->input('adresse');
            $etudiant->telephone=$request->input('telephone');
            $etudiant->email=$request->input('email');
            $etudiant->nom_pere=$request->input('nom_pere');
            $etudiant->prenoms_pere=$request->input('prenoms_pere');
            $etudiant->profession_pere=$request->input('profession_pere');
            $etudiant->nom_mere=$request->input('nom_mere');
            $etudiant->prenoms_mere=$request->input('prenoms_mere');
            $etudiant->profession_mere=$request->input('profession_mere');
            $etudiant->pers_prevenir=$request->input('pers_prevenir');
            $etudiant->prevenir_tel=$request->input('prevenir_tel');
            $etudiant->annee_bac=$request->input('annee_bac');
            $etudiant->serie_bac=$request->input('serie_bac');
            $etudiant->num_table=$request->input('num_table');
            $etudiant->num_attestation=$request->input('num_attestation');
            $etudiant->pays_bac=$request->input('pays_bac');
            $etudiant->annee_ant=$request->input('annee_ant');
            $etudiant->univ_ant=$request->input('univ_ant');
            $etudiant->domaine_ant=$request->input('domaine_ant');
            $etudiant->etabliss_ant=$request->input('etabliss_ant');
            $etudiant->parcours_ant=$request->input('parcours_ant');

            $etudiant->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
