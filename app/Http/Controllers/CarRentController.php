<?php

namespace App\Http\Controllers;

use App\Car;
use App\Rent;
use Illuminate\Http\Request;

class CarRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function index(Car $car)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function create(Car $car)
    {
        return view('rent.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Car $car)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car, Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car, Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car, Rent $rent)
    {
        //
    }
}
