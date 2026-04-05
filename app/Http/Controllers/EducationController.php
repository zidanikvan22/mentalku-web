<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $query = Education::query();

// --- 1. LOGIC FILTER KATEGORI (DIRECT MATCHING) ---
        if ($request->has('category') && $request->category != 'Semua') {
            // Langsung lempar request category karena namanya udah 100% sama dengan Database
            $query->where('category', $request->category); 
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
