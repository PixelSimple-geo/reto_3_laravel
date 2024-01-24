<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id', 'nombre', 'descripcion'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class);
    }
}