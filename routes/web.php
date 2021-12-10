<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\ClientController;
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

Route::get(__DIR__.'/', function () {
    return view('welcome');
});

Route::get(__DIR__.'/registercommercant', function () {
    return view('auth.registercommercant');
});

Route::get(__DIR__.'/pversement')->name('pversement');


Route::group(['middleware'=>['auth']], function()
{
	Route::get(__DIR__.'/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});
Route::group(['middleware'=>['auth', 'role:client']], function()
{
	Route::get(__DIR__.'/client/listeversements', 'App\Http\Controllers\ClientController@listeversement')->name('listeversement');
	Route::get(__DIR__.'/client/demandefinancement', 'App\Http\Controllers\ClientController@demandefinancement')->name('demandefinancement');
	Route::get(__DIR__.'/client/effectuerversements', 'App\Http\Controllers\ClientController@effectuerversement')->name('effectuerversement');
	Route::get(__DIR__.'/client/mescommandes', 'App\Http\Controllers\ClientController@mescommandes')->name('mescommandes');
	Route::get(__DIR__.'/client/modifiermotdepasse', 'App\Http\Controllers\ClientController@modifiermdp')->name('modifiermdp');
	Route::post('/client/modifiermotdepasse', 'App\Http\Controllers\ClientController@updatemdp')->name('updatemdp');
	route::post('/client/demandefinancements','App\Http\Controllers\ClientController@creerfinancement')->name("creerfinancement"); 
	route::post('/client/aide','App\Http\Controllers\ClientController@formaideclient')->name("formaideclient"); 
	route::get(__DIR__.'/client/aide','App\Http\Controllers\ClientController@aide')->name("aideclient"); 
	route::get(__DIR__.'/client/facturepayement','App\Http\Controllers\ClientController@facturepayement')->name("facturepayement"); 
	route::post("/client/verset",'App\Http\Controllers\ClientController@versement')->name("versement");

	route::get(__DIR__.'/client/partenaire','App\Http\Controllers\ClientController@listepartenaire')->name('listepartenaire'); 
});

Route::group(['middleware'=>['auth', 'role:commercant']], function()
{
	Route::get(__DIR__.'/commercant/enregistrercommande', 'App\Http\Controllers\CommercantController@enregistrercommande')->name('enregistrercommande');
	Route::get(__DIR__.'/commercant/aide', 'App\Http\Controllers\CommercantController@aide')->name('aide');
	route::post('/commercant/enregistrercommandes','App\Http\Controllers\CommercantController@creercommande')->name("creercommande"); 
	route::post('/commercant/aides','App\Http\Controllers\CommercantController@formaide')->name("formaide"); 
	route::get(__DIR__.'/commercant/listedescommande','App\Http\Controllers\CommercantController@listecommande')->name("listecommande"); 
	Route::get(__DIR__.'/commercant/modifiermotpasse', 'App\Http\Controllers\CommercantController@modifiermdpc')->name('modifiermdpc');
	Route::post('/commercant/modifiermotpasse', 'App\Http\Controllers\CommercantController@updatemdpc')->name('updatemdpc');

	Route::get(__DIR__.'/commercant/listeproduit', 'App\Http\Controllers\CommercantController@listeproduit')->name('listeproduit');
	Route::post('/commercant/ajoutproduit', 'App\Http\Controllers\CommercantController@ajoutproduit')->name('ajoutproduit');

});

Route::group(['middleware'=>['auth', 'role:superadmin']], function()
{
	Route::get(__DIR__.'/superadmin/admin', 'App\Http\Controllers\superadminController@pageadmin')->name('pageadmin');
	route::get(__DIR__.'/superadmin/creeradmin','App\Http\Controllers\superadminController@creeradmin')->name("creeradmin"); 
	route::post('/superadmin/creationadmin','App\Http\Controllers\superadminController@creationadmin')->name("creationadmin"); 

	Route::get(__DIR__.'/superadmin/client', 'App\Http\Controllers\superadminController@pageclient')->name('pageclient');
	route::get(__DIR__.'/superadmin/creerclient','App\Http\Controllers\superadminController@creerclient')->name("creerclient"); 
	route::post('/superadmin/creationclient','App\Http\Controllers\superadminController@creationclient')->name("creationclient"); 

	Route::get(__DIR__.'/superadmin/partenaire', 'App\Http\Controllers\superadminController@pagepartenaire')->name('pagepartenaire');
	route::get(__DIR__.'/superadmin/creerpartenaire','App\Http\Controllers\superadminController@creerpartenaire')->name("creerpartenaire"); 
	route::post('/superadmin/creationpartenaire','App\Http\Controllers\superadminController@creationpartenaire')->name("creationpartenaire");  

	Route::get(__DIR__.'/superadmin/commercant', 'App\Http\Controllers\superadminController@pagecommercant')->name('pagecommercant');
	route::get(__DIR__.'/superadmin/creercommercant','App\Http\Controllers\superadminController@creercommercant')->name("creercommercant"); 
	route::post('/superadmin/creationcommercant','App\Http\Controllers\superadminController@creationcommercant')->name("creationcommercant");  

	Route::get(__DIR__.'/superadmin/modifiercodepin', 'App\Http\Controllers\superadminController@modifiersuperadmin')->name('modifiersuperadmin');
	Route::post('/superadmin/nouveaucodepin', 'App\Http\Controllers\superadminController@updatesuperadmin')->name('updatesuperadmin');

	Route::get(__DIR__.'/superadmin/aide', 'App\Http\Controllers\superadminController@pageaide')->name('pageaide');
	Route::get(__DIR__.'/superadmin/fianancement', 'App\Http\Controllers\superadminController@pagefinancement')->name('pagefinancement');
	Route::get(__DIR__.'/superadmin/versement', 'App\Http\Controllers\superadminController@pageversement')->name('pageversement');
	Route::get(__DIR__.'/superadmin/commande', 'App\Http\Controllers\superadminController@pagecommande')->name('pagecommande');
	
	route::get(__DIR__.'/superadmin/admin/{admin}','App\Http\Controllers\superadminController@editadmin')->name('editadmin'); 
	Route::delete('/superadmin/admin/{suppadmin}','App\Http\Controllers\superadminController@supprimeradmin')->name('supprimeradmin');
	Route::put('/superadmin/admin/{useradmin}','App\Http\Controllers\superadminController@supdateadmin')->name('supdateadmin'); 

	route::get(__DIR__.'/superadmin/client/{sclient}','App\Http\Controllers\superadminController@seditclient')->name('seditclient'); 
	Route::delete('/superadmin/client/{ssuppclient}','App\Http\Controllers\superadminController@ssupprimerclient')->name('ssupprimerclient');
	Route::put('/superadmin/client/{suserclient}','App\Http\Controllers\superadminController@supdateclient')->name('supdateclient');

	Route::get(__DIR__.'/superadmin/categorie', 'App\Http\Controllers\superadminController@pagecategorie')->name('pagecategorie');
	route::get(__DIR__.'/superadmin/creercategorie','App\Http\Controllers\superadminController@creercategorie')->name("creercategorie"); 
	route::post('/superadmin/creationcategorie','App\Http\Controllers\superadminController@creationcategorie')->name("creationcategorie"); 

	route::get(__DIR__.'/superadmin/categorie/{scategorie}','App\Http\Controllers\superadminController@seditcategorie')->name('seditcategorie'); 
	Route::delete('/superadmin/categorie/{ssuppcategorie}','App\Http\Controllers\superadminController@ssupprimercategorie')->name('ssupprimercategorie');
	Route::put('/superadmin/categorie/{scategorie}','App\Http\Controllers\superadminController@supdatecategorie')->name('supdatecategorie');
	
	route::get(__DIR__.'/superadmin/partenaire/{spartenaire}','App\Http\Controllers\superadminController@seditpartenaire')->name('seditpartenaire'); 
	Route::delete('/superadmin/partenaire/{ssupppartenaire}','App\Http\Controllers\superadminController@ssupprimerpartenaire')->name('ssupprimerpartenaire');
	Route::put('/superadmin/partenaire/{suserpartenaire}','App\Http\Controllers\superadminController@supdatepartenaire')->name('supdatepartenaire');
	
	route::get(__DIR__.'/superadmin/commercant/{scommercant}','App\Http\Controllers\superadminController@seditcommercant')->name('seditcommercant'); 
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
	Route::get(__DIR__.'/admin/client', 'App\Http\Controllers\AdminController@pageclientad')->name('pageclientad');
	route::get(__DIR__.'/admin/creerclient','App\Http\Controllers\AdminController@creerclientad')->name("creerclientad"); 
	route::post('/admin/creationclient','App\Http\Controllers\AdminController@creationclientad')->name("creationclientad"); 

	Route::get(__DIR__.'/admin/partenaire', 'App\Http\Controllers\AdminController@pagepartenairead')->name('pagepartenairead');
	route::get(__DIR__.'/admin/creerpartenaire','App\Http\Controllers\AdminController@creerpartenairead')->name("creerpartenairead"); 
	route::post('/admin/creationpartenaire','App\Http\Controllers\AdminController@creationpartenairead')->name("creationpartenairead");  

	Route::get(__DIR__.'/admin/commercant', 'App\Http\Controllers\AdminController@pagecommercantad')->name('pagecommercantad');
	route::get(__DIR__.'/admin/creercommercant','App\Http\Controllers\AdminController@creercommercantad')->name("creercommercantad"); 
	route::post('/admin/creationcommercant','App\Http\Controllers\AdminController@creationcommercantad')->name("creationcommercantad");  

	Route::get(__DIR__.'/admin/modifiercodepin', 'App\Http\Controllers\AdminController@modifieradminad')->name('modifieradminad');
	Route::post('/commercant/nouveaucodepin', 'App\Http\Controllers\AdminController@updateadminad')->name('updateadminad');

	Route::get(__DIR__.'/admin/aide', 'App\Http\Controllers\AdminController@pageaidead')->name('pageaidead');
	Route::get(__DIR__.'/admin/fianancement', 'App\Http\Controllers\AdminController@pagefinancementad')->name('pagefinancementad');
	Route::get(__DIR__.'/admin/versement', 'App\Http\Controllers\AdminController@pageversementad')->name('pageversementad');
	Route::get(__DIR__.'/admin/commande', 'App\Http\Controllers\AdminController@pagecommandead')->name('pagecommandead');

	route::get(__DIR__.'/admin/client/{client}','App\Http\Controllers\adminController@editclient')->name('editclient'); 
	Route::delete('/admin/client/{suppclient}','App\Http\Controllers\adminController@supprimerclient')->name('supprimerclient');
	Route::put('/admin/client/{userclient}','App\Http\Controllers\adminController@updateclient')->name('updateclient');
	
	route::get(__DIR__.'/admin/partenaire/{partenaire}','App\Http\Controllers\adminController@editpartenaire')->name('editpartenaire'); 
	Route::delete('/admin/partenaire/{supppartenaire}','App\Http\Controllers\adminController@supprimerpartenaire')->name('supprimerpartenaire');
	Route::put('/admin/partenaire/{userpartenaire}','App\Http\Controllers\adminController@updatepartenaire')->name('updatepartenaire');
	
	route::get(__DIR__.'/admin/commercant/{commercant}','App\Http\Controllers\adminController@editcommercant')->name('editcommercant'); 
	Route::delete('/admin/commercant/{suppcommercant}','App\Http\Controllers\adminController@ssupprimercommercant')->name('supprimercommercant');
	Route::put('/admin/commercant/{usercommercant}','App\Http\Controllers\adminController@supdatecommercant')->name('updatecommercant'); 

	
	Route::get(__DIR__.'/admin/categorie', 'App\Http\Controllers\adminController@pagecategoriead')->name('pagecategoriead');
	route::get(__DIR__.'/admin/creercategorie','App\Http\Controllers\adminController@creercategoriead')->name("creercategoriead"); 
	route::post('/admin/creationcategorie','App\Http\Controllers\adminController@creationcategoriead')->name("creationcategoriead"); 

	route::get(__DIR__.'/admin/categorie/{categorie}','App\Http\Controllers\adminController@editcategorie')->name('editcategorie'); 
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