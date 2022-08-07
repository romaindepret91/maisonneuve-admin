<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedFile extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'titre_fr', 'file_path', 'etudiants_id'];

    public function sharedFileHasEtudiant(){
        return $this->hasOne('App\Models\Etudiant','id', 'etudiants_id');
    }

    static public function getSharedFiles() 
    {
        $lang = "";
        if(session()->has('locale') && session()->get('locale') == 'fr'){
            $lang = '_fr';
        }

        $query = SharedFile::Select(
            'shared_files.id as shared_file_id',
            'shared_files.titre'.$lang.' as titre', 
            'shared_files.created_at', 
            'shared_files.updated_at', 
            'users.name',
            'users.id as users_id',
            'etudiants.id as etudiants_id')
        ->JOIN('etudiants', 'shared_files.etudiants_id', '=', 'etudiants.id')
        ->JOIN('users', 'etudiants.users_id', '=', 'users.id')
        ->get();
        return $query;
    }
}
