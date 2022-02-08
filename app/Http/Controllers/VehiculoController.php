<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculoRequest;
use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{

    public function index()
    {
        $vehiculos = Vehiculo::all()->load('tipoVehiculo');
        return response()->json([
            "data" => $vehiculos
        ]);
    }

    public function store(VehiculoRequest $request)
    {
        Vehiculo::create($request->all());
        return response()->json([
            "message" => "Se ha creado el vehiculo"
        ], 201);
    }

    public function show(Vehiculo $vehiculo)
    {
        return response()->json([
            "data" => $vehiculo
        ]);
    }

    public function update(VehiculoRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->all());
        return response()->json([
            "message" => "Se ha actualizado el vehiculo"
        ]);
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return response()->json([
            "message" => "Se ha eliminado el vehiculo"
        ]);
    }
}
