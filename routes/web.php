<?php

use Illuminate\Support\Facades\Route;


Route::resource('msgs', 'msgsController');
Route::resource('mystudies', 'MystudyController');
Route::resource('contactinfos', 'ContactinfoController');


// Route::get('errordata/{error}', 'ProjectController@errordata');

// Route::resource('projects', 'ProjectController');
// Route::get('load',  'ProjectController@load');
Route::get('landingprojects', 'personalController@landingprojects')->name('landingprojects');;


Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('adminsite','msgsController');
Route::get('project/{id}','personalController@show');
Route::resource('/','personalController');

Route::resource('personalinfo','adminpersonalinfoController');
Route::get('errordata/{error}', 'adminpersonalinfoController@errordata');

Route::any('{slug}', 'personalController@index');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    // Messages
    Route::resource('messages', 'MessagesController');
    Route::get('loadmessages',  'MessagesController@load');

    // Project
    Route::resource('projects', 'ProjectController');
    Route::get('loadproject',  'ProjectController@load');
    //update product
    Route::post('projectsupdate/{project}',  'ProjectController@projectupdate')->name('project.projectupdate');

     //portfolio
     Route::get('portfolio', 'PortfolioController@index')->name('portfolio.index');
     Route::get('loadportfolio', 'PortfolioController@loadportfolio');
     Route::post('portfolio/{id}',  'PortfolioController@update')->name('portfolio.update');
     
});









