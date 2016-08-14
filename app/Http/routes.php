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



Route::get('login', ['as' => 'loginPage', 'uses' => 'Auth\AuthController@showLogin']);
Route::post('postLogin', ['as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('getRegister', ['as' => 'registerPage', 'uses' => 'Auth\AuthController@showRegister']);
Route::post('postRegister', ['as' => 'postRegister', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@showDashboard');

    Route::get('showBooksPage', 'BookController@showAvailableBook');
    Route::get('getBooksByCate/{cateId}', 'BookController@getAvailableBook');
    Route::post('updateRentBook', 'BookController@updateRentBook');

    Route::get('profile/{id}', 'ProfileController@getUser');
    Route::post('profile/returnBooks', 'BookController@returnRentBook');
});

Route::group(['middleware' => ['auth', 'isroleadmin']], function () {
    Route::get('addBooks', 'BookController@showAddBooksPage');
    Route::post('saveNewBook', 'BookController@saveNewBook');
});

Route::get('hello', function () {
    echo "Hello";
});
Route::get('test', ['as' => 'test', 'uses' => 'Auth\AuthController@test']);
