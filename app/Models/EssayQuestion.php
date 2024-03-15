<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssayQuestion extends Model
{
    use HasFactory;

    protected $table = 'essay_questions';

    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function esAnswer()
    {
        return $this->hasMany(EssayAnswer::class, 'essay_question_id');
    }

    public function esRemedialAnswer()
    {
        return $this->hasMany(EssayRemedialAnswer::class);
    }
}
