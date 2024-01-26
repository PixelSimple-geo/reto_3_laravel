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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCliente')->constrained('clientes');
            $table->foreignId('Usuario')->nullable()->constrained('users');
            $table->date('fechaPedido');
            $table->string('direccionEnvio');
            $table->string('estadoPedido');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE pedidos ADD CHECK (estadoPedido IN ('Solicitado', 'En preparación', 'En entrega', 'entregado'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
