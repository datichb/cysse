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

Route::get('/mark', function () {
    return view('mark');
});

Route::get('/artiste', function () {
    return view('artiste');
});

Route::get('/painting', 'PaintingController@index');
Route::get('/painting/show/{painting}', 'PaintingController@show');
Route::get('/painting/freepainting', 'PaintingController@getFree');

Route::get('/painting/create', 'PaintingController@create')
    ->middleware('is_admin')
    ->name('admin');
Route::get('/painting/modify', 'PaintingController@modify')
    ->middleware('is_admin')
    ->name('admin');

Route::get('/collection/getall', 'CollectionController@getAll');
Route::get('/collection', 'CollectionController@index');
Route::get('/collection/show/{collection}', 'CollectionController@show');
Route::get('/collection/create', 'CollectionController@create')
    ->middleware('is_admin')
    ->name('admin');




Route::post('/painting/store', 'PaintingController@store')
    ->middleware('is_admin')
    ->name('admin');
Route::post('/painting/buy', 'PaintingController@buy');

Route::post('/collection/addpainting', 'CollectionController@addpainting')
    ->middleware('is_admin')
    ->name('admin');
Route::post('/collection/store', 'CollectionController@store')
    ->middleware('is_admin')
    ->name('admin');
Route::post('/collection/deletepainting', 'CollectionController@deletepainting')
    ->middleware('is_admin')
    ->name('admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

