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
    public function ObtenerProductosProte()
    {
        try {
            $productosNutricion = Producto::where('tipo', 'proteina')->get();
            return response()->json($productosNutricion);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
        }
    }

    public function ObtenerProductosVitaminas()
    {
        try {
            $productosNutricion = Producto::where('tipo', 'vitaminas')->get();
            return response()->json($productosNutricion);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
        }
    }
    public function ObtenerProductosBySnacks()
    {
        try {
            $productosNutricion = Producto::where('tipo', 'ByS')->get();
            return response()->json($productosNutricion);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
        }
    }
    public function ObtenerProductosAlimenatcion()
    {
        try {
            $productosNutricion = Producto::where('tipo', 'Alimentacion')->get();
            return response()->json($productosNutricion);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
        }
    }
   
}
