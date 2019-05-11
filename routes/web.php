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

Route::get('/', 'PersonController@index');

Route::get('/register', 'PersonController@register');

Route::get('/home', function () {
    return view('home');
});

Route::get('/inbox', function () {
    return view('inbox');
});

Route::get('/options', function () {
    return view('options');
});

Route::get('/postulation', function () {
    return view('postulation');
});

Route::get('/vacants', 'PersonController@vacants');
Route::get('/vacant/{id}', 'PersonController@vacant')->where(['id' => '[0-9-]+']);
Route::get('/postulations', 'VacantController@postulations');

Route::get('/curriculum-vitae', 'PersonController@create');
Route::post('/curriculum-vitae', 'PersonController@store');
Route::post('/postulate', 'VacantController@postulate');

Route::post('/login', 'PersonController@login');
Route::post('/register', 'PersonController@registerPerson');

Route::get('/logout', 'PersonController@logout');