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

Route::get('/', 'Article\ArticleController@index');
Route::get('/article/{article}', 'Article\ArticleController@articleDetail');
Route::get('/category/{catname}','Article\ArticleController@catList');
Route::get('/archive/{time}','Article\ArticleController@archiveList');
Route::get('/search','Article\ArticleController@search');
