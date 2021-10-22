<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia_cliente extends Model
{
    protected $fillable = ['cliente_id', 'fecha', 'status'];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
