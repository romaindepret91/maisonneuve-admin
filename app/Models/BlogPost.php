<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'titre_fr', 'body', 'body_fr', 'etudiants_id'];
}
