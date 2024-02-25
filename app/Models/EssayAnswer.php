<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssayAnswer extends Model
{
    use HasFactory;
    
    protected $table = 'essay_answers';

    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function esQuestion()
    {
        $this->belongsTo(EssayQuestion::class);
    }
}
