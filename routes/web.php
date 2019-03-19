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

Route::get('/', "FileController@list");


Route::get('/file/list', "FileController@list");
Route::get('/file/detail/{id}', "FileController@detail");
Route::get('/file/add', "FileController@add");
Route::post('/file/upload', "FileController@upload");
