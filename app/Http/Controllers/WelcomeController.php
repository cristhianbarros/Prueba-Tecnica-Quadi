<?php

namespace App\Http\Controllers;

use App\Car;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all()->random(3);

        return view('welcome', [ 'cars' => $cars ]);
    }

}
