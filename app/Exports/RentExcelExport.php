<?php

namespace App\Exports;

use App\Rent;
use Maatwebsite\Excel\Concerns\FromCollection;

class RentExcelExport implements FromCollection
{

    public function __construct(string $fecha1, string $fecha2)
    {
        $this->fecha1 = $fecha1;
        $this->fecha2 = $fecha2;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rent::join('cars', 'cars.id', '=', 'rents.car_id')
                    ->whereBetween('start_date', [$this->fecha1, $this->fecha2])
                    ->orWhereBetween('end_date', [$this->fecha1, $this->fecha2])
                    ->select('rents.id','rents.start_date', 'rents.end_date', 'cars.license_plate', 'rents.name', 'rents.payment', 'cars.price')
                    ->get();
    }
}
