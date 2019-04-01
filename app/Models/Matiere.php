<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    //

    public function ue(){
        return $this->belongsTo(Ue::class);
    }
}
