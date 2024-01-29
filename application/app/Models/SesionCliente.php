<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionCliente extends Model
{
    use HasFactory;

    protected $fillable = ['token', 'idCliente'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id');
    }

}
