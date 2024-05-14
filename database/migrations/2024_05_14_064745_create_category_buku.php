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
        Schema::create('category_buku', function (Blueprint $table) {
            $table->foreignUuid('id_category')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignUuid('id_buku')->references('id')->on('bukus')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_buku');
    }
};
