<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $table = 'exam_results';
    
    protected $guarded = [];

    public function exam()
    {
        $this->belongsTo(Exam::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
