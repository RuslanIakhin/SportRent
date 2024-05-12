<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{
    protected $fillable = [
        'rental_id',
        'comment',
        'plaintiff',
        'transfer',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
