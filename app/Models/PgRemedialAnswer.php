<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgRemedialAnswer extends Model
{
    use HasFactory;

    protected $table = 'pg_remedial_answers';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pgQuestion()
    {
        return $this->belongsTo(PGQuestion::class);
    }
}
