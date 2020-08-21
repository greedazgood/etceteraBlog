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
Route::get('/list', 'Article\ArticleController@articleList');
Route::get('/detail', 'Article\ArticleController@articleDetail');
