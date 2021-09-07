<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::namespace('Api')
   // ->name('api.')
    //->group(function(){
      //  Route::get('categories','CategoryController@index')->name('categories');
        /* Route::get('categories/{category.name}','CategoryController@show')->name('show'); */
    //});


Route::namespace('Api')
    ->group(function(){
        Route::get('categories', 'CategoryController@index')->name('api.categories');
        Route::get('restaurants', 'RestaurantController@index')->name('api.restaurants');
        Route::get('restaurants/{slug}', 'RestaurantController@show')->name('api.restaurants.show');
        Route::get('dishes', 'DishController@index')->name('api.dishes');
        Route::get('types', 'TypeController@index')->name('api.types');
        Route::post('payments', 'EmailController@store')->name('api.payments');
    });