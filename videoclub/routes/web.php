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

//

/*Route::get('/hola/{nom}', function ($nom) {
    return "Hola {$nom}";
});*/


Auth::routes();
Route::get('/', 'HomeController@getHome');
Route::group(['middleware' => 'auth'], function() {

Route::get('/catalog', 'CatalogController@getIndex');
Route::get('/catalog/show/{id}', 'CatalogController@getShow');
Route::post('/catalog/create','CatalogController@postCreate');
Route::put('/catalog/edit/{id}', 'CatalogController@putEdit');
Route::get('/catalog/create', 'CatalogController@getCreate');
Route::get('/catalog/edit/{id}', 'CatalogController@getEdit');
Route::put('/catalog/rent/{id}', 'CatalogController@putRent');
Route::put('/catalog/return/{id}', 'CatalogController@putReturn');
Route::delete('/catalog/delete/{id}', 'CatalogController@deleteMovie');


});
/*Route::get('/inici', function () {
    return view('inici', ['nom' => 'Arnau']);
});

Route::get('/login', function () {
    return view('/auth.login');
});

Route::get('/logout', function () {
    return view('/auth.logout');
});

Route::get('/catalog', function () {
    return view('/catalog.index');
});

Route::get('/catalog/show/{id}', function ($id) {
    return view('/catalog.show', ['id' => $id]);
});

Route::get('/catalog/create', function () {
    return view('/catalog.create');
});

Route::get('/catalog/edit/{id}', function ($id) {
    return view('/catalog.edit', ['id' => $id]);
});*/

