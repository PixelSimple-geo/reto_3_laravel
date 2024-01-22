<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('propiedades_has_pedidos', function (Blueprint $table) {
            $table->foreignId('propiedades_id')->constrained();
            $table->foreignId('pedidos_id')->constrained();
            $table->integer('unidades');
            $table->primary(['propiedades_id', 'pedidos_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades_has_pedidos');
    }
};
