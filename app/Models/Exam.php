<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function essayQuestion()
    {
        return $this->hasMany(EssayQuestion::class);
    }

    public function pgQuestion()
    {
        return $this->hasMany(PGQuestion::class);
    }

    public function exResult()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function rapor()
    {
        return $this->hasMany(Rapor::class);
    }
}
