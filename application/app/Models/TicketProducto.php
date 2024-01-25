<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketProducto extends Model
{
    use HasFactory;

    protected $table = 'ticket_producto';
    protected $fillable = ['idPedido', 'idFormatoProducto', 'unidades'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idPedido');
    }

    public function formatoProducto()
    {
        return $this->belongsTo(FormatoProducto::class, 'idFormatoProducto');
    }
}
