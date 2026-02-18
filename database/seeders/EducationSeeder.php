<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Baca File JSON
        $jsonPath = database_path('data/education.json');
        
        if (!File::exists($jsonPath)) {
            $this->command->error("File education.json tidak ditemukan di database/data/");
            return;
        }

        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        // 2. Loop setiap kategori (depresi, anxiety, stress)
        foreach ($data as $categoryKey => $items) {
            foreach ($items as $item) {
                
                // Logic Pembersih Tanggal (Parsing Date yang berantakan)
                $publishedAt = null;
                if (!empty($item['published_at'])) {
                    try {
                        // Coba parse format umum
                        $publishedAt = Carbon::parse($item['published_at'])->format('Y-m-d');
                    } catch (\Exception $e) {
                        // Kalau gagal (misal format Indonesia '2 September 2025'), biarkan null atau handle manual
                        // Untuk sekarang kita set null dulu kalau formatnya aneh banget biar gak error
                        $publishedAt = null;
                    }
                }

                // Normalisasi Kategori (Huruf Depan Besar)
                // JSON: "depresi" -> DB: "Depresi"
                // JSON: "stress" -> DB: "Stress"
                $normalizedCategory = ucfirst($categoryKey);
                if($normalizedCategory == 'Anxiety') $normalizedCategory = 'Anxiety'; // Pastikan match ENUM
                
                // Insert ke Database
                DB::table('education')->insert([
                    'title' => $item['title'],
                    'category' => $normalizedCategory, // Sesuai Enum
                    'author' => $item['author'],
                    // Kita tambahkan prefix path folder gambar
                    'image_path' => 'assets/img/education/' . $item['image_path'], 
                    'excerpt' => $item['excerpt'],
                    'external_url' => $item['external_url'],
                    'published_at' => $publishedAt,
                    'content_type' => $item['content_type'] ?? 'Artikel', // Default Artikel kalau null
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}