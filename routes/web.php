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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',
    [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => "App\Http\Controllers"], function() {

        Route::get("/dossiers/{id}/factures/","FactureController@getAll");

        Route::post("/factures","FactureController@addFacture");

        Route::put("/factures/{id}","FactureController@updateFacture");

        Route::delete("/factures/{id}","FactureController@deleteFacture");

    });

    Route::view('dashboard/dossiers', 'dossiers');


});
