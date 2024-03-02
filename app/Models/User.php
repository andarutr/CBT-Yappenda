<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }

    public function exResult()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function pgAnswer()
    {
        return $this->hasMany(PGAnswer::class);
    }

    public function esAnswer()
    {
        return $this->hasMany(EssayAnswer::class);
    }

    public function rapor()
    {
        return $this->hasMany(Rapor::class);
    }
}
