<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Funboard extends Model
{
    protected $table = 'funboard';
    protected $fillable = [
        'user_id',
        'message',
        'status'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
