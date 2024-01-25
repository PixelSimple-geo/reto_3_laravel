<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_producto', function (Blueprint $table) {
            $table->foreignId('idPedido')->constrained('pedidos');
            $table->foreignId('idFormatoProducto')->constrained('formato_producto');
            $table->integer('unidades');
            $table->primary(['idPedido', 'idFormatoProducto']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_producto');
    }
};
