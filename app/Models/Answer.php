<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'classroom_id', 'question_id', 'answer', 'visibility'
    ];

    public function questions()
    {
        return $this->belongsTo(Questions::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
