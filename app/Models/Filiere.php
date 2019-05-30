<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    public $timestamps = false;

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function credits(){
        return $this->hasMany(Credit::class);
    }
}
