<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'item_id',
        'renter_id',
        'start',
        'end',
        'status',
        'price',
        'confirmation_lessor',
        'confirmation_renter',
        'payment_card_id',
        'created_at'
    ];

    protected $casts = [
        'price' => 'float',
        'confirmation_lessor' => 'boolean',
        'confirmation_renter' => 'boolean',
        'created_at' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    public function conflicts()
    {
        return $this->hasMany(Conflict::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
