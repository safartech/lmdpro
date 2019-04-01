<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Departement;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Ue;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreditController extends Controller
{
    //
    public function showCreditsPage(){
        return view('app.credits');
    }

    public function loadDatas(){
        $ues = Ue::with('matieres')->get();
        $filieres = Filiere::get();
        $semestres = Semestre::get();
        $departements = Departement::with('filieres.departement','filieres.credits.matiere.ue','filieres.credits.semestre')->get();
        return compact('departements','ues','filieres','semestres');
    }

    public function addCredit(Request $request){
        Credit::updateOrCreate([
            'filiere_id'=>$request->filiere_id,
            'matiere_id'=>$request->matiere_id,
//            'semestre_id'=>$request->semestre_id,
        ],[
            'filiere_id'=>$request->filiere_id,
            'matiere_id'=>$request->matiere_id,
            'semestre_id'=>$request->semestre_id,
            'credits'=>$request->credits,
        ]);

        return Response::HTTP_OK;
    }
}
