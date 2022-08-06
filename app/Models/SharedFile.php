<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedFile extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'file_path', 'etudiants_id'];

    public function sharedFileHasEtudiant(){
        return $this->hasOne('App\Models\Etudiant','id', 'etudiants_id');
    }
}
