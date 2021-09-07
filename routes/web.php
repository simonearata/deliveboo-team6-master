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
    return view('guest.home');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        // tutte le rotte admin (il CRUD)
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/restaurants', 'RestaurantController');
        Route::resource('/dishes', 'DishController');
    });

    Route::get('{any?}', function(){
        return view('guest.home');
    })->where('any','.*');