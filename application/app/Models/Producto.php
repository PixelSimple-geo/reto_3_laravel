<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['idCategoria', 'nombreProducto', 'descripcionProducto', 'fotoURL'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function formatosProducto()
    {
        return $this->hasMany(FormatoProducto::class, 'idProducto');
    }
}
