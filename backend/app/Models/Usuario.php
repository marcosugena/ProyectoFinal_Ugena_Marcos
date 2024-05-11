<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'UserId';
    protected $table = 'usuario';
    protected $fillable = ['UserId',"UserName","Gmail","Password","Admin"];
    public $timestamps = false;
}
