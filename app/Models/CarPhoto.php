<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarPhoto extends Model
{
    protected $fillable = [
        'path',
        'car_id'
    ];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
