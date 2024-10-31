<?php

namespace App\Http\Controllers;

use App\Models\Farmaco;
use App\Models\PresentacionFarmaco;
use Illuminate\Http\Request;

class FarmacoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $sort = 'id';

    public $direction = 'desc';

    public $search = '';
    public function index()
    {
        //return view('modulos.farmaco');
        $farmacos = PresentacionFarmaco::with(['farmaco', 'presentacion'])->get();
        return json_encode($farmacos);
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
    public function show(Farmaco $farmaco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farmaco $farmaco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farmaco $farmaco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farmaco $farmaco)
    {
        //
    }
}
