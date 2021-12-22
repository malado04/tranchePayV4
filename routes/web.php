<?php

namespace App\Http\Controllers;
// use Illuminate\Routing\Route;
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
 

/////////////////////////SITE VITRINE /////////////////////////////////////////////


/////////////////////////FIN SITE VITRINE /////////////////////////////////////////////

Route::get('/registercommercant', function () {
    return view('auth.registercommercant');
   });

Route::view('/documentation', 'documentation');
Route::view('/commercant', 'commercant');
Route::view('/particulier', 'particulier');
Route::view('/choixinscription', 'choixinscription');
Route::view('/contact', 'contact');

Route::get('/pversement')->name('pversement');


Route::group(['middleware'=>['auth']], function()
{
	Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});
Route::group(['middleware'=>['auth', 'role:client']], function()
{
	Route::get('/client/listeversements', 'App\Http\Controllers\ClientController@listeversement')->name('listeversement');
	Route::get('/client/demandefinancement', 'App\Http\Controllers\ClientController@demandefinancement')->name('demandefinancement');
	Route::get('/client/effectuerversements', 'App\Http\Controllers\ClientController@effectuerversement')->name('effectuerversement');
	Route::get('/client/mescommandes', 'App\Http\Controllers\ClientController@mescommandes')->name('mescommandes');
	Route::get('/client/modifiermotdepasse', 'App\Http\Controllers\ClientController@modifiermdp')->name('modifiermdp');
	Route::post('/client/modifiermotdepasse', 'App\Http\Controllers\ClientController@updatemdp')->name('updatemdp');
	route::post('/client/demandefinancements','App\Http\Controllers\ClientController@creerfinancement')->name("creerfinancement"); 
	route::post('/client/aide','App\Http\Controllers\ClientController@formaideclient')->name("formaideclient"); 
	route::get('/client/aide','App\Http\Controllers\ClientController@aide')->name("aideclient"); 
	route::get('/client/facturepayement','App\Http\Controllers\ClientController@facturepayement')->name("facturepayement"); 
	route::post("/client/verset",'App\Http\Controllers\ClientController@versement')->name("versement");

	route::get('/client/partenaire','App\Http\Controllers\ClientController@listepartenaire')->name('listepartenaire'); 
});

Route::group(['middleware'=>['auth', 'role:commercant']], function()
{
	Route::get('/commercant/enregistrercommande', 'App\Http\Controllers\CommercantController@enregistrercommande')->name('enregistrercommande');
	Route::get('/commercant/aide', 'App\Http\Controllers\CommercantController@aide')->name('aide');
	route::post('/commercant/enregistrercommandes','App\Http\Controllers\CommercantController@creercommande')->name("creercommande"); 
	route::post('/commercant/aides','App\Http\Controllers\CommercantController@formaide')->name("formaide"); 
	route::get('/commercant/listedescommande','App\Http\Controllers\CommercantController@listecommande')->name("listecommande"); 
	Route::get('/commercant/modifiermotpasse', 'App\Http\Controllers\CommercantController@modifiermdpc')->name('modifiermdpc');
	Route::post('/commercant/modifiermotpasse', 'App\Http\Controllers\CommercantController@updatemdpc')->name('updatemdpc');

	Route::get('/commercant/listeproduit', 'App\Http\Controllers\CommercantController@listeproduit')->name('listeproduit');
	Route::post('/commercant/ajoutproduit', 'App\Http\Controllers\CommercantController@ajoutproduit')->name('ajoutproduit');

});

