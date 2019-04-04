<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    protected $table = "ue";
    public $timestamps = false;

    public function matieres(){
        return $this->hasMany(Matiere::class)->orderBy('nom');
    }
}
