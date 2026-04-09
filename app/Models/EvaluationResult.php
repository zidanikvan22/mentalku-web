<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'depression_score',
        'depression_level',
        'anxiety_score',
        'anxiety_level',
        'stress_score',
        'stress_level',
        'ml_label',
        'vent_text',
        'gemini_recommendation',
        'average_score',
        'final_level',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
