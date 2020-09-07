<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RentExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class RentExcelController extends Controller
{
    public function export()
    {

        $data = request()->validate([
         'start_date' => 'required|date',
         'end_date' => 'required|date|after:start_date',
        ], [
            'start_date.required' => 'El campo Fecha Salida es requerido.',
            'start_date.date' => 'El campo Fecha Salida no es una fecha válida.',
            'end_date.required' => 'El campo Fecha Regreso es requerido.',
            'end_date.date' => 'El campo Fecha Salida no es una fecha válida.',
            'end_date.after' => 'El campo Fecha Regreso debe ser una fecha después de Fecha Salida.',
         ]);

        $fecha1 = $data['start_date'];
        $fecha2 = $data['end_date'];

        $file = "report($fecha1-$fecha2).csv";

        return Excel::download(new RentExcelExport($fecha1, $fecha2), $file);
    }
}
