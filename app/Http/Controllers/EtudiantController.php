<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;
use App\Domaine;
use App\Mention;
use App\Filiere;
use App\Type_parcours;
use App\Parcours;
use App\Cycle;
use App\Annee;
use App\Inscription;
use App\Pays;

class EtudiantController extends Controller
{
    public function showEtudiantsPage(){
        return view('app.etudiants');
    }

    public function loadDatas(){

        $inscriptions = Inscription::with('annee', 'etudiant', 'type_parcours', 'cycle', 'domaine', 'mention', 'filiere')->get();
        $annees = Annee::get();
        $cycles = Cycle::with('parcours')->get();
        $type_parcours = Type_parcours::with('parcours')->get();
        $filieres = Filiere::get();
        $domaines = Domaine::get();
        $mentions = Mention::get();


        return compact('inscriptions', 'annees', 'cycles', 'type_parcours', 'filieres', 'domaines', 'mentions');
    }

    public function updateEtudiant(Request $request){

        $etu = Etudiant::find($request->input('etudiant.id'));
        $etu->update($request->input('etudiant'));

        $insc = Inscription::find($request->input('inscription_id'));

        $insc->update([
            'annee_id' => $request->input('annee.id'),
            'type_parcours_id' => $request->input('type_parcours.id'),
            'cycle_id' =>  $request->input('cycle.id'),
            'domaine_id' => $request->input('domaine.id'),
            'mention_id' => $request->input('mention.id'),
            'filiere_id' => $request->input('filiere.id'),
        ]);

        return "ok";
    }

    public function deleteEtudiant(Request $request){

        $etu = Etudiant::find($request->input('etudiant.id'));
        $etu->delete();

        $insc = Inscription::find($request->input('inscription_id'));
        $insc->delete();

        return "ok";
    }
}
