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
        $this->belongsTo(Exam::class);
    }

    public function pgAnswer()
    {
        $this->hasMany(PGAnswer::class);
    }
}
