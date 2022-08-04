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
        return view('etudiants.liste',['etudiants' => $etudiants]);
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
        $request->validate([
            'name'              => 'required|min:2|max:30',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6|max:10',
            'adresse'           => 'required|max:120',
            'telephone'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'dateNaissance'     => 'required|date_format:Y-m-d',
            'ville'             => 'required|numeric'
        ]);
        $user = new User;
        $user->fill([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);
        $user->save();
        $etudiant = new Etudiant;
        $etudiant->fill([
            'adresse'       => $request->adresse,
            'telephone'     => $request->telephone,
            'dateNaissance' => $request->dateNaissance,
            'villes_id'     => $request->ville,
            'users_id'      => $user->id
        ]);
        $etudiant->save();

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
        $ville = Ville::selectVille($etudiant->__get('villes_id'));
        return view('etudiants.show', ['etudiant' => $etudiant, 'ville' => $ville]);
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
        return view('etudiants.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
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
        $user = $user[0];
        $request->validate([
            'name'              => 'required|min:2|max:30',
            'adresse'           => 'required|max:120',
            'telephone'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'dateNaissance'     => 'required|date_format:Y-m-d',
            'ville'             => 'numeric'
        ]);
        if($user->email !== $request->email) $request->validate(['email' => 'email|unique:users']);
        if($request->password !== null) {
            $request->validate(['password' => 'min:6|max:10']);
            $user->update(['password'  => Hash::make($request->password)]);
        }
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
        ]);

        $etudiant->update([
            'adresse'           => $request->adresse,
            'telephone'         => $request->telephone,
            'dateNaissance'     => $request->dateNaissance,
            'villes_id'         => $request->ville,
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
