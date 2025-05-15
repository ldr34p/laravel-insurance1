<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortCode;
class ShortCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $codes = ShortCode::all();
        return view('shortcodes.index', compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shortcodes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'shortcode' => 'required|string|unique:short_codes,shortcode',
            'replace'   => 'required|string',
        ]);
        ShortCode::create($data);
        return redirect()->route('shortcodes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortCode $shortcode)
    {
        return view('shortcodes.edit', ['code' => $shortcode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShortCode $shortcode)
    {
        $data = $request->validate([
            'shortcode' => "required|string|unique:short_codes,shortcode,{$shortcode->id}",
            'replace'   => 'required|string',
        ]);
        $shortcode->update($data);
        return redirect()->route('shortcodes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortCode $shortcode)
    {
        $shortcode->delete();
        return redirect()->route('shortcodes.index');
    }
}
