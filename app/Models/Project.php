<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'images',
        'city',
        'state',
        'status',
        'is_featured',
        'categories',

    ];
    protected $casts = [
        'images' => 'array',
        'categories' => 'array',
        'status' => 'boolean',
        'is_featured' => 'boolean',
    ];
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    protected $appends = ['properties_count', 'price_range'];
    public function getPropertiesCountAttribute()
    {
        return $this->properties()->count();
    }
    public function getPriceRangeAttribute()
    {
        $minPrice = $this->properties()->min('price');
        $maxPrice = $this->properties()->max('price');
        if ($minPrice === null || $maxPrice === null) {
            return null;
        }
        return $minPrice === $maxPrice ? $minPrice : $minPrice . ' - ' . $maxPrice;
    }
}
