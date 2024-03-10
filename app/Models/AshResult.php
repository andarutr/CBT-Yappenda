<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AshResult extends Model
{
    use HasFactory;

    protected $table = 'ash_results';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function ashPurpose()
    {
        return $this->belongsTo(AshPurpose::class);
    }
}
