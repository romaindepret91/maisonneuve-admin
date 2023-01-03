<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'titre_fr', 'body', 'body_fr', 'etudiants_id'];

    static public function getBlogArticles() 
    {
        $lang = "";
        if(session()->has('locale') && session()->get('locale') == 'fr'){
            $lang = '_fr';
        }

        $query = BlogArticle::Select(
            'blog_articles.id as blogpost_id',
            'blog_articles.titre'.$lang.' as titre', 
            'blog_articles.body'.$lang.' as body', 
            'blog_articles.created_at', 
            'blog_articles.updated_at', 
            'users.name',
            'users.id as users_id',
            'etudiants.id as etudiants_id')
        ->JOIN('etudiants', 'blog_articles.etudiants_id', '=', 'etudiants.id')
        ->JOIN('users', 'etudiants.users_id', '=', 'users.id')
        ->get();
        return $query;
    }
}
