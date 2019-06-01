<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    public function inscription(){
        return $this->hasMany(Inscription::class);
    }

    protected $table = 'mentions';

    protected $fillable = ['nom'];
}
