<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();

        return response()->json([
            "data" => $productos,
            "status" => 200
        ], 200);
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->codigo = $request->codigo;
        $producto->titulo = $request->titulo;
        $producto->descripcion = $request->descripcion;
        $producto->inventario = $request->inventario;
        $producto->monto = $request->monto;

        $producto->save();

        return response()->json([
            "data" => $producto,
            "status" => 200,
            "message" => "Producto registrado exitosamente"
        ], 200);
    }

    public function show(Producto $producto)
    {
        return response()->json([
            "data" => $producto,
            "status" => 200
        ], 200);
    }


    public function update(Request $request, $producto)
    {
        $producto = Producto::findOrFail($producto);
        $producto->titulo = $request->titulo;
        $producto->descripcion = $request->descripcion;
        $producto->inventario = $request->inventario;
        $producto->monto = $request->monto;
        $producto->update();

        return response()->json([
            "data" => $producto,
            "status" => 200,
            "message" => "Producto Actualizado con exito"
        ], 200);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->json([
            "data" => $producto,
            "status" => 200,
            "message" => "Producto Eliminado con exito"
        ], 200);
    }
}
