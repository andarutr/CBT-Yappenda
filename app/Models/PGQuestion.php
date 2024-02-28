<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PGQuestion extends Model
{
    use HasFactory;

    protected $table = 'pg_questions';

    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function pgAnswer()
    {
        return $this->hasMany(PGAnswer::class, 'pg_question_id');
    }
}
