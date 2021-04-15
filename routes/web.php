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
    return view('home');
});

Route::get('/a-propos', function (){
    $name = 'Happy';
    
    return view('about', [
        'name' => $name,
        'bibis' => [1, 2, 3, 4],
    ]);
});

Route::get('/hello/{name}', function ($name){
    return "<h1> Hello $name </h1>";
});