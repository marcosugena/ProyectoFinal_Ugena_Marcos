<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;
class Detalle_compra extends Model
{
    protected $primaryKey = 'DetalleCompraId';
    protected $table = 'detalle_compra';
    protected $fillable = ['DetalleCompraId',"CompraId","ProductoId","Cantidad"];
    public $timestamps = false;
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'CompraId', 'CompraId');
    }
}