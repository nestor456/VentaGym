<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $fillable = ['venta_id', 'producto_id', 'quantity','precio',];


    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

}
