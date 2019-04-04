<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function credits(){
        return $this->belongsToMany(Credit::class,'notes')->withPivot(['devoir','examen','rattrapage']);
    }
}
