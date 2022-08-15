<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = ['fecha_creacion', 'name','description'];

    public function subCategorias(){
        return $this->hasMany(Subcategories::class);
    }  
}
