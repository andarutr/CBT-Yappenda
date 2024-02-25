<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function lesson()
    {
        $this->belongsTo(Lesson::class);
    }

    public function essayQuestion()
    {
        $this->hasMany(EssayQuestion::class);
    }

    public function pgQuestion()
    {
        $this->hasMany(PGQuestion::class);
    }

    public function exResult()
    {
        $this->hasMany(ExamResult::class);
    }
}
