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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



Route::resource('adminsite','msgsController');
Route::get('/home', 'msgsController@index');
Route::resource('/','personalController');

Route::resource('adminsite/personalInfo','personalController');
Route::resource('adminsite/projects/all','ProjectController');







