<?php

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

/*
 * Route Home frontend
 */
Route::get('/', 'HomeController@index')->name('welcome');

Route::post('/reservation', 'ReservationController@reserve')->name('reservation.reserve');

/*
*Route dashboard
*/
Route::get('/admin/dashboard', function(){
   return view('admin.dashboard');
});

/**
 * Route::get('/login', function(){
return view('admin.signup');
});
 */
Auth::routes();

Route::group([
    'prefix'     => 'admin',
    'middleware' => 'auth',
    'namespace'  => 'Admin'
], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('slider', 'SliderController');
    Route::resource('category', 'CategoryController');
    Route::resource('item', 'ItemController');
});