<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $table="unidades";
    //requiero el fillable para convertirlo al tipo modelo 
    //y debe contener el id para las rutas
    protected $fillable = ['id','tipo','placas','ruta_id','created_at','updated_at'];

}
