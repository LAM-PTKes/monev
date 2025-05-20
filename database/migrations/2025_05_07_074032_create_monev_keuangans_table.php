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
        Schema::create('monev_keuangans', function (Blueprint $table) {
            $table->ulid('id')->primary()->unique();
            $table->string('kategori_form')->nullable();
            $table->string('nama_file')->nullable();
            $table->date('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monev_keuangans');
    }
};
