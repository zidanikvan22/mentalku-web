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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // Request 4: Enum Category
            $table->enum('category', ['Depresi', 'Stress', 'Anxiety', 'Self-Care']);
            // $table->enum('category', ['Depresi', 'Stres', 'Kecemasan', 'Rawat Diri']);
            $table->string('author');
            // Request 3: Image Path Wajib (Hapus nullable)
            $table->string('image_path'); 
            $table->text('excerpt');
            $table->string('external_url');
            // Request 2: Published At tipe Date, Nullable
            $table->date('published_at')->nullable(); 
            // Request 1: Content Type Enum, Nullable
            $table->enum('content_type', ['Artikel', 'Video', 'Jurnal'])->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
