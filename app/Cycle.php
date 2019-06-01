<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    public function inscription(){
        return $this->hasMany(Inscription::class);
    }

    public function parcours(){
        return $this->belongsTo(Parcours::class);
    }

    protected $table = 'cycles';

    protected $fillable = ['nom'];
}
