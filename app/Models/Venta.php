<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['cliente_id', 'user_id', 'sale_date','tax','total','tatus'];


    public function user(){
        return $this->belongsTo(User::class);
    } 
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    } 
    public function detalleVenta(){
        return $this->hasMany(DetalleVenta::class);
    }  
    public function producto(){
        return $this->hasMany('stock');
    }
}
