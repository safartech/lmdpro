<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    public function inscription(){
        return $this->hasMany(Inscription::class);
    }
    
    protected $table = 'filieres';

    protected $fillable = ['nom'];
}
