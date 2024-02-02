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
            $table->foreignId('idPedido')->constrained('pedidos')->onDelete('cascade');
            $table->foreignId('idFormatoProducto')->constrained('formato_productos')->onDelete('cascade');
            $table->integer('unidades');
            $table->primary(['idPedido', 'idFormatoProducto']);
            $table->timestamps();
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
