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
        Schema::create('isi_monevs', function (Blueprint $table) {
            $table->ulid('id')->primary()->unique();
            $table->foreignUlid('unit_id')->constrained('unit_kerjas')->onUpdate('cascade')->onDelete('cascade');
            $table->text('aspek')->nullable();
            $table->text('indikator')->nullable();
            $table->text('kategori')->nullable();
            $table->text('satuan')->nullable();
            $table->text('bahan')->nullable();
            $table->text('metode')->nullable();
            $table->text('kriteria')->nullable();
            $table->string('hasil_tw_I')->nullable();
            $table->string('hasil_tw_II')->nullable();
            $table->string('hasil_tw_III')->nullable();
            $table->string('hasil_tw_IV')->nullable();
            $table->text('januari')->nullable();
            $table->text('februari')->nullable();
            $table->text('maret')->nullable();
            $table->text('april')->nullable();
            $table->text('mei')->nullable();
            $table->text('juni')->nullable();
            $table->text('juli')->nullable();
            $table->text('agustus')->nullable();
            $table->text('september')->nullable();
            $table->text('oktober')->nullable();
            $table->text('november')->nullable();
            $table->text('desember')->nullable();
            $table->text('catatan')->nullable();
            $table->string('pic')->nullable();
            $table->string('form')->nullable();
            $table->date('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isi_monevs');
    }
};
