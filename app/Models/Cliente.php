<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['tipo_cp',
    'fecha',
    'nombre',
    'apellido',
    'tipo_doc',
    'number_doc',
    'fecha_naci',
    'genero',
    'categoria1',
    'categoria2',
    'telefono',
    'correo',
    'direccion',
    'departamento',
    'provincia',
    'distrito',
    'razon_social',
    'ruc',
    'rubro',
    'pagina_web'];
}
