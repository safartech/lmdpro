<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    public function inscription(){
        return $this->hasMany(Inscription::class);
    }

    protected $table = 'annees';

    protected $fillable = ['annee'];
}
