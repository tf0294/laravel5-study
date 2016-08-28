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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController@index');
    Route::post('/', 'IndexController@index');

    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');

    Route::get('logout', 'LogoutController@index');

    /**
     * 管理ユーザ
     */
    Route::group(['prefix' => 'user'], function() {
        Route::get('regist', 'UserController@regist');
        Route::post('complate', 'UserController@complate');
        Route::get('delete/{id}', 'UserController@delete');
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('edit_complate', 'UserController@edit_complate');
        Route::get('/', 'UserController@index');
        Route::post('/', 'UserController@index');
    });

    /**
     * 画像管理
     */
    Route::group(['prefix' => 'image'], function() {
        Route::get('/', 'ImageController@index');
        Route::post('/', 'ImageController@index');
        Route::get('regist', 'ImageController@regist');
        Route::post('complate', 'ImageController@complate');
        Route::get('edit/{id}', 'ImageController@edit');
        Route::post('edit_complate', 'ImageController@edit_complate');
        Route::get('delete/{id}', 'ImageController@delete');
    });

});
