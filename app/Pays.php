<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    public function etudiant(){
        return $this->hasMany(Etudiant::class);
    }

    protected $table = 'pays';

    protected $fillable = ['nom'];
}
