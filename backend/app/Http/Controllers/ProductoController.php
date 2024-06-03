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

    public function ObtenerProductosVita()
    {
        try {
            $productosNutricion = Producto::where('tipo', 'vitaminas')->get();
            return response()->json($productosNutricion);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
        }
    }
    public function ObtenerProductosSnack()
    {
        try {
            $productosNutricion = Producto::where('tipo', 'barritas')->get();
            return response()->json($productosNutricion);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
        }
    }
    public function ObtenerProductosAlimentacion()
    {
        try {
            $productosNutricion = Producto::where('tipo', 'alimentacion')->get();
            return response()->json($productosNutricion);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
        }
    }
    public function ObtenerRecomendados()
    {
        $productosAleatorios = Producto::inRandomOrder()->limit(6)->get();
        return response()->json(["recomendados" => $productosAleatorios]);
    }
    public function ObtenerBusqueda(Request $request)
    {
        $palabraClave = $request->input('palabra');
        $resultados = Producto::where("Nombre", 'LIKE', $palabraClave . "%")
                        ->select("ProductId", "Nombre")
                        ->get()
                        ->toArray();
        return response()->json($resultados);
    }
    public function ObtenerProductoPorId(Request $request){
        try {
            $id = $request->input('id');
            $producto = Producto::where("ProductId", $id)->first();
            return response()->json($producto);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function CreateProduct(Request $request){
        try{
            $producto = Producto::create([
                'Nombre' => $request->nombre,
                'ImagenProducto' => $request->imagenname,
                'Descripcion' => $request->descripcion,
                'Precio' => $request->precio,
                'Tipo' => $request->tipo
            ]);
            return response()->json(['success' => true, 'usuario' => $producto], 201);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function guardarImagen(Request $request)
{
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $nombreImagen = $imagen->getClientOriginalName();
        $imagen->move(public_path(), $nombreImagen);
        return response()->json(['success' => true], 200);
    } else {
        return response()->json(['mensaje' => 'No se ha enviado ninguna imagen'], 400);
    }
}
public function ObtenerProductos()
{
    try {
        $productosNutricion = Producto::all();
        return response()->json($productosNutricion);
    } catch (Exception $e) {
        return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
    }
}
public function DeleteProduct($id)
{
    try {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        // Eliminar la imagen asociada al producto si existe
        $nombreImagen = $producto->ImagenProducto;
        if ($nombreImagen && file_exists(public_path($nombreImagen))) {
            unlink(public_path($nombreImagen));
        }

        // Eliminar el producto de la base de datos
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado correctamente'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al eliminar el producto: ' . $e->getMessage()], 500);
    }
}

public function updateProduct(Request $request, $id)
{
    try {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $producto->Nombre = $request->input('Nombre');
        $producto->Descripcion = $request->input('Descripcion');
        $producto->Precio = $request->input('Precio');
        $producto->Tipo = $request->input('Tipo');

        if ($request->hasFile('ImagenProducto')) {
            $imagen = $request->file('ImagenProducto');
            $nombreImagen = $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->ImagenProducto = '/images/' . $nombreImagen;
        }

        $producto->save();

        return response()->json(['success' => true, 'producto' => $producto], 200);
    } catch (Exception $e) {
        return response()->json(['error' => 'Error al actualizar el producto: ' . $e->getMessage()], 500);
    }
}

}
