<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class provides extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha_creacion',
        'razon_social',
        'ruc',
        'rubro',
        'categoria',
        'pagina_web',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'nombres',
        'apellidos',
        'tipo_doc',
        'number_doc',
        'genero',
        'telefono',
        'correo'
    ];
}
