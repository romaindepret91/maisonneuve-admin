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
Route::get('signup', [CustomAuthController::class, 'create'])->name('signup');
Route::post('custom-signup', [CustomAuthController::class, 'store'])->name('custom.signup');

Route::get('etudiants', [EtudiantController::class, 'index'])->name('etudiants');
Route::get('etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::delete('etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');
Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');

Route::get('villes', [VilleController::class, 'index'])->name('villes');
Route::get('villes/{ville}', [VilleController::class, 'show'])->name('ville.show');
Route::delete('villes/{ville}', [VilleController::class, 'destroy'])->name('ville.delete');
Route::get('ville-create', [VilleController::class, 'create'])->name('ville.create');
Route::post('ville-create', [VilleController::class, 'store'])->name('ville.store');
Route::get('ville-edit/{ville}', [VilleController::class, 'edit'])->name('ville.edit');
Route::put('ville-edit/{ville}', [VilleController::class, 'update'])->name('ville.update');
