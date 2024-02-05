<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatoProducto extends Model
{
    use HasFactory;

    protected $fillable = ['idProducto', 'formatoEnvase', 'unidades', 'precioUnitario'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
