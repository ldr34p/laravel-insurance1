<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarImage;

class CarImageController extends Controller
{
    public function destroyImage($id)
    {
        $image = CarImage::findOrFail($id);
        $path  = storage_path('app/public/' . $image->path);
        if (file_exists($path)) {
            unlink($path);
        }
        $image->delete();
        return back();
    }
}
