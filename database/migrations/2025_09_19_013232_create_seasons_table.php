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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number');
            $table->foreignId('series_id')->constrained()->onDelete('cascade'); // essa linha é equivalente as 2 abaixo:
            // //e deleta em cascata series e temporadas
            //$table->unsignedBigInteger('series_id');
            //$table->foreign('series_id')->references('id')->on('series');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // já vem pronto, basicamente excluir as tabelas
    {
        Schema::dropIfExists('seasons');
    }
};
