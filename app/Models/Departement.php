<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{

    public function filieres(){
        return $this->hasMany(Filiere::class);
    }
}
