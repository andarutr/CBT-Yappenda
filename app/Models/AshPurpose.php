<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AshPurpose extends Model
{
    use HasFactory;

    protected $table = 'ash_purposes';

    protected $guarded = [];

    public function ashResult()
    {
        return $this->hasMany(AshResult::class);
    }
}
