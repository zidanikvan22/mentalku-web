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
        Schema::create('evaluation_results', function (Blueprint $table) {
            $table->id();
            // Foreign Key ke User
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Skor Angka (DASS-21)
            $table->integer('depression_score');
            $table->integer('anxiety_score');
            $table->integer('stress_score');
            
            // Level (Ringan, Sedang, Parah, dll)
            $table->string('depression_level');
            $table->string('anxiety_level');
            $table->string('stress_level');
            
            // Hasil Analisa ML (Vent)
            $table->string('ml_label')->nullable(); // e.g., "Butuh Penanganan Segera"
            $table->text('vent_text')->nullable(); // Teks asli dari Vent
            
            // Rekomendasi Gemini
            $table->text('gemini_recommendation')->nullable();
            
            // Rata-rata & Final (Sesuai request lo)
            $table->float('average_score')->nullable(); 
            $table->string('final_level')->nullable(); // Kesimpulan umum
            
            $table->timestamps(); // Created_at otomatis jadi timestamp waktu tes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_results');
    }
};
