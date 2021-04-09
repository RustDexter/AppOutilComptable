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
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',
    [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard/calendrier', [CalendrierController::class, 'index']);
    Route::post('/dashboard/calendrier/action', [CalendrierController::class, 'action']);
    Route::get('dashboard/chat', [\App\Http\Controllers\ChatsController::class, 'index']);
    Route::get('messages', [\App\Http\Controllers\ChatsController::class, 'fetchMessages']);
    Route::post('messages', [\App\Http\Controllers\ChatsController::class, 'sendMessage']);
    Route::view('dashboard/dossiers', 'dossiers');
    Route::view('dashboard/factures', 'factures');
});
