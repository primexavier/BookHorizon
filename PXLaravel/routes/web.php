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

Route::get('/', 'FrontEndController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/book/{id}/detail', 'FrontEndController@bookDetail')->name('book.detail');
Route::get('/blog', 'FrontEndController@blogIndex')->name('blog.index');
Route::get('/blog/{id}/detail', 'FrontEndController@blogDetail')->name('blog.detail');
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
        Route::group(['prefix' => 'books'], function () {
            Route::get('/', 'BookController@index')->name('backend.book.index');
            Route::get('/create', 'BookController@index')->name('backend.book.create');
            Route::get('/update/{id}', 'BookController@index')->name('backend.book.update');
            Route::post('/delete/{id}', 'BookController@index')->name('backend.book.delete');
            Route::post('/import', 'BookController@importExcel')->name('backend.book.import');
            Route::get('/import', 'BookController@importExcel')->name('backend.book.import');
        });
        Route::group(['prefix' => 'blogs'], function () {
            Route::get('/', 'BlogController@index')->name('backend.blog.index');
            Route::get('/create', 'BlogController@index')->name('backend.blogs.create');
            Route::get('/update/{id}', 'BlogController@index')->name('backend.blogs.update');
            Route::post('/delete/{id}', 'BlogController@index')->name('backend.blogs.delete');
        });
        Route::group(['prefix' => 'members'], function () {
            Route::get('/', 'MemberController@index')->name('backend.member.index');
            Route::get('/create', 'MemberController@index')->name('backend.member.create');
            Route::get('/update/{id}', 'MemberController@index')->name('backend.member.update');
            Route::post('/delete/{id}', 'MemberController@index')->name('backend.member.delete');
        });
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@index')->name('backend.users.index');
            Route::get('/create', 'UsersController@index')->name('backend.users.create');
            Route::get('/update/{id}', 'UsersController@index')->name('backend.users.update');
            Route::post('/delete/{id}', 'UsersController@index')->name('backend.users.delete');
        });
        Route::group(['prefix' => 'transactions'], function () {
            Route::get('/', 'TransactionsController@index')->name('backend.transactions.index');
            Route::get('/create', 'TransactionsController@index')->name('backend.transactions.create');
            Route::get('/update/{id}', 'TransactionsController@index')->name('backend.transactions.update');
            Route::post('/delete/{id}', 'TransactionsController@index')->name('backend.transactions.delete');
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/', 'SettingController@index')->name('backend.setting.index');
        });
    });
    Route::get('/login', 'BackendController@login')->name('backend.login');
    Route::post('/login', 'BackendController@authenticate')->name('backend.authenticate');
});

Auth::routes();
