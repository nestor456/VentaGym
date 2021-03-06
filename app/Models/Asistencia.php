<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = ['empleado_id', 'fecha', 'status'];


    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
