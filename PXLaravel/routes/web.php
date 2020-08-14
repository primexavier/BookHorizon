<?php

use Illuminate\Support\Facades\Route;
use App\Model\Book;
use App\Model\Blog;
use App\Model\User;
use App\Model\Genre;
use App\Model\Transaction;
use App\Model\Author;

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
Route::get('/book/{id}/detail', 'FrontEndController@bookDetail')->name('book.detail');
Route::get('/blog', 'FrontEndController@blogIndex')->name('blog.index');
Route::get('/blog/{id}/detail', 'FrontEndController@blogDetail')->name('blog.detail');
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::get('/checkout', 'FrontEndController@checkout')->name('checkout');
Route::get('/addChart', 'FrontEndController@addChart')->name('add.chart');
Route::post('/addChart', 'FrontEndController@addChart')->name('add.chart');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/profile', 'MemberController@profile')->name('profile');
    });
    Route::get('/wishlist', 'HomeController@wishlist')->name('wishlist');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'backend'], function () {
    Route::group(['middleware' => 'AuthAdmin'], function () {
        Route::get('/', function ()    {
            return view('backend.home');            
        })->name('backend.home');
        Route::group(['prefix' => 'books'], function () {
            Route::get('/', 'BookController@index')->name('backend.book.index');
            Route::get('/create', 'BookController@create')->name('backend.book.create');
            Route::post('/create', 'BookController@store')->name('backend.book.store');
            Route::get('/update/{book}', 'BookController@edit')->name('backend.book.edit');
            Route::post('/update/{book}', 'BookController@update')->name('backend.book.update');
            Route::get('/detail/{book}', 'BookController@show')->name('backend.book.detail');
            Route::post('/delete/{book}', 'BookController@delete')->name('backend.book.delete');
            Route::post('/import', 'BookController@importExcel')->name('backend.book.import');
            Route::get('/import', 'BookController@importExcel')->name('backend.book.import');
        });
        Route::group(['prefix' => 'blogs'], function () {
            Route::get('/', 'BlogController@index')->name('backend.blog.index');
            Route::get('/create', 'BlogController@create')->name('backend.blog.create');
            Route::post('/create', 'BlogController@store')->name('backend.blog.store');
            Route::get('/update/{blog}', 'BlogController@edit')->name('backend.blog.edit');
            Route::post('/update/{blog}', 'BlogController@update')->name('backend.blog.update');
            Route::get('/detail/{blog}', 'BlogController@show')->name('backend.blog.detail');
            Route::post('/delete/{blog}', 'BlogController@delete')->name('backend.blog.delete');
        });
        Route::group(['prefix' => 'members'], function () {
            Route::get('/', 'MemberController@index')->name('backend.member.index');
            Route::get('/create', 'MemberController@create')->name('backend.member.create');
            Route::post('/create', 'MemberController@store')->name('backend.member.store');
            Route::get('/update/{user}', 'MemberController@edit')->name('backend.member.edit');
            Route::post('/update/{user}', 'MemberController@update')->name('backend.member.update');
            Route::get('/detail/{user}', 'MemberController@show')->name('backend.member.detail');
            Route::post('/delete/{user}', 'MemberController@delete')->name('backend.member.delete');
        });
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@index')->name('backend.users.index');
            Route::get('/create', 'UsersController@create')->name('backend.users.create');
            Route::post('/create', 'UsersController@store')->name('backend.users.store');
            Route::get('/update/{user}', 'UsersController@edit')->name('backend.users.edit');
            Route::post('/update/{user}', 'UsersController@update')->name('backend.users.update');
            Route::get('/detail/{user}', 'UsersController@show')->name('backend.users.detail');
            Route::post('/delete/{user}', 'UsersController@destroy')->name('backend.users.delete');
        });
        Route::group(['prefix' => 'transactions'], function () {
            Route::get('/', 'TransactionsController@index')->name('backend.transactions.index');
            Route::get('/create', 'TransactionsController@index')->name('backend.transactions.create');
            Route::post('/create', 'TransactionsController@store')->name('backend.transactions.store');
            Route::get('/update/{transaction}', 'TransactionsController@edit')->name('backend.transactions.edit');
            Route::post('/update/{transaction}', 'TransactionsController@update')->name('backend.transactions.update');
            Route::get('/detail/{transaction}', 'TransactionsController@show')->name('backend.transactions.detail');
            Route::post('/delete/{transaction}', 'TransactionsController@destroy')->name('backend.transactions.delete');
        });
        Route::group(['prefix' => 'genre'], function () {
            Route::get('/', 'GenreController@index')->name('backend.genre.index');
            Route::get('/create', 'GenreController@create')->name('backend.genre.create');
            Route::post('/create', 'GenreController@store')->name('backend.genre.store');
            Route::get('/update/{genre}', 'GenreController@edit')->name('backend.genre.edit');
            Route::post('/update/{genre}', 'GenreController@update')->name('backend.genre.update');
            Route::get('/detail/{genre}', 'GenreController@show')->name('backend.genre.detail');
            Route::post('/delete/{genre}', 'GenreController@destroy')->name('backend.genre.delete');
        });
        Route::group(['prefix' => 'author'], function () {
            Route::get('/', 'AuthorController@index')->name('backend.author.index');
            Route::get('/create', 'AuthorController@create')->name('backend.author.create');
            Route::post('/create', 'AuthorController@store')->name('backend.author.store');
            Route::get('/update/{author}', 'AuthorController@edit')->name('backend.author.edit');
            Route::post('/update/{author}', 'AuthorController@update')->name('backend.author.update');
            Route::get('/detail/{author}', 'AuthorController@show')->name('backend.author.detail');
            Route::post('/delete/{author}', 'AuthorController@destroy')->name('backend.author.delete');
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/', 'SettingController@index')->name('backend.setting.index');
            Route::post('/update', 'BookController@update')->name('backend.setting.update');
        });
    });
    Route::get('/login', 'BackendController@login')->name('backend.login');
    Route::post('/login', 'BackendController@authenticate')->name('backend.authenticate');
});

Auth::routes();
