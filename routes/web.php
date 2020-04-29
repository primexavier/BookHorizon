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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/profile', 'UserController@profile')->name('profile');
    });
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'backend'], function () {
        Route::get('/', function ()    {
            return view('welcome');            
        });
        Route::get('books', function ()    {
            return view('welcome');            
        });
        Route::get('category', function ()    {
            return view('welcome');            
        });
    });
});