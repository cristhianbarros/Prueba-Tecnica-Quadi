<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year',
        'model',
        'color',
        'price',
        'license_plate'
    ];


    public function rents() {
        return $this->hasMany(Rent::class);
    }

}
