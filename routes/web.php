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


Route::get('/' , 'Controller@show_main_page')->name('show_main_page');

Route::post('/save' , 'Controller@save_infos')->name('save');

Route::get('/results' , 'Controller@show_results')->name('show_results');

Route::get('/uvjeti' , 'Controller@show_disclaimer')->name('show_disclaimer');


Route::get('/search' , 'Controller@search')->name('search');

Route::get('/show/{name}' , 'Controller@show_second')->name('show_second_page');








Route::get('/api_get' , 'Controller@get_api')->name('get_api');

Route::get('/play' , 'Controller@play')->name('play');
