<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/series', 'App\Http\Controllers\SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'App\Http\Controllers\SeriesController@create')->name('form_criar_senha');
Route::post('/series/criar', 'App\Http\Controllers\SeriesController@store');
Route::delete('/series/{id}', 'App\Http\Controllers\SeriesController@destroy');


