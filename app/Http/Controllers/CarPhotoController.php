<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarPhoto;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarPhotoController extends Controller
{
    /*public function destroy(CarPhoto $carPhoto)
    {
        Storage::disk('public')->delete($carPhoto->path);
        $carPhoto->delete();
        return back();
    }*/
    public function destroy(Car $car, CarPhoto $photo)
    {
        if ($photo->car_id !== $car->id) {
            abort(403);
        }

        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        return back();
    }

}
