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
        Schema::create('authorities_granted', function (Blueprint $table) {
            $table->foreignId('authorities_id')->constrained();
            $table->foreignId('users_id')->constrained();
            $table->primary(['authorities_id', 'users_id']);
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorities_granted');
    }
};
