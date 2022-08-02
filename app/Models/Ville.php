<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    static public function selectVille($id){
        $query = Ville::Select('nom')
        ->WHERE('id', $id)
        ->get();
        return $query[0];
    }
}
