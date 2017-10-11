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
use App\Models\Restaurant;

Route::get('/', function () {
    $restaurants = Restaurant::take(10)->get();
    //dd($restaurants);
    return view('home', compact('restaurants'));
});

//Route::get('/profile/test', 'ProfileController@test')->name('profil.test');

Route::resource('/restaurant', 'RestaurantController');
Route::resource('/users', 'UserController');

Auth::routes();

