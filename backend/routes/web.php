<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/productosnutri',[ProductoController::class,'ObtenerProductosNutricion']);
Route::get('/productosrecomendados',[ProductoController::class,'ObtenerRecomendados']);
Route::get('/productos',[ProductoController::class,'ObtenerProductos']);
Route::get('/users',[UserController::class,'ObtenerUsuarios']);