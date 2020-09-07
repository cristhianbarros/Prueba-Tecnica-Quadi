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

Route::get('/calculate', function() {

    $fecha1 = request()->f1;
    $fecha2 = request()->f2;
    $c = App\Car::findOrFail(request()->c);

    $days = 0;

    $f1 = date('Y-m-d', strtotime($fecha1));
    $f2 = date('Y-m-d', strtotime($fecha2));

    for( $i = $f1; $i <= $f2; $i = date("Y-m-d", strtotime( $i." +1 days" ))) {
        $days++;
    }

    $total = number_format(($c->price * $days), 0, ',', '.');
    echo "$total-$days";

})->name('api.calculate');
