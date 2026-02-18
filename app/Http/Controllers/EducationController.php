<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $query = Education::query();

        // --- 1. LOGIC FILTER KATEGORI (MAPPING INDO -> ENG) ---
        if ($request->has('category') && $request->category != 'Semua') {
            
            $filter = $request->category;

            // Mapping dari Label UI (Indo) ke Database (Inggris/Enum)
            $categoryMap = [
                'Stres' => 'Stress',      // UI 'Stres' -> DB 'Stress'
                'Kecemasan' => 'Anxiety', // UI 'Kecemasan' -> DB 'Anxiety'
                'Depresi' => 'Depresi',   // Sama
                'Self Care' => 'Self-Care' // UI spasi -> DB strip (sesuai enum)
            ];

            // Pakai mapping kalau ada, kalau gak ada pakai nilai asli
            $dbCategory = $categoryMap[$filter] ?? $filter;

            $query->where('category', $dbCategory);
        }

        // --- 2. LOGIC SORTING (NULL TERAKHIR) ---
        // Penjelasan: 
        // - published_at IS NULL -> Bernilai 0 kalau ada tanggal, 1 kalau null. Ascending berarti 0 dulu (data ada) baru 1 (null).
        // - published_at DESC -> Urutkan tanggal dari yang terbaru.
        $query->orderByRaw('published_at IS NULL, published_at DESC');

        // 3. Pagination
        $educations = $query->paginate(12)->appends($request->query());

        return view('user.education', [
            'educations' => $educations,
            'currentCategory' => $request->category ?? 'Semua'
        ]);
    }
}
