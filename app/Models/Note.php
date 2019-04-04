<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }

    public function credit(){
        return $this->belongsTo(Credit::class);
    }


}
