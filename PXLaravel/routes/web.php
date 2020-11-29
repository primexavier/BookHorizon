<?php

use Illuminate\Support\Facades\Route;
use App\Model\Book;
use App\Model\Blog;
use App\Model\User;
use App\Model\Genre;
use App\Model\Transaction;
use App\Model\Author;
use App\Model\Currency;
use App\Model\Bank;
use App\Model\Category;
use App\Model\Supplier;
use App\Model\Stock;
use App\Model\Membership;
use App\Model\Promotion;
use App\Model\PaymentMethod;

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
Route::get('/about', 'ContactController@aboutUs')->name('about.index');
Route::get('/store', 'ContactController@storeIndex')->name('store.index');

Route::get('/chart', 'FrontEndController@chart')->name('chart');
Route::get('/wishlist', 'FrontEndController@wishlist')->name('wishlist');
Route::get('/addChart/{id}', 'FrontEndController@addChart')->name('add.chart');
Route::get('/addWishlist/{id}', 'FrontEndController@addWishlist')->name('add.wishlist');
Route::get('/bookModal/{book}', 'FrontEndController@bookModal')->name('book.modal');

Route::get('/payment-method/{paymentmethod}', 'FrontEndController@paymentMethodList')->name('payment-method.list');

Route::post('/addChart/{id}', 'FrontEndController@addChart')->name('add.chart');
Route::post('/addWishlist/{id}', 'FrontEndController@addWishlist')->name('add.wishlist');
Route::post('/add-comment/{id}', 'FrontEndController@addComment')->name('add.comment');

Route::get('/getprovince/{id}', 'FrontEndController@getProvince')->name('province.list');
Route::get('/getcity/{provinceId}/{cityId}', 'FrontEndController@getCity')->name('city.detail');
Route::get('/getcity/{provinceId}', 'FrontEndController@getCity')->name('city.list');
Route::get('/searchBook', 'FrontEndController@searchBook')->name('book.search');
Route::get('/getCost/{courier}/{city_id}/{weight}', 'MemberController@getShippingCost')->name('cost.shipping');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/profile', 'MemberController@profile')->name('profile');
        Route::get('/editprofile', 'MemberController@editProfile')->name('profile.edit');
        Route::get('/editprofile/{fromMembership}', 'MemberController@editProfileMembership')->name('profile.edit.membership');
        Route::get('/orders', 'MemberController@orderList')->name('order.list');
        Route::get('/download', 'MemberController@downloadList')->name('download.list');
        Route::get('/bill', 'MemberController@billList')->name('bill.list');
        Route::get('/payment-method', 'MemberController@paymentMethod')->name('payment.method');
        Route::get('/payment', 'MemberController@paymentList')->name('payment.list');
        Route::get('/address', 'MemberController@addressList')->name('address.list');
        Route::get('/rented', 'MemberController@rentedList')->name('rented.list');
        Route::get('/privacy', 'MemberController@privacy')->name('privacy.setting');
        Route::get('/become-member/{user}', 'MemberController@becomeMember')->name('become.member');
        Route::get('/extend-member/{user}', 'MemberController@extendMember')->name('extend.member');
        Route::get('/chart-delete/{chart}', 'MemberController@deleteChart')->name('chart.delete');
        Route::get('/pay/bill/{bill}', 'MemberController@confirmBill')->name('confirm.bill');
        Route::get('/payment/view/{bill}', 'MemberController@paymentView')->name('payment.view');
        Route::get('/transaction/detail/{transaction}', 'MemberController@transactiondetail')->name('transaction.detail');
        Route::get('/checkout', 'MemberController@checkoutView')->name('checkout.view');
        Route::get('/checkout-member/{id}', 'MemberController@checkoutMembership')->name('checkout.membership');
        Route::post('/checkout', 'MemberController@checkout')->name('checkout');
        Route::post('/wishlist-chart', 'MemberController@wishlistChart')->name('wishlist.chart');
        Route::post('/editprofile', 'MemberController@updateProfile')->name('profile.update');
        Route::post('/pay/confirmation', 'MemberController@pay')->name('pay.confirmation');
        Route::post('/pay/membership', 'MemberController@paymembership')->name('pay.membership');
        Route::post('/pay/confirmation/{bill}', 'MemberController@uploadBill')->name('upload.bill');
        Route::post('/change-password', 'FrontEndController@changePassword')->name('profile.changePassword');
    });
    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();
