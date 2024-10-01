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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cita_id')
                ->constrained()
                ->onDelete('cascade');
            /*             $table->foreignId('triage_id')
                ->constrained()
                ->onDelete('cascade'); */
            $table->foreignId('paciente_id')
                ->constrained()
                ->onDelete('cascade');
            $table->text('diagnostico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
