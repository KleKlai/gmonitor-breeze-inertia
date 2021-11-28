<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'classroom_id', 'question', 'answer_by', 'visibility'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
