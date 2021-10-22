<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['Nombre', 'ApellidoPaterno', 'ApellidoMaterno', 'dni', 'Telefono', 'Correo', 'Domicilio', 'Area'];

}
