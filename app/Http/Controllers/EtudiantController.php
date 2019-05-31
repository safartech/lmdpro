<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiant=DB::table('etudiants')->
            join('departements','etudiants.departement_id','=','departements.id')->
            join('filieres','etudiants.filiere_id','=','filieres.id')->
            join('cycles','etudiants.annee_id','=','cycles.id')->select('departements.nom as depnom','filieres.nom as filnom','cycles.nom as cyclenom','etudiants.nom as etunom','etudiants.prenoms as etup','etudiants.sexe as etusexe','etudiants.email as etumail')->get();



       return compact('etudiant');
    }




    public function showEtudiantPage(){

        return view('app.etudiants');
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
        //
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
    }
public function up(Request $request, $id){


    $Etudiant=Etudiant::find($id);
    $Etudiant->update($request->input());
    return 'ok';
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
