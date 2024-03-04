<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Producto';
    protected $fillable = ['ProductId', 'Nombre', 'ImagenProducto','Descripcion','Precio','Tipo'];
}
