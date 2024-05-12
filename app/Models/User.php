<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable; 

    protected $fillable = [
        'fio',
        'email',
        'phone_number',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
    
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
