<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $primaryKey = 'CompraId';
    protected $table = 'compra';
    protected $fillable = ["CompraId","PrecioTotal","Fecha","UsuarioId"];
    public $timestamps = false;
}