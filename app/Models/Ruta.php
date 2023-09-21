<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruta extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','origen','destino'];


    public function unidades()
    {
        return $this->hasMany(Unidad::class);
    }
}
