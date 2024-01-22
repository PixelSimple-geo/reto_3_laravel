<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['clientes_id', 'fecha', 'direccion', 'estado', 'foto'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    public function propiedades()
    {
        return $this->belongsToMany(Propiedad::class, 'propiedades_has_pedidos', 'pedidos_id', 'propiedades_id')
            ->withPivot('unidades');
    }
}
