<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    //
    public $timestamps = false;

    public function semestres(){
        return $this->hasMany(Semestre::class);
    }
}
