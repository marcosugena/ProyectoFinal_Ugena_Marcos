<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detalle_compra;
class Compra extends Model
{
    protected $primaryKey = 'CompraId';
    protected $table = 'compra';
    protected $fillable = ["CompraId","PrecioTotal","Fecha","UsuarioId"];
    public $timestamps = false;
    public function detallesCompra()
    {
        return $this->hasMany(Detalle_Compra::class, 'CompraId', 'CompraId');
    }
}