<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    public function inscription(){
        return $this->hasMany(Inscription::class);
    }
    
    protected $table = 'domaines';

    protected $fillable = ['nom'];
}
