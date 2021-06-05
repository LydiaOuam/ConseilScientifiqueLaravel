<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\ComptesController;
use App\HTTP\Controllers\ListController;
use App\HTTP\Controllers\MandatController;
use App\HTTP\Controllers\AuthController;
use App\HTTP\Controllers\ContactController;
use App\Models\Compte;
use App\HTTP\Controllers\MessagerieController;





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

// Route::get('/',function()  //si on nous demande la page d'accueil / on va executer une fonction ......
// {
//     return view('base');
// })->name('Accueil');

Route::get('/',function()  //si on nous demande la page d'accueil / on va executer une fonction ......
{
    if(session()->has('user'))
    {
        return view('base');
    }
    return view('/login');
})->name('Accueil');


Route::get('/createMandat',function()
{
    return view('createMandat');
})->name('Créer');

Route::post('/ajouterCompte',[ComptesController::class,"myForm"])->name('Ajouter');

Route::get('/listCompte',[ListController::class,"show"])->name('Comptes');

Route::get('/profile/{id}',[ListController::class,"edit"])->name('Profile');

Route::post('/profile/{id}',[ListController::class,"updatee"])->name('UpdateCompte');

Route::get('/supprimer/{id}',[ListController::class,"supprimer"])->name('SupprimerCompte');

Route::get('/bloquer/{id}',[ListController::class,"bloquer"])->name('BloquerCompte');

Route::get('/debloquer/{id}',[ListController::class,"debloquer"])->name('DebloquerCompte');

Route::get('/ajouterCompte',[ComptesController::class,"showRole"])->name('AfficherRole');

Route::post('/createMandat',[MandatController::class,"savedate"])->name('saveDates');

Route::get('/listMembre',[MandatController::class,"showMember"])->name('AfficherMember');

Route::get('/ajouterMembreMandat/{id}',[MandatController::class,"ajouterMembre"])->name('AjouterMember');

Route::get('/login',function()
    {
        return view('login');
    }
)->name('Login');

Route::post('/login',[AuthController::class,"authentifier"])->name('Authentifier');

Route::get('/logout',function()
{
    if(session()->has('user'))
    {
        session()->pull('user');
    }
    return redirect(route('Authentifier'));
})->name('LogOut');

// Route::get('/contact',function()
// {
//     return view('/contact');
// })->name('Contact');


Route::post('/contact',[MessagerieController::class,"message"])->name('Envoyer');


Route::get('/contact',[MessagerieController::class,"showMessages"])->name('Contact');


Route::get('/contenu',function()
{
    return view('/contenu');
})->name('Contenu');

Route::get('/contenu',[ContactController::class,"showMessages"])->name('Contenu');











