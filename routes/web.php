<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendrierController;

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
})->name('home');

Route::resource('contact', \App\Http\Controllers\ContactController::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',
    [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard/chat', [\App\Http\Controllers\ChatsController::class, 'index'])->name("chat");
    Route::get('/dashboard/calendrier', [CalendrierController::class, 'index'])->name('calendrier');
    Route::post('/dashboard/calendrier/action', [CalendrierController::class, 'action'])->name('calendrier.store');
    Route::get('messages', [\App\Http\Controllers\ChatsController::class, 'fetchMessages']);
    Route::post('messages', [\App\Http\Controllers\ChatsController::class, 'sendMessage']);
    Route::view('dashboard/dossiers', 'dossiers');
    Route::view('dashboard/factures', 'factures');
    Route::get('dashboard/{id}/bilan', '\App\Http\Controllers\bilanControllet@getAll')->name("bilan");
    Route::view('dashboard/dossiers', 'dossiers')->name("dossiers");
    Route::view('dashboard/factures', 'factures')->name("factures");
    Route::view('dashboard/utilisateurs', 'utilisateurs')->name("utilisateurs")->middleware('expert.comptable');
    Route::get('dashboard/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name("contacts")->middleware('expert.comptable');
    Route::post('dashboard/contacts/sendMail', [\App\Http\Controllers\ContactController::class, 'sendMail'])->name("sendMail")->middleware('expert.comptable');
});