Route::group(['middleware'=>['auth', 'role:superadmin']], function()
{
	Route::get('/superadmin/admin', 'App\Http\Controllers\superadminController@pageadmin')->name('pageadmin');
	route::get('/superadmin/creeradmin','App\Http\Controllers\superadminController@creeradmin')->name("creeradmin"); 
	route::post('/superadmin/creationadmin','App\Http\Controllers\superadminController@creationadmin')->name("creationadmin"); 

	Route::get('/superadmin/client', 'App\Http\Controllers\superadminController@pageclient')->name('pageclient');
	route::get('/superadmin/creerclient','App\Http\Controllers\superadminController@creerclient')->name("creerclient"); 
	route::post('/superadmin/creationclient','App\Http\Controllers\superadminController@creationclient')->name("creationclient"); 

	Route::get('/superadmin/partenaire', 'App\Http\Controllers\superadminController@pagepartenaire')->name('pagepartenaire');
	route::get('/superadmin/creerpartenaire','App\Http\Controllers\superadminController@creerpartenaire')->name("creerpartenaire"); 
	route::post('/superadmin/creationpartenaire','App\Http\Controllers\superadminController@creationpartenaire')->name("creationpartenaire");  

	Route::get('/superadmin/commercant', 'App\Http\Controllers\superadminController@pagecommercant')->name('pagecommercant');
	route::get('/superadmin/creercommercant','App\Http\Controllers\superadminController@creercommercant')->name("creercommercant"); 
	route::post('/superadmin/creationcommercant','App\Http\Controllers\superadminController@creationcommercant')->name("creationcommercant");  

	Route::get('/superadmin/modifiercodepin', 'App\Http\Controllers\superadminController@modifiersuperadmin')->name('modifiersuperadmin');
	Route::post('/superadmin/nouveaucodepin', 'App\Http\Controllers\superadminController@updatesuperadmin')->name('updatesuperadmin');

	Route::get('/superadmin/aide', 'App\Http\Controllers\superadminController@pageaide')->name('pageaide');
	Route::get('/superadmin/fianancement', 'App\Http\Controllers\superadminController@pagefinancement')->name('pagefinancement');
	Route::get('/superadmin/versement', 'App\Http\Controllers\superadminController@pageversement')->name('pageversement');
	Route::get('/superadmin/commande', 'App\Http\Controllers\superadminController@pagecommande')->name('pagecommande');
	
	route::get('/superadmin/admin/{admin}','App\Http\Controllers\superadminController@editadmin')->name('editadmin'); 
	Route::delete('/superadmin/admin/{suppadmin}','App\Http\Controllers\superadminController@supprimeradmin')->name('supprimeradmin');
	Route::put('/superadmin/admin/{useradmin}','App\Http\Controllers\superadminController@supdateadmin')->name('supdateadmin'); 

	route::get('/superadmin/client/{sclient}','App\Http\Controllers\superadminController@seditclient')->name('seditclient'); 
	Route::delete('/superadmin/client/{ssuppclient}','App\Http\Controllers\superadminController@ssupprimerclient')->name('ssupprimerclient');
	Route::put('/superadmin/client/{suserclient}','App\Http\Controllers\superadminController@supdateclient')->name('supdateclient');

	Route::get('/superadmin/categorie', 'App\Http\Controllers\superadminController@pagecategorie')->name('pagecategorie');
	route::get('/superadmin/creercategorie','App\Http\Controllers\superadminController@creercategorie')->name("creercategorie"); 
	route::post('/superadmin/creationcategorie','App\Http\Controllers\superadminController@creationcategorie')->name("creationcategorie"); 

	route::get('/superadmin/categorie/{scategorie}','App\Http\Controllers\superadminController@seditcategorie')->name('seditcategorie'); 
	Route::delete('/superadmin/categorie/{ssuppcategorie}','App\Http\Controllers\superadminController@ssupprimercategorie')->name('ssupprimercategorie');
	Route::put('/superadmin/categorie/{scategorie}','App\Http\Controllers\superadminController@supdatecategorie')->name('supdatecategorie');
	
	route::get('/superadmin/partenaire/{spartenaire}','App\Http\Controllers\superadminController@seditpartenaire')->name('seditpartenaire'); 
	Route::delete('/superadmin/partenaire/{ssupppartenaire}','App\Http\Controllers\superadminController@ssupprimerpartenaire')->name('ssupprimerpartenaire');
	Route::put('/superadmin/partenaire/{suserpartenaire}','App\Http\Controllers\superadminController@supdatepartenaire')->name('supdatepartenaire');
	
	route::get('/superadmin/commercant/{scommercant}','App\Http\Controllers\superadminController@seditcommercant')->name('seditcommercant'); 
	Route::delete('/superadmin/commercant/{ssuppcommercant}','App\Http\Controllers\superadminController@ssupprimercommercant')->name('ssupprimercommercant');
	Route::put('/superadmin/commercant/{susercommercant}','App\Http\Controllers\superadminController@supdatecommercant')->name('supdatecommercant'); 

	Route::put('/superadmin/adminactive/{activeradmin}','App\Http\Controllers\superadminController@activeradmin')->name('activeradmin'); 
	Route::put('/superadmin/admindesactive/{desactiveradmin}','App\Http\Controllers\superadminController@desactiveradmin')->name('desactiveradmin'); 
	Route::put('/superadmin/scommercantactive/{sactivercommercant}','App\Http\Controllers\superadminController@sactivercommercant')->name('sactivercommercant'); 
	Route::put('/superadmin/sdesactivecommercant/{sdesactivecommercant}','App\Http\Controllers\superadminController@sdesactivecommercant')->name('sdesactivecommercant');
	Route::put('/superadmin/spartenaireactive/{sactiverpartenaire}','App\Http\Controllers\superadminController@sactiverpartenaire')->name('sactiverpartenaire'); 
	Route::put('/superadmin/sdesactivepartenaire/{sdesactivepartenaire}','App\Http\Controllers\superadminController@sdesactivepartenaire')->name('sdesactivepartenaire'); 
	Route::put('/superadmin/sclientactive/{sactiverclient}','App\Http\Controllers\superadminController@sactiverclient')->name('sactiverclient'); 
	Route::put('/superadmin/sdesactiveclient/{sdesactiveclient}','App\Http\Controllers\superadminController@sdesactiveclient')->name('sdesactiveclient'); 

});

