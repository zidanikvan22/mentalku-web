<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'author',
        'image_path',
        'excerpt',
        'external_url',
        'published_at',
        'content_type', 
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}