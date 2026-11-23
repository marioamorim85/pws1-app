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
        Schema::table('eventos', function (Blueprint $table) {
            $table->foreignId('tipo_id')
                // nullable para permitir que o campo seja nulo
                ->nullable()  
                ->after('titulo')
                // Constrained para criar a chave estrangeira
                ->constrained()
                ->nullOnDelete();
            $table->dropColumn('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remover a o coluna tipo
        Schema::table('eventos', function (Blueprint $table) {
            $table->string('tipo', 20)->default('')->after('titulo');
            // Remover a chave estrangeira
            $table->dropConstrainedForeignId('tipo_id');
        });
    }
};
