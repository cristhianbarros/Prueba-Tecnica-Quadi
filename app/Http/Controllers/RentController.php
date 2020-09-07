<?php

namespace App\Http\Controllers;

use App\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index() {

        $rents = Rent::join('cars', 'cars.id', '=', 'rents.car_id')->select('cars.*', 'rents.*')->get();

        return view('rent.admin.list', [ 'rents' => $rents ]);
    }
}
