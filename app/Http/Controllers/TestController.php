<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Cycle;
use App\Models\Inscription;
use App\Models\Semestre;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function makeTest(){
//        $ins = Inscription::distinct()->get('annee_id');
        $cycle = Cycle::find(1);
        $semestres = Semestre::where('cycle_id',$cycle->id)->get();
        $credits = Credit::with('matiere')->where('filiere_id',1)->whereIn('semestre_id',$semestres)->get();
        return $credits;
    }
}
