<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'images',
        'status',
        'is_featured',
        'is_for_rent',
        'is_for_sale',
        'categories',
        'city',
        'state',
        'price',
        'bedrooms',
        'bathrooms',
        'space',
        'project_id',
        'agent_id',
    ];

    protected $casts = [
        'images' => 'array',
        'categories' => 'array',
        'status' => 'boolean',
        'is_featured' => 'boolean',
        'is_for_rent' => 'boolean',
        'is_for_sale' => 'boolean',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
