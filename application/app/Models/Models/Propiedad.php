<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $fillable = ['producto_id', 'formato', 'unidades', 'precio'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'propiedades_has_pedidos', 'propiedades_id', 'pedidos_id')
            ->withPivot('unidades');
    }
}
