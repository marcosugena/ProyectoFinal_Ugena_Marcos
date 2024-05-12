<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompraController extends Controller
{
    public function CreateCompra(Request $request){
        try{
            $compra = Compra::create([
                'PrecioTotal' => $request->price,
                'Fecha' => now(),
                'UsuarioId'=> $request->userid
            ]);
            return response()->json(['success' => true, 'compra' => $compra], 201);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }





}