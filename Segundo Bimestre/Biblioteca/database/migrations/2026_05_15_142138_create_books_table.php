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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Cria uma chave primária auto-incremento automaticamente
            
            // Campos pedidos na tarefa:
            $table->string('title');                               // title (texto)
            $table->string('author');                              // author (texto)
            $table->string('isbn')->unique();                      // isbn (texto, único)
            $table->integer('pages');                              // pages (número inteiro)
            $table->boolean('is_available')->default(true);       // is_available (booleano, padrão verdadeiro)
            
            $table->timestamps(); // Cria as colunas created_at e updated_at automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};