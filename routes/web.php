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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => "App\Http\Controllers"], function() {

        Route::get("/dossiers","DossierController@getAll");

        Route::get("/dossiers/{id}/bilan","BilanControllet@getBilan");

        Route::post("/dossiers","DossierController@addDossier");

        Route::put("/dossiers/{id}","DossierController@updateDossier");

        Route::delete("/dossiers/{id}","DossierController@deleteDossier");

        Route::get("/dossiers/{id}/factures/","FactureController@getAll");

        Route::post("/factures","FactureController@addFacture");

        Route::put("/factures/{id}","FactureController@updateFacture");

        Route::delete("/factures/{id}","FactureController@deleteFacture");

    });


});
