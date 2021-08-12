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

/*
* Genere toutes les URL (CREATE READ UPDATE DELETE) pour gérer les films
*/
Route::resource('/movies/', '\App\Http\Controllers\MovieController');

/*
* Url qui permet d'afficher le detail d'un film
*/
Route::get('/movies/{movie}', '\App\Http\Controllers\MovieController@show');

Route::get('/', '\App\Http\Controllers\MovieController@index');

Route::get('/movies/{movie}/delete', 'App\Http\Controllers\MovieController@softdelete');
