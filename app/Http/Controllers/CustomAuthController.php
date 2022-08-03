<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Etudiant;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('auth.signup', ['villes' => $villes]);
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
            'name'              => 'required|max:30|min:2',
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

        return redirect(route('login'));
    }

    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(!Auth::validate($credentials)): 
            return redirect('login')->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return redirect()->intended('dashboard')->withSuccess('Bienvenue dans votre espace étudiant, ');

    }

    public function dashboard(){

        $name = null;
        if(Auth::check()){
            $name = Auth::user()->name;
        }

        return view('layout.dashboard', ['name' => $name]);
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return Redirect(route('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