Route::group(['middleware'=>['auth', 'role:admin']], function()
{
	Route::get('/admin/client', 'App\Http\Controllers\AdminController@pageclientad')->name('pageclientad');
	route::get('/admin/creerclient','App\Http\Controllers\AdminController@creerclientad')->name("creerclientad"); 
	route::post('/admin/creationclient','App\Http\Controllers\AdminController@creationclientad')->name("creationclientad"); 

	Route::get('/admin/partenaire', 'App\Http\Controllers\AdminController@pagepartenairead')->name('pagepartenairead');
	route::get('/admin/creerpartenaire','App\Http\Controllers\AdminController@creerpartenairead')->name("creerpartenairead"); 
	route::post('/admin/creationpartenaire','App\Http\Controllers\AdminController@creationpartenairead')->name("creationpartenairead");  

	Route::get('/admin/commercant', 'App\Http\Controllers\AdminController@pagecommercantad')->name('pagecommercantad');
	route::get('/admin/creercommercant','App\Http\Controllers\AdminController@creercommercantad')->name("creercommercantad"); 
	route::post('/admin/creationcommercant','App\Http\Controllers\AdminController@creationcommercantad')->name("creationcommercantad");  

	Route::get('/admin/modifiercodepin', 'App\Http\Controllers\AdminController@modifieradminad')->name('modifieradminad');
	Route::post('/commercant/nouveaucodepin', 'App\Http\Controllers\AdminController@updateadminad')->name('updateadminad');

	Route::get('/admin/aide', 'App\Http\Controllers\AdminController@pageaidead')->name('pageaidead');
	Route::get('/admin/fianancement', 'App\Http\Controllers\AdminController@pagefinancementad')->name('pagefinancementad');
	Route::get('/admin/versement', 'App\Http\Controllers\AdminController@pageversementad')->name('pageversementad');
	Route::get('/admin/commande', 'App\Http\Controllers\AdminController@pagecommandead')->name('pagecommandead');

	route::get('/admin/client/{client}','App\Http\Controllers\adminController@editclient')->name('editclient'); 
	Route::delete('/admin/client/{suppclient}','App\Http\Controllers\adminController@supprimerclient')->name('supprimerclient');
	Route::put('/admin/client/{userclient}','App\Http\Controllers\adminController@updateclient')->name('updateclient');
	
	route::get('/admin/partenaire/{partenaire}','App\Http\Controllers\adminController@editpartenaire')->name('editpartenaire'); 
	Route::delete('/admin/partenaire/{supppartenaire}','App\Http\Controllers\adminController@supprimerpartenaire')->name('supprimerpartenaire');
	Route::put('/admin/partenaire/{userpartenaire}','App\Http\Controllers\adminController@updatepartenaire')->name('updatepartenaire');
	
	route::get('/admin/commercant/{commercant}','App\Http\Controllers\adminController@editcommercant')->name('editcommercant'); 
	Route::delete('/admin/commercant/{suppcommercant}','App\Http\Controllers\adminController@ssupprimercommercant')->name('supprimercommercant');
	Route::put('/admin/commercant/{usercommercant}','App\Http\Controllers\adminController@supdatecommercant')->name('updatecommercant'); 

	
	Route::get('/admin/categorie', 'App\Http\Controllers\adminController@pagecategoriead')->name('pagecategoriead');
	route::get('/admin/creercategorie','App\Http\Controllers\adminController@creercategoriead')->name("creercategoriead"); 
	route::post('/admin/creationcategorie','App\Http\Controllers\adminController@creationcategoriead')->name("creationcategoriead"); 

	route::get('/admin/categorie/{categorie}','App\Http\Controllers\adminController@editcategorie')->name('editcategorie'); 
	Route::delete('/admin/categorie/{suppcategorie}','App\Http\Controllers\adminController@supprimercategorie')->name('supprimercategorie');
	Route::put('/admin/categorie/{categorie}','App\Http\Controllers\adminController@updatecategorie')->name('updatecategorie');

	Route::put('/admin/commercantactive/{activercommercant}','App\Http\Controllers\adminController@activercommercant')->name('activercommercant'); 
	Route::put('/admin/desactivecommercant/{desactivecommercant}','App\Http\Controllers\adminController@desactivecommercant')->name('desactivecommercant');
	Route::put('/admin/partenaireactive/{activerpartenaire}','App\Http\Controllers\adminController@activerpartenaire')->name('activerpartenaire'); 
	Route::put('/admin/desactivepartenaire/{desactivepartenaire}','App\Http\Controllers\adminController@desactivepartenaire')->name('desactivepartenaire'); 
	Route::put('/admin/clientactive/{activerclient}','App\Http\Controllers\adminController@activerclient')->name('activerclient'); 
	Route::put('/admin/desactiveclient/{desactiveclient}','App\Http\Controllers\adminController@desactiveclient')->name('desactiveclient'); 

});


require __DIR__.'/auth.php';