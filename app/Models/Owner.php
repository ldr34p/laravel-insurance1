<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'address'
    ];
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
