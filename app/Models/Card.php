<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'user',
        'card_number',
        'validity_period',
        'holder_name',
        'code_cvv',
        'purpose',
        'created_at',
    ];

    protected $casts = [
        'card_number' => 'integer',
        'validity_period' => 'datetime',
        'code_cvv' => 'integer',
        'created_at' => 'datetime'
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
