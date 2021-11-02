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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registercommercant', function () {
    return view('auth.registercommercant');
});

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
	route::post("/client/verset",'App\Http\Controllers\ClientController@versement')->name("versement");

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
	
	route::get('/superadmin/partenaire/{spartenaire}','App\Http\Controllers\superadminController@seditpartenaire')->name('seditpartenaire'); 
	Route::delete('/superadmin/partenaire/{ssupppartenaire}','App\Http\Controllers\superadminController@ssupprimerpartenaire')->name('ssupprimerpartenaire');
	Route::put('/superadmin/partenaire/{suserpartenaire}','App\Http\Controllers\superadminController@supdatepartenaire')->name('supdatepartenaire');
	
	route::get('/superadmin/commercant/{scommercant}','App\Http\Controllers\superadminController@seditcommercant')->name('seditcommercant'); 
	Route::delete('/superadmin/commercant/{ssuppcommercant}','App\Http\Controllers\superadminController@ssupprimercommercant')->name('ssupprimercommercant');
	Route::put('/superadmin/commercant/{susercommercant}','App\Http\Controllers\superadminController@supdatecommercant')->name('supdatecommercant'); 
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

});

Route::get('test', 'App\Http\Controllers\superadminController@test')->middleware('role:admin,superadmin');


require __DIR__.'/auth.php';