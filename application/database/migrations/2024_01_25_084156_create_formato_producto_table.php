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
        Schema::create('formato_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idProducto')->constrained('productos');
            $table->string('formatoEnvase');
            $table->integer('unidades');
            $table->decimal('precioUnitario', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formato_producto');
    }
};
