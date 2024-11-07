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
        Schema::create('presentacion_farmaco', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmaco_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('presentacion_id')
                ->constrained()
                ->onDelete('cascade');
            $table->integer('cantidad');
            $table->date('fecha_vencimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentacion_farmaco');
    }
};
