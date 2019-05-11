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

Route::get('/home', 'PersonController@home');

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
//Studies
Route::get('/studies', 'PersonController@studies');
Route::get('/studies/create', function () {
    return view('studies-create');
});
Route::post('/studies/create', 'PersonController@studies_create');
Route::get('/studies/delete/{id}', 'PersonController@studies_delete')->where(['id' => '[0-9-]+']);
//Experiencies
Route::get('/experiencies', 'PersonController@experiencies');
Route::get('/experiencies/create', function () {
    return view('experiencies-create');
});
Route::post('/experiencies/create', 'PersonController@experiencies_create');
Route::get('/experiencies/delete/{id}', 'PersonController@experiencies_delete')->where(['id' => '[0-9-]+']);
//References
Route::get('/references', 'PersonController@references');
Route::get('/references/create', function () {
    return view('references-create');
});
Route::post('/references/create', 'PersonController@references_create');
Route::get('/references/delete/{id}', 'PersonController@references_delete')->where(['id' => '[0-9-]+']);

Route::get('/logout', 'PersonController@logout');