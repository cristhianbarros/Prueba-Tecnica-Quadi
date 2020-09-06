<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'name',
        'email',
        'document',
        'payment',
        'car_id'
    ];
}
