<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');

// Route::get('/profile','ProfileController@showProfile');
// Route::get('/profile/edit','ProfileController@editProfile');

Route::group(['prefix' => 'profile'], function() {
    Route::get('/', 'ProfileController@showProfile');
    Route::get('/edit','ProfileController@editProfile');
    Route::post('/edit','ProfileController@editProfile');
});

// Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
//     Route::get('/', 'AdminController@index');
//     Route::get('/manage', ['middleware' => ['permission:manage-sites'], 'uses' => 'AdminController@manageSites']);
//     Route::get('/edit',   ['middleware' => ['permission:manage-user'],  'uses' => 'AdminController@manageUser']);
// });

Route::group(['prefix' => 'company', 'middleware' => ['role:company']], function() {
    Route::get('/', 'CompanyController@index');
    Route::post('/', 'CompanyController@manageTeam');
    Route::get('/delete/{id}','CompanyController@deleteTeam');
    Route::post('/edit/{id}','CompanyController@editTeam');
    Route::get('/add/{id}', ['middleware' => ['permission:manage-member'], 'uses' => 'CompanyController@getMemberRegistration']);
    Route::post('/add/{id}', ['middleware' => ['permission:manage-member'], 'uses' => 'CompanyController@addMember']);
    Route::get('/edit/member/{id}',   ['middleware' => ['permission:manage-member'], 'uses' => 'CompanyController@editMember']);
    Route::post('/update/member/{id}',   ['middleware' => ['permission:manage-member'], 'uses' => 'CompanyController@updateMember']);
});

