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

//Route::apiResource('/movies/', '\App\Http\Controllers\MovieController');
Route::get('/movies/create', '\App\Http\Controllers\MovieController@create');
Route::get('/movies/edit/{movie}', '\App\Http\Controllers\MovieController@edit');
Route::get('/movies/{movie}', '\App\Http\Controllers\MovieController@show');
Route::get('/movies/{}', '\App\Http\Controllers\MovieController@show');
Route::put('/movies/{movie}', '\App\Http\Controllers\MovieController@update');
Route::delete('/movies/{movie}/delete', '\App\Http\Controllers\MovieController@destroy');
Route::get('/movies/{}/edit', '\App\Http\Controllers\MovieController@edit');
Route::post('/movies', '\App\Http\Controllers\MovieController@store');
Route::get('/', '\App\Http\Controllers\MovieController@index');

