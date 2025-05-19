<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Owner::all();
    }

    public function show($id){
        return Owner::find($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner = new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();

        return $owner;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $owner = Owner::find($id);
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();

        return $owner;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Owner::destroy($id);
        return $id;
    }
}
