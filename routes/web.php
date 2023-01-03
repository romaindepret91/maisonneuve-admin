<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController; 
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\SharedFileController;

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

Route::get('blogposts', [BlogpostController::class, 'index'])->name('blogposts')->middleware('auth');
Route::get('blogpost-create', [BlogpostController::class, 'create'])->name('blogpost.create')->middleware('auth');
Route::post('blogpost-create', [BlogpostController::class, 'store'])->name('blogpost.store')->middleware('auth');
Route::get('blogpost-edit/{blogpost}', [BlogpostController::class, 'edit'])->name('blogpost.edit')->middleware('auth');
Route::put('blogpost-edit/{blogpost}', [BlogpostController::class, 'update'])->name('blogpost.update')->middleware('auth');
Route::delete('blogposts/{blogpost}', [BlogpostController::class, 'destroy'])->name('blogpost.delete')->middleware('auth');

Route::get('sharedFiles', [SharedFileController::class, 'index'])->name('sharedFiles')->middleware('auth');
Route::get('sharedFiles/{sharedFile}', [SharedFileController::class, 'downloadSharedFile'])->name('sharedFile.download')->middleware('auth');
Route::get('sharedFile-create', [SharedFileController::class, 'create'])->name('sharedFile.create')->middleware('auth');
Route::post('sharedFile-create', [SharedFileController::class, 'store'])->name('sharedFile.store')->middleware('auth');
Route::get('sharedFile-edit/{sharedFile}', [SharedFileController::class, 'edit'])->name('sharedFile.edit')->middleware('auth');
Route::put('sharedFile-edit/{sharedFile}', [SharedFileController::class, 'update'])->name('sharedFile.edit')->middleware('auth');
Route::delete('sharedFiles/{sharedFile}', [SharedFileController::class, 'destroy'])->name('sharedFile.delete')->middleware('auth');

Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');
