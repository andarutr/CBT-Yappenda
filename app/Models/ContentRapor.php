<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentRapor extends Model
{
    use HasFactory;

    protected $table = 'content_rapor';

    protected $guarded = [];

    public function rapor()
    {
        return $this->belongsTo(Rapor::class);
    }    
    
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }    
}
