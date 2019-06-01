<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public function inscription(){
        return $this->hasMany(Inscription::class);
    }

    public function pays(){
        return $this->belongsTo(Pays::class);
    }

    protected $table = 'etudiants';

    protected $fillable = ['matricule', 'nom', 'prenoms', 'nom_jeune', 'date_nsce', 'lieu_nsce', 'nationalite', 'pays', 'ethnie',
        'prefecture', 'sexe', 'situation_mat', 'adresse', 'telephone', 'email', 'nom_pere', 'prenoms_pere', 'profession_pere',
        'nom_mere', 'prenoms_mere', 'profession_mere', 'pers_prevenir', 'prevenir_tel', 'annee_bac', 'serie_bac',  'num_table',
        'num_attestation', 'pays_bac', 'annee_ant', 'univ_ant', 'domaine_ant', 'etabliss_ant', 'parcours_ant'
    ];
}
