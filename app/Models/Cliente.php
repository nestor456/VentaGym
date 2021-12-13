<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['Nombre', 'ApellidoPaterno', 'ApellidoMaterno','dni','Telefono','Correo','Membresia','Entrenador','Objetivo_fisico','Foto','Fecha_Inicio','Fecha_Final','congelar_membresia','observacion'];
}
