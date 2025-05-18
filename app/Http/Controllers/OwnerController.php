<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Owner::class, 'Owner');
    }
    public function index(Request $request)
    {
        $owners = Owner::all();
        return view('owners.index', ['owners' => $owners]);
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $owner = new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();

        return redirect()->route('owners.index');
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', ['owner' => $owner]);
    }

    public function update(Request $request, Owner $owner)
    {
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();

        return redirect()->route('owners.index');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index');
    }
}
