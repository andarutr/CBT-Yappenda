<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;

    protected $table = 'rapor';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contentRapor()
    {
        return $this->hasMany(ContentRapor::class);
    }
}
