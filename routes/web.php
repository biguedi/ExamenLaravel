<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/type/ajout', function () {
    return view('type.ajout');
})->name('ajoutType');

Route::get('/formation/reference',[FormationController::class,'nbres'])->name('formation.ref');//
Route::get('/formation/type',[FormationController::class,'nbre'])->name('formation.type');
Route::get('/candidat/formation',[CandidatController::class,'nbre'])->name('candidat.form');


Route::get('/formation/ajout',[FormationController::class,'ajout'])->name('ajoutFormation');
Route::get('/candidat/ajout',[CandidatController::class,'ajout'])->name('ajoutCandidat');
Route::get('/referentiel/ajout',[ReferentielController::class,'ajout'])->name('ajoutReferentiel');

Route::get('Candidat/sexe',[CandidatController::class,'showCandidat'])->name('grapheSexe');
Route::get('Candidat/age',[CandidatController::class,'showAgeDiagram'])->name('grapheAge');
Route::get('formation/isStarted',[FormationController::class,'showFormationStatus'])->name('grapheIsStarted');


Route::resource('candidats',CandidatController::class);
Route::resource('formations',FormationController::class);
Route::resource('referentiels',ReferentielController::class);
Route::resource('types',TypeController::class);
Route::get('upCandidat{id}',[CandidatController::class,'modif'])->name('upCand');
Route::get('upFormation{id}',[FormationController::class,'modif'])->name('upForm');
Route::get('upReferentiel{id}',[ReferentielController::class,'modif'])->name('upRef');
Route::get('upType{id}',[TypeController::class,'modif'])->name('upType');

Route::delete('/formation/index/{id}', [FormationController::class, 'destroyFormation'])->name('formation.delete');

