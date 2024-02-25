<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PGAnswer extends Model
{
    use HasFactory;

    protected $table = 'pg_answers';

    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function pgQuestion()
    {
        $this->belongsTo(PGQuestion::class);
    }
}
