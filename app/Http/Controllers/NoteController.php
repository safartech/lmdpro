<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Credit;
use App\Models\Cycle;
use App\Models\Departement;
use App\Models\Filiere;
use App\Models\Inscription;
use App\Models\Note;
use App\Models\Semestre;
use App\Models\Ue;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function loadDatas(){
        $inscriptions = Inscription::with('etudiant')->get();
        $notes = Note::with('etudiant','credit.matiere')->get();
        $annees = Annee::get();
        $departements = Departement::with('filieres')->get();
        $filieres = Filiere::get();
        $cycles = Cycle::with('semestres')->get();
        $ues = Ue::with('matieres')->get();
        $credits = Credit::with('matiere.ue')->get();
        $semestres = Semestre::get();
        foreach ($notes as $note){
            $note['nom'] = $note->etudiant->nom;
            $note['prenoms'] = $note->etudiant->prenoms;
        }

        return compact('inscriptions','annees','departements','cycles','ues','filieres','credits','notes','semestres');
    }

    public function updateNote(Request $request){
        unset($request['nom']);
        unset($request['prenoms']);
        unset($request['etudiant']);
        unset($request['credit']);
//        return $request->input();
        Note::find($request->id)->update($request->input());
        return 200;
    }
}
