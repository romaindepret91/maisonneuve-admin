<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ['adresse', 'telephone', 'dateNaissance', 'villes_id', 'users_id'];

    public function etudiantHasUser(){
        return $this->hasOne('App\Models\User','id', 'users_id');
    }

    public function etudiantHasVille(){
        return $this->hasOne('App\Models\Ville','id', 'villes_id');
    }
}
