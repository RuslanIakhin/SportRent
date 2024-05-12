<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'deposit',
        'city',
        'status',
        'lessor_id',
        'category_id',
        'created_at'
    ];

    protected $casts = [
        'price' => 'float',
        'deposit' => 'float',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
