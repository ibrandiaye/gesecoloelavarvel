<?php

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
Route::resource('/anneescolaire', 'AnneeScolaireController');
Route::resource('/tutteur', 'TutteurController');
Route::resource('/eleve', 'EleveController');
Route::resource('/niveau', 'NiveauController');
Route::resource('/serie', 'SerieController');
Route::resource('/tarif', 'TarifController');
Route::resource('/classe', 'ClasseController');
Route::resource('/programme', 'ProgrammeController');
Route::resource('/professeur', 'ProfesseurController');
Route::resource('/matiere', 'MatiereController');
Route::get('/getProgrammeByClasse/{id}', 'ProgrammeController@index')->name('home')->middleware('auth');
Route::resource('/coefficient', 'CoefficientController');
Route::resource('/planning', 'PlanningController');
Route::resource('/cahier-texte', 'CahierTexteController');
