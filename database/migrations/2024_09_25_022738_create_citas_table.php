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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('personal_id')
                ->constrained()
                ->onDelete('cascade')
                ->nullable();
            /* $table->foreignId('receipt_id')
                ->constrained()
                ->onDelete('cascade')
                ->nullable(); */
            /* $table->foreignId('historial_id')
                ->constrained()
                ->onDelete('cascade'); */
            $table->date('fecha');
            $table->time('hora', precision: 0);
            $table->text('motivo');
            $table->boolean('confirmada')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
