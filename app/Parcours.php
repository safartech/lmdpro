<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcours extends Model
{
    public function type_parcours(){
        return $this->hasMany(Type_parcours::class);
    }

    public function cycle(){
        return $this->hasMany(cycle::class);
    }

    protected $table = 'parcours';

    protected $fillable = ['nom'];
}
