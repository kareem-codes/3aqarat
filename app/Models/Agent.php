<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'name',
        'image',
        'email',
        'phone',
        'status',
        'rating',
        'bio',
    ];
    protected $casts = [
        'status' => 'boolean',
        'rating' => 'decimal:2',
    ];
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}