<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function register(Request $request)
    {
        $comprobar=Usuario::where('Gmail',strtolower($request->email))->first();
        if($comprobar){
            return response()->json(['success' => false]);
        }   
        try {
            $usuario = Usuario::create([
                'UserName' => $request->username,
                'Gmail' => $request->email,
                'Password' => Hash::make($request->password),
                'Admin' => false,
            ]);
            return response()->json(['success' => true, 'usuario' => $usuario,'comprobar'=>$comprobar], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Error al registrar usuario '. $e->getMessage()], 500);
        }
    }
    public function login(Request $request)
    {
        $email=$request->gmail;
        $password=$request->password;
        $usuario=Usuario::where('Gmail',strtolower($email))->first();
        if($usuario){
            if(Hash::check($password,$usuario->Password)){
                return response()->json(['usu' => $usuario->UserName,'id'=>$usuario->UserId]);  
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function esAdmin(Request $request)
    {
        $userId=$request->UserId;
        $usuario = Usuario::findOrFail($userId);
        return $usuario->Admin;
    }
    public function ObtenerUsuarios()
    {
    try {
        $Usuarios = Usuario::all();
        return response()->json($Usuarios);
    } catch (Exception $e) {
        return response()->json(['error' => 'Error al obtener productos de nutricion ' . $e], 500);
    }
}
public function DeleteUser($id)
{
    try {
        $user= Usuario::find($id);
        if (!$user) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'Producto eliminado correctamente'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al eliminar el producto: ' . $e->getMessage()], 500);
    }
}
public function CreateAdmin(Request $request)
    {
        $comprobar=Usuario::where('Gmail',strtolower($request->email))->first();
        if($comprobar){
            return response()->json(['success' => false]);
        }   
        try {
            $usuario = Usuario::create([
                'UserName' => $request->username,
                'Gmail' => $request->email,
                'Password' => Hash::make($request->password),
                'Admin' => true
            ]);
            return response()->json(['success' => true, 'usuario' => $usuario,'comprobar'=>$comprobar], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Error al registrar usuario '. $e->getMessage()], 500);
        }
    }
}


