<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\ComptesController;
use App\HTTP\Controllers\ListController;
use App\HTTP\Controllers\MandatController;
use App\HTTP\Controllers\AuthController;
use App\HTTP\Controllers\ContactController;
use App\Models\Compte;
use App\HTTP\Controllers\MessagerieController;
use App\HTTP\Controllers\RequeteController;
use App\HTTP\Controllers\RequeController;






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

Route::get('/',function()
{
    if(session()->has('user'))
    {
        return view('base');
    }
    return view('/login');
})->name('Accueil');

Route::get('/modale',[ComptesController::class,"showRoleUser"])->name('ShowRoleUser');


Route::get('/createMandat',[MandatController::class,"showPresident"])->name('Créer');

Route::post('/ajouterCompte',[ComptesController::class,"myForm"])->name('Ajouter');

Route::get('/listCompte',[ListController::class,"show"])->name('Comptes');

Route::get('/profile/{id}',[ListController::class,"edit"])->name('Profile');

Route::post('/profile/{id}',[ListController::class,"updatee"])->name('UpdateCompte');

Route::get('/supprimer/{id}',[ListController::class,"supprimer"])->name('SupprimerCompte');

Route::get('/bloquer/{id}',[ListController::class,"bloquer"])->name('BloquerCompte');

Route::get('/debloquer/{id}',[ListController::class,"debloquer"])->name('DebloquerCompte');

Route::get('/ajouterCompte',[ComptesController::class,"showRole"])->name('AfficherRole');

Route::post('/createMandat',[MandatController::class,"savedate"])->name('saveDates');

// Route::get('/depar',[MandatController::class,"showdepar"])->name('afficherdepar');

Route::get('/listMembreDep/{idDept}',[MandatController::class,"showdepar"])->name('AfficherMember');




Route::post('/departement',[MandatController::class,"ajouter"])->name('AjouterMembre');


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


Route::get('/detailMessage/{id}',[ContactController::class,"afficherMessage"])->name('DetailMessage');



Route::get('/repondre/{id}',[ContactController::class,"repondre"])->name('Repondre');

Route::get('/session',function()
{
    return view('/DSession.session');
});


Route::get('/accueil',function()
{
    return view('/DSession.accueil');
});


Route::get('/planifier',function()
{
    return view('/DSession.planifier');
});

Route::get('classerMandat',[MandatController::class,"infMandat"])->name('classer');

Route::get('classerM',[MandatController::class,"classerM"])->name('ClasseM');

Route::get('departement',[MandatController::class,"showDept"])->name('showDept');

// --------------------------------------------------------------------------------------------------

Route::get('espaceEt',function()
{
    return view('/Requetes.accreq');
})->name('espaceEtudiant');

Route::get('choisirType',[RequeteController::class,"shoReq"])->name('ReqChoix');

Route::post('choisirType',[RequeteController::class,"choixReq"])->name('ChoixReq');

Route::get('/soutenance',function()
{
    return view('Requetes.soutenance');
})->name('Soutenance');

Route::post('/soutenance',[RequeteController::class,"saveRequete"])->name('SaveSoutenance');

Route::get('/abondon',function()
{
    return view('Requetes.abondon');
})->name('Abondon');

Route::post('/abondon',[RequeteController::class,"saveAbondon"])->name('saveAbondon');

Route::get('/sejourS',function()
{
    return view('Requetes.sejourScient');
})->name('SejSc');

Route::post('/sejourS',[RequeteController::class,"saveSejour"])->name('SaveSej');

Route::get('/changerTheme',function()
{
    return view('Requetes.changeTheme');
})->name('changerTh');

Route::post('/changerTheme',[RequeteController::class,"saveChanger"])->name('SaveChan');


Route::get('/changerDirecte',function()
{
    return view('Requetes.changerDirecte');
})->name('changerDire');

Route::post('/changerDirecte',[RequeteController::class,"saveChangerDir"])->name('saveChanerDir');


Route::get('/inscrire',function()
{
    return view('Requetes.inscrire');
})->name('insc');

Route::post('/inscrire',[RequeteController::class,"saveInscription"])->name('InscDoc');

Route::get('/geler',function()
{
    return view('Requetes.geler');
})->name('Geler');


Route::post('/geler',[RequeteController::class,"saveGeler"])->name('SavGeler');

Route::get('/rajouter',function()
{
    return view('Requetes.rajouter');
})->name('Rajouter');

Route::post('/rajouter',[RequeteController::class,"saveCoDirec"])->name('SaveRajouter');


Route::get('/reinscrire',function()
{
    return view('Requetes.reinscription');
})->name('Reinscrire');

Route::post('/reinscrire',[RequeteController::class,"saveReinscription"])->name('saveReinscrip');

Route::get('/promtionAcad',function()
{
    return view('Requetes.gradeEnse');
})->name('promAcad');

Route::post('/promtionAcad',[RequeteController::class,"savePromAcad"])->name('SaveProm');

Route::get('/promtionRech',function()
{
    return view('Requetes.gradeRech');
})->name('promRech');

Route::post('/promtionRech',[RequeteController::class,"savePromRech"])->name('SaveRech');


Route::get('/espaceEnseChe',[RequeteController::class,"showReqEC"])->name('espaceEC');

Route::get('/habilitation',function()
{
    return view('Requetes.habilitation');
})->name('Habilitation');

Route::get('/polycopie',function()
{
    return view('Requetes.polycopie');
})->name('Polycopie');

Route::post('/polycopie',[RequeteController::class,"savePolycopie"])->name('savePol');

Route::get('/annsabb',function(){
    return view('Requetes.annesabb');
})->name('anneesabb');

Route::post('/annsabb',[RequeteController::class,"saveAnnee"])->name('saveAnneeSab');


Route::post('/habilitation',[RequeteController::class,"saveHabilitation"])->name('SaveHabilitation');


Route::get('/rapportRech',[RequeteController::class,"choixReq"])->name('rapportRech');

Route::get('/offreFormat',[RequeteController::class,"choixReq"])->name('offreFormat');

Route::get('/rapportSynthe',[RequeteController::class,"choixReq"])->name('rapportSynthe');

Route::get('/modifierCahier',[RequeteController::class,"choixReq"])->name('modifierCahier');


Route::get('/rapportExpertise',[RequeteController::class,"choixReq"])->name('rapportExpertise');


































