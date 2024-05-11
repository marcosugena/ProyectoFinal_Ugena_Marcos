<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'ProductId';
    protected $table = 'Producto';
    protected $fillable = ['ProductId', 'Nombre', 'ImagenProducto','Descripcion','Precio','Tipo'];
    public $timestamps = false;
}
