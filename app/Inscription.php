<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }

    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }

    public function annee(){
        return $this->belongsTo(Annee::class);
    }

    public function cycle(){
        return $this->belongsTo(Cycle::class);
    }

    public function type_parcours(){
        return $this->belongsTo(Type_parcours::class);
    }

    public function mention(){
        return $this->belongsTo(Mention::class);
    }

    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }

    protected $table = 'inscriptions';

    protected $fillable = ['annee_id', 'etudiant_id', 'type_parcours_id', 'cycle_id', 'domaine_id', 'mention_id', 'filiere_id'];
}
