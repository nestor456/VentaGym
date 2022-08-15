<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategories extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = ['category_id','fecha_creacion', 'name','description'];
}
