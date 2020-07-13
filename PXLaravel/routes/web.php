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
})->name('index');

Route::get('/book/{id}/detail', 'BookController@bookDetail')->name('book.detail');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/contact', 'ContactController@index')->name('contact.index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/profile', 'UserController@profile')->name('profile');
    });
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'backend'], function () {
    Route::group(['middleware' => 'AuthAdmin'], function () {
        Route::get('/', function ()    {
            return view('backend.home');            
        })->name('backend.home');
        Route::get('/books', 'BookController@index')->name('backend.book.index');
        Route::get('/blogs', 'BlogController@index')->name('backend.blog.index');
        Route::get('/members', 'MemberController@index')->name('backend.member.index');
        Route::get('/setting', 'SettingController@index')->name('backend.setting.index');
        Route::get('/users', 'UsersController@index')->name('backend.users.index');
    });
    Route::get('/login', 'BackendController@login')->name('backend.login');
    Route::post('/login', 'BackendController@authenticate')->name('backend.authenticate');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
