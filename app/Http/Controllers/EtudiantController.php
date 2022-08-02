<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all(); 
        $villes = Ville::all();
        return view('etudiants.liste',['etudiants' => $etudiants, 'villes' => $villes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiants.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name'      => $request->nom,
            'email'     => $request->email,
            'password'  => Hash::make('123456')
        ]);

        $etudiant = Etudiant::create([
            'adresse'           => $request->adresse,
            'telephone'         => $request->telephone,
            'dateNaissance'     => $request->dateNaissance,
            'villes_id'         => $request->villes,
            'users_id'          => $user->id
        ]);

        return redirect(route('etudiant.show', $etudiant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {   
        $ville = Ville::select()->where('id', '=', $etudiant->__get('villes_id'))->get();
        $user = User::select()->where('id', '=', $etudiant->__get('users_id'))->get();
        return view('etudiants.show', ['etudiant' => $etudiant, 'ville' => $ville[0], 'user' => $user[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        $user = User::select()->where('id', '=', $etudiant->__get('users_id'))->get();
        return view('etudiants.edit', ['etudiant' => $etudiant, 'villes' => $villes, 'user' => $user[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $user = User::select()->where('id', '=', $etudiant->__get('users_id'))->get();
        $user[0]->update([
            'name'      => $request->nom,
            'email'     => $request->email,
        ]);

        $etudiant->update([
            'adresse'           => $request->adresse,
            'telephone'         => $request->telephone,
            'dateNaissance'     => $request->dateNaissance,
            'villes_id'         => $request->villes,
        ]);

        return redirect(route('etudiant.show', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $user = User::select()->where('id', '=', $etudiant->__get('users_id'))->get();

        $etudiant->delete();
        $user[0]->delete();

        return redirect(route('etudiants'));
    }
}
