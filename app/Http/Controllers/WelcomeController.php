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
        $cars = Car::all()->count() > 0 ? Car::all()->random(3) : [];

        return view('welcome', [ 'cars' => $cars ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $cars = Car::all();

        return view('welcome', [ 'cars' => $cars ]);
    }
}
