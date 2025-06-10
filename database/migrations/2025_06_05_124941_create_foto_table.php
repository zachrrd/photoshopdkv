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
    Schema::create('foto', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->string('judul_foto');
    $table->text('deskripsi')->nullable();
    $table->string('kategori')->nullable();
    $table->string('ukuran')->nullable();
    $table->decimal('harga', 10, 2);
    $table->integer('stok')->default(0);
    $table->string('file_path');
    $table->date('tgl_upload')->nullable();
    $table->enum('status', ['tersedia', 'habis', 'arsip'])->default('tersedia');
    $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};