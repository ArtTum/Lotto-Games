<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LottoDraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'lotto_engine_numbers',
        'user_generated_numbers',
        'matched_numbers',
        'is_winner',
        'draw_time',
    ];

    protected $casts = [
        'lotto_engine_numbers' => 'array',
        'user_generated_numbers' => 'array',
        'matched_numbers' => 'array',
    ];
}
