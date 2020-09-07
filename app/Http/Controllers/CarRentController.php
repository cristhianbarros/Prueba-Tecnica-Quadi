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
        return view('rent.form', [ 'car' => $car ]);
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
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'name' => 'required',
            'email' => 'required|email',
            'document' => 'required|numeric'
        ], [
           'start_date.required' => 'El campo Fecha Salida es requerido.',
           'start_date.date' => 'El campo Fecha Salida no es una fecha válida.',
           'end_date.required' => 'El campo Fecha Regreso es requerido.',
           'end_date.date' => 'El campo Fecha Salida no es una fecha válida.',
           'end_date.after' => 'El campo Fecha Regreso debe ser una fecha después de Fecha Salida.',
           'name.required' => 'El campo Nombres es requerido.',
           'email.required' => 'El campo Email es requerido.',
           'document.required' => 'El campo Documento es requerido.',
        ]);

        $data['payment'] = $request->input('payment');
        $data['car_id'] = $car->id;

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $rents = $car->rents;

        $errorMessage = "Lo sentimos, pero hay cohortes que coinciden con estas fechas ( $start_date a $end_date ), por favor verifica que no existan traslapos.";

        foreach ($rents as $rent) {
            if( ($start_date >= $rent->start_date && $start_date <= $rent->end_date) || ($end_date >= $rent->start_date && $end_date <= $rent->end_date)) {
                session()->flash('warning-message', $errorMessage);
                return redirect()->route('cars.rents.create', $car->id);
            }
        }

        $rentsStarDateCoincidence = Rent::where('car_id', '=', $car->id)->whereBetween('start_date', [ $start_date, $end_date])->get()->count();
        $rentsEndDateCoincidence = Rent::where('car:id', '=', $car->id)->whereBetween('end_date', [ $start_date, $end_date])->get()->count();

        if($rentsStarDateCoincidence || $rentsEndDateCoincidence) {
            session()->flash('warning-message', $errorMessage);
            return redirect()->route('cars.rents.create', $car->id);
        }

        Rent::create($data);

        session()->flash('status-rent', 'Los datos han sido guardados exitosamente!');
        return redirect()->route('cars.rents.create', $car->id);
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
