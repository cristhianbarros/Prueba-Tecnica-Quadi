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
    return redirect()->route('welcome.index');
});

Route::get('/rent', function () {
    return view('rent.form');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/all-cars', 'WelcomeController@all')->name('all-cars');
Route::resource('welcome', 'WelcomeController')->only(['index']);

Route::resource('cars.rents', 'CarRentController')->only(['create', 'store']);

Route::group(['middleware' => ['auth']], function () {
    Route::post('export', 'RentExcelController@export');

    Route::resource('cars', 'CarController');
    Route::resource('rents', 'RentController')->only(['index']);
});



