<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_parcours extends Model
{
    public function inscription(){
        return $this->hasMany(Inscription::class);
    }

    public function parcours(){
        return $this->belongsTo(Parcours::class);
    }

    protected $table = 'type_parcours';

    protected $fillable = ['nom'];
}
