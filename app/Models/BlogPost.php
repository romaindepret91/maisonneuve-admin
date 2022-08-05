<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Blogpost extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'titre_fr', 'body', 'body_fr', 'etudiants_id'];

    static public function getBlogposts() 
    {
        $lang = "";
        if(session()->has('locale') && session()->get('locale') == 'fr'){
            $lang = '_fr';
        }

        $query = BlogPost::Select(
            'blogposts.id as blogpost_id',
            'blogposts.titre'.$lang.' as titre', 
            'blogposts.body'.$lang.' as body', 
            'blogposts.created_at', 
            'blogposts.updated_at', 
            'users.name',
            'users.id as users_id',
            'etudiants.id as etudiants_id')
        ->JOIN('etudiants', 'blogposts.etudiants_id', '=', 'etudiants.id')
        ->JOIN('users', 'etudiants.users_id', '=', 'users.id')
        ->get();
        return $query;
    }
}
