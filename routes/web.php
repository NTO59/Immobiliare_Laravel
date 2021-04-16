<?php

use Illuminate\Http\Request;
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
Route::get('/nos-annonces', function () {
    /* ATTENTION use Illuminate\Support\Facades\DB */
    $properties = DB::select('SELECT * FROM properties WHERE sold = :sold', [
        'sold' => 0,
    ]);
    // Permet de ne plus écrire de SQL ...
    $properties = DB::table('properties')->where('sold', 0,)->where('sold', '=', 1, 'or')->get();



    return view('properties/index', [
        'properties' => $properties,
    ]);

});

// Voir une annonce
Route::get('/nos-annonces/{id}', function ($ids) {
    $annonces = DB::table('properties')->where('id', $ids)->get();

    if(! $annonces){
        abort(404); // On renvoie une 404 avec Laravel
    }

    return view('properties/show', [
        'annonces' => $annonces,
    ]);
})->whereNumber(('id')); // s'assure que le $id est seulement un nombre

Route::get('/nos-annonces/creer', function () {
    return view('properties/create');
});


// use Illuminate\Http\Request;
Route::post('/nos-annonces/creer', function ( Request $request) {
    // Traitement du formulaire

    $request->validate([
        'title' => 'required|string|unique:properties|min:2 max:255',
        'description' => 'required|string|min:15',
        'price' => 'required|integer|gt:0',
        
    ]);


    DB::table('properties')->insert([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'sold' => $request->filled('sold'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // autre solution ...
    // DB::table('properties')->insert(
    //     $request->all('title', 'description', 'price') +
    //     ['sold' => $request->filled('sold')]
    // );

    // On redirige et on met l'annonce dnaas la session
    return redirect('/nos-annonces')->withInput();
});
