<?php

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

Route::get('/painting', 'PaintingController@index');
Route::get('/painting/show/{painting}', 'PaintingController@show');
Route::get('/painting/create', 'PaintingController@create');
Route::get('/collection', 'CollectionController@index');
Route::get('/collection/show/{collection}', 'CollectionController@show');
Route::get('/collection/create', 'CollectionController@create');

Route::post('/painting/store', 'PaintingController@store');
Route::post('/collection/store', 'CollectionController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
