<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    return view('home');
});

Route::get('/a-propos', function () {
    $name = 'Happy';

    return view('about', [
        'name' => $name,
        'bibis' => [1, 2, 3, 4],
    ]);
});

Route::get('/hello/{name?}', function ($name = 'Happy') {
    return "<h1> Hello $name </h1>";
})->where('name', '.{2,}'); // Le nom doit faire 2 caractères minimum



// Afficher les annonces
Route::get('/nos-annonces', [PropertyController::class, 'index']);

// Voir une annonce
Route::get('/nos-annonces/{property}', [PropertyController::class, 'show'])->whereNumber(('property'));
Route::get('/nos-annonces/{id}', [PropertyController::class, 'show'])->whereNumber(('id')); // s'assure que le $id est seulement un nombre

// On affiche le formulaire
// use App\Http\Controllers\PropertyController;
Route::get('/nos-annonces/creer', [PropertyController::class, 'create']);


// use Illuminate\Http\Request;
Route::post('/nos-annonces/creer', [PropertyController::class, 'store']);

Route::get('/nos-annonces/editer/{id}', [PropertyController::class, 'edit']);

Route::put('/nos-annonces/editer/{id}', [PropertyController::class, 'update']);

Route::delete('/nos-annonces/{id}', [PropertyController::class, 'delete']);



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
