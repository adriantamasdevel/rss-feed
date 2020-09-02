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
Route::redirect('/', '/dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard/feed/{id}/{name?}', 'DashboardController@showFeed')->name('dashboard.feed');
    Route::get('feeds', 'FeedsController@index')->name('feeds');
    Route::get('feeds/add', 'FeedsController@create')->name('feeds.add');
    Route::post('feeds/add', 'FeedsController@store')->name('feeds.add.post');
    Route::get('feeds/edit/{id}', 'FeedsController@edit')->name('feeds.edit');
    Route::post('feeds/edit/{id}', 'FeedsController@update')->name('feeds.edit.post');
    Route::delete('feeds/delete/{id}', 'FeedsController@destroy')->name('feeds.delete');
});
// Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
// Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

