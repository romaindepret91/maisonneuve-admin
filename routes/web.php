<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('signup', [CustomAuthController::class, 'create'])->name('signup');
Route::post('custom-signup', [CustomAuthController::class, 'store'])->name('custom.signup');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('etudiants', [EtudiantController::class, 'index'])->name('etudiants')->middleware('auth');
Route::get('etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');
Route::delete('etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete')->middleware('auth');
Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create')->middleware('auth');
Route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store')->middleware('auth');
Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');
Route::put('etudiant-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update')->middleware('auth');

Route::get('villes', [VilleController::class, 'index'])->name('villes')->middleware('auth');
Route::get('villes/{ville}', [VilleController::class, 'show'])->name('ville.show')->middleware('auth');
Route::delete('villes/{ville}', [VilleController::class, 'destroy'])->name('ville.delete')->middleware('auth');
Route::get('ville-create', [VilleController::class, 'create'])->name('ville.create')->middleware('auth');
Route::post('ville-create', [VilleController::class, 'store'])->name('ville.store')->middleware('auth');
Route::get('ville-edit/{ville}', [VilleController::class, 'edit'])->name('ville.edit')->middleware('auth');
Route::put('ville-edit/{ville}', [VilleController::class, 'update'])->name('ville.update')->middleware('auth');
