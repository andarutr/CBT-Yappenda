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
        $this->belongsTo(Exam::class);
    }
}
