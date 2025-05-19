<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\CarImage;
use Illuminate\Support\Facades\App;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    public function store(CarRequest $request)
    {
        $car = new Car();
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;
        $car->save();

        return redirect()->route('cars.index');
    }

    public function edit(Car $car, Request $request)
    {
        if (! $request->user()->can('editCar', $car) ){
            return redirect()->route('cars.index');
        }
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    public function update(CarRequest $request, Car $car)
    {
        if (! $request->user()->can('editCar', $car) ){
            return redirect()->route('cars.index');
        }

        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;

        if ($request->hasFile('image')) {
            foreach($request->file('image') as $image)
            {
                $path=$image->store('public/car-images');
                $cleanPath = str_replace('public/', '', $path);
                $car->images()->create([
                    'path' => $cleanPath
                ]);
            };

        }

        $car->save();

        return redirect()->route('cars.index');
    }

    public function destroy(Car $car, Request $request)
    {
        if (! $request->user()->can('deleteCar', $car) ){
            return redirect()->route('cars.index');
        }
        $car->delete();

        return redirect()->route('cars.index');
    }
}
