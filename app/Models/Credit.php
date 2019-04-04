<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    //
    public $timestamps = false;
    protected $guarded = ['id'];

    public function filiere(){
        return $this->belongsTo(Filiere::class)->orderBy('nom');
    }

    public function semestre(){
        return $this->belongsTo(Semestre::class)->orderBy('id');
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class)->orderBy('ue_id');
    }


}
