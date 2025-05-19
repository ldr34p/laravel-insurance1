<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car = new Car();
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;
        $car->save();

        return $car;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Car::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;
        $car->save();
        //there is no line to add image rn

        return $car;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Car::destroy($id);
        return $id;
    }
}
