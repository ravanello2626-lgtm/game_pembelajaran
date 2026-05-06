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
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pos_id')->constrained('pos')->onDelete('cascade');
        $table->text('soal');
        // Gunakan ->text() bukan ->string() agar muat banyak karakter
        $table->text('opsi_a')->nullable();
        $table->text('opsi_b')->nullable();
        $table->text('opsi_c')->nullable();
        $table->text('opsi_d')->nullable();
        $table->text('opsi_e')->nullable();
        $table->string('jawaban_benar');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
