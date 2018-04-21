<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/AcakKata', 'AcakKataController@index');

Route::post('/getJawaban', 'AcakKataController@getJawaban');
Route::get('/selectKata', 'AcakKataController@selectKata');

Route::get('/AcakKata/{id}', 'AcakKataController@show');


/*
Route::get('/AcakKata', function () {
    return view('AcakKata/home');
});
*/

/*
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog', 'BlogController@store');

Route::get('/blog/regis', 'BlogController@registrasi');
Route::post('/blog', 'BlogController@oper');

Route::get('/blog/{id}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');
Route::put('/blog/{id}', 'BlogController@update');

Route::delete('/blog/{id}', 'BlogController@destroy');
*/