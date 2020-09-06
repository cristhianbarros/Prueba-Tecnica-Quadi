<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(10);

        return view('car.admin.list', [ 'cars' => $cars ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.admin.form', [ 'car' => null ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => 'required|numeric',
            'model' => 'required|numeric',
            'color' => 'required',
            'license_plate' => 'required',
            'price' => 'required|numeric'
        ], [
            'year.required' => 'El campo Año es requerido.',
            'year.numeric' => 'El campo Año debe ser un número.',
            'model.required' => 'El campo Modelo es requerido.',
            'year.numeric' => 'El campo Modelo debe ser un número.',
            'color.required' => 'El campo Color es requerido.',
            'license_plate.required' => 'El campo Placa es requerido.',
            'price.required' => 'El campo Precio x Día es requerido.',
            'price.numeric' => 'El campo Precio x Día debe ser un número.'
        ]);

        Car::create($data);

        return redirect()->route('cars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('car.admin.form', [ 'car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        if($request->has('year')) {
            $car->year = $request->input('year');
        }

        if($request->has('model')) {
            $car->model = $request->input('model');
        }

        if($request->has('color')) {
            $car->color = $request->input('color');
        }

        if($request->has('license_plate')) {
            $car->license_plate = $request->input('license_plate');
        }

        if($request->has('price')) {
            $car->price = $request->input('price');
        }

        if($car->isDirty()) {
            $car->save();
        }

        session()->flash('status-car', 'El carro ha sido editado exitosamente!');

        return view('car.admin.form', [ 'car' => $car]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
