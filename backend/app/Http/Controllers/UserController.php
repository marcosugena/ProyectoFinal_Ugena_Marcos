<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $usuario = Usuario::create([
                'UserName' => $request->username,
                'Gmail' => $request->email,
                'Password' => Hash::make($request->password),
                'Admin' => false,
            ]);
            return response()->json(['success' => true, 'usuario' => $usuario], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Error al registrar usuario '. $e->getMessage()], 500);
        }
    }
}


