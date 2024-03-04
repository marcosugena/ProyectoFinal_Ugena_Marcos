<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    public function ObtenerProductosNutricion()
    {
        try {
            $productosNutricion = Producto::where('tipo', 'nutricion')->get();
            return response()->json($productosNutricion);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
        }
    }
   
}
