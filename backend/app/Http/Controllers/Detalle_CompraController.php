<?php

namespace App\Http\Controllers;
use App\Models\Detalle_compra;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Detalle_CompraController extends Controller
{
    public function CreateDetalleCompra(Request $request){
        try{
            foreach ($request->carrito as $item) {
                $compra = Detalle_compra::create([
                    'CompraId' => $request->compraId,
                    'ProductoId' => $item['Id'],
                    'Cantidad' => $item['Cantidad'],
                ]);

            }
            return response()->json(['success' => true], 201);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }





}