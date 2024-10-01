<?php

namespace App\Http\Controllers;

use App\Models\Triaje;
use Illuminate\Http\Request;

class TriajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $triajes = Triaje::all();
        return json_encode($triajes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Triaje $triaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Triaje $triaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Triaje $triaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Triaje $triaje)
    {
        //
    }
}
