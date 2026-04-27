<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $query = Education::query();

        // Filter by category directly using an exact database match
        if ($request->has('category') && $request->category != 'Semua') {
            $query->where('category', $request->category); 
        }

        // Sort by published date (newest first), ensuring null dates appear last
        $query->orderByRaw('published_at IS NULL, published_at DESC');

        // Paginate results and retain query parameters for pagination links
        $educations = $query->paginate(12)->appends($request->query());

        return view('user.education', [
            'educations' => $educations,
            'currentCategory' => $request->category ?? 'Semua'
        ]);
    }
}
