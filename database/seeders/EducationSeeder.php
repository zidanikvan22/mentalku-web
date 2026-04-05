<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Education;
use Carbon\Carbon;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Baca File JSON
        $jsonPath = database_path('data/education.json');
        $educationData = json_decode(file_get_contents($jsonPath), true);
        
        if (!File::exists($jsonPath)) {
            $this->command->error("File education.json tidak ditemukan di database/data/");
            return;
        }

        $bulanIndoKeEng = [
            'Januari' => 'January', 'Februari' => 'February', 'Maret' => 'March',
            'April' => 'April', 'Mei' => 'May', 'Juni' => 'June',
            'Juli' => 'July', 'Agustus' => 'August', 'September' => 'September',
            'Oktober' => 'October', 'November' => 'November', 'Desember' => 'December'
        ];

        // 2. Loop setiap kategori (depresi, anxiety, stress)
        foreach ($educationData as $category => $items) {
            foreach ($items as $item) {
                $publishedAt = null;

                // Validasi dan Konversi Format Tanggal
                if (!empty($item['published_at'])) {
                    // Replace teks bulan Indo jadi Eng (misal: "14 Januari 2025" -> "14 January 2025")
                    $englishDateString = strtr($item['published_at'], $bulanIndoKeEng);
                    
                    // Konversi string ke format YYYY-MM-DD buat MySQL
                    $publishedAt = Carbon::parse($englishDateString)->format('Y-m-d');
                }

                Education::create([
                    'title' => $item['title'],
                    'category' => $item['category'], // Sekarang udah "Stres", "Kecemasan", dll sesuai JSON lo
                    'author' => $item['author'],
                    'image_path' => $item['image_path'],
                    'excerpt' => $item['excerpt'],
                    'external_url' => $item['external_url'],
                    'published_at' => $publishedAt, // Masuk database sbg YYYY-MM-DD dengan sempurna
                    'content_type' => $item['content_type'],
                ]);
            }
        }
    }
}