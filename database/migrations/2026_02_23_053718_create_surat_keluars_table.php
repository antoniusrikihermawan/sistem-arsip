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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id('id_surat_keluar');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nomer_surat');
            $table->date('tanggal_surat');
            $table->date('tanggal_kirim');
            $table->string('perihal');
            $table->string('ditujukan');
            $table->string('file_surat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
