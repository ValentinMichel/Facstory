<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/', 'ControleurVisualisation@index')->name('home');
//Route::get('/', 'ControleurVisualisation@index')->name('home');

Route::get('/histoire/creer', 'ControleurCreation@creerHistoire')->name('creer_histoire');
Route::post('/histoire/enregistrer', 'ControleurCreation@enregistrerHistoire')->name('enregistrer_histoire');
Route::get('/histoire/accueil/{id}', 'ControleurVisualisation@accueil_histoire')->name('accueil_histoire');

Route::get('/visualisation/chapitre/{id}', 'ControleurVisualisation@lire_chapitre')->name('lire_chapitre');
Route::get('/visualisation/chapitreEnr/{id}', 'ControleurVisualisation@lire_chapitreEnr')->name('lire_chapitreEnr');

Route::get('/liste/','ControleurVisualisation@mes_histoires')->name('mes_histoires');
Route::post('liste/enregistrer', 'ControleurCreation@activeHistoire')->name('active_histoire');

Route::get('/chapitre/creer', 'ControleurCreation@creerChapitre')->name('creer_chapitre');
Route::post('/chapitre/enregistrer', 'ControleurCreation@enregistrerChapitre')->name('enregistrer_chapitre');

Route::get('/chapitre/lier/{id}', 'ControleurCreation@lierChapitre')->name('lier_chapitre');
Route::post('/chapitre/lier/enregistrer', 'ControleurCreation@enregistrerLiaison')->name('enregistrer_liaison');
