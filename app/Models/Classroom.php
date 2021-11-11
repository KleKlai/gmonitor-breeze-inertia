<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'name', 'section', 'archive', 'is_open'
    ];

    protected static function boot()
    {
        parent::boot();

        // auto-sets values on creation
        static::creating(function ($query) {
            $query->code   = Str::random(6);
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot(['is_teacher']);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot(['is_teacher'])
            ->wherePivot('is_teacher', true);
    }

    public function students()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot(['is_teacher'])
            ->wherePivot('is_teacher', false);
    }

    public function scopeArchive($query, $type)
    {
        return $query->whereArchive($type);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
