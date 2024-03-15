<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssayRemedialAnswer extends Model
{
    use HasFactory;

    protected $table = 'essay_remedial_answers';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function esQuestion()
    {
        return $this->belongsTo(EssayQuestion::class, 'essay_question_id');
    }
}
