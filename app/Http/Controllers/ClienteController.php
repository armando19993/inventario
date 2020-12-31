<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        
        $clientes = Cliente::all();

        return response()->json([
            "data" => $clientes,
            "status" => 200
        ], 200);
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->correo = $request->correo;
        $cliente->documento = $request->documento;
        $cliente->telefono = $request->telefono;
        $cliente->clave = $request->clave;
        $cliente->save();

        return response()->json([
            "data" => $cliente,
            "status" => 200,
            "message" => "Cliente insertado con exito"
        ], 200);
    }

    public function show(Cliente $cliente)
    {
        return response()->json([
            "data" => $cliente,
            "status" => 200
        ], 200);
    }

    public function update(Request $request, $cliente)
    {
        $data = Cliente::findOrFail($cliente);
        $data->nombre = $request->nombre;
        $data->correo = $request->correo;
        $data->documento = $request->documento;
        $data->telefono = $request->telefono;
        $data->clave = $request->clave;
        $data->update();

        return response()->json([
            "data" => $data,
            "status" => 200,
            "message" => "Cliente Actualizado con exito"
        ], 200);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json([
            "data" => $cliente,
            "status" => 200,
            "message" => "Cliente Eliminado con exito"
        ], 200);
    }
}