<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    public function ObtenerProductos()
    {
        try {
            $nombresProductos = Producto::all();
            return response()->json($nombresProductos);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener nombres de productos ' . $e], 500);
        }
    }
    public function ObtenerImagenes()
    {
        try {
            $imagenes = Producto::pluck('ImagenProducto');
            
            return response()->json(['imagenes' => $imagenes]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener las imagenes ' . $e], 500);
        }
    }
}
