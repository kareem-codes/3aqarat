<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query()
            ->where('status', true)
            ->with(['agent:id,name,image,phone,email', 'project:id,name,slug']);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('city', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        if ($request->filled('category')) {
            $query->whereJsonContains('categories', $request->category);
        }

        if ($request->filled('type')) {
            if ($request->type === 'rent') {
                $query->where('is_for_rent', true);
            } elseif ($request->type === 'sale') {
                $query->where('is_for_sale', true);
            }
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }

        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', '>=', $request->bathrooms);
        }

        if ($request->filled('min_space')) {
            $query->where('space', '>=', $request->min_space);
        }

        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured);
        }

        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        $sortBy = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');
        $query->orderBy($sortBy, $sortDirection);

        $properties = $query->paginate(12)->through(fn($property) => [
            'id' => $property->id,
            'name' => $property->name,
            'slug' => $property->slug,
            'description' => $property->description,
            'price' => $property->price,
            'bedrooms' => $property->bedrooms,
            'bathrooms' => $property->bathrooms,
            'space' => $property->space,
            'city' => $property->city,
            'state' => $property->state,
            'is_featured' => $property->is_featured,
            'is_for_rent' => $property->is_for_rent,
            'is_for_sale' => $property->is_for_sale,
            'categories' => $property->categories,
            'image' => $property->images[0] ?? null,
            'agent' => $property->agent,
            'project' => $property->project,
        ]);

        $cities = Property::where('status', true)
            ->distinct()
            ->pluck('city')
            ->filter()
            ->values();

        return Inertia::render('Properties/Index', [
            'properties' => $properties,
            'filters' => $request->only([
                'search', 'city', 'category', 'type', 'min_price', 'max_price',
                'bedrooms', 'bathrooms', 'min_space', 'featured', 'project_id', 'sort', 'direction'
            ]),
            'cities' => $cities,
        ]);
    }

    public function show(string $slug)
    {
        $property = Property::where('slug', $slug)
            ->where('status', true)
            ->with([
                'agent:id,name,image,phone,email,bio,rating',
                'project:id,name,slug,description,images'
            ])
            ->firstOrFail();

        $relatedProperties = Property::where('status', true)
            ->where('id', '!=', $property->id)
            ->where(function ($query) use ($property) {
                $query->where('city', $property->city)
                      ->orWhere('project_id', $property->project_id)
                      ->orWhere('bedrooms', $property->bedrooms);
            })
            ->with('agent:id,name,image')
            ->limit(4)
            ->get()
            ->map(fn($p) => [
                'id' => $p->id,
                'name' => $p->name,
                'slug' => $p->slug,
                'price' => $p->price,
                'bedrooms' => $p->bedrooms,
                'bathrooms' => $p->bathrooms,
                'space' => $p->space,
                'city' => $p->city,
                'is_for_rent' => $p->is_for_rent,
                'is_for_sale' => $p->is_for_sale,
                'image' => $p->images[0] ?? null,
                'agent' => $p->agent,
            ]);

        return Inertia::render('Properties/Show', [
            'property' => [
                'id' => $property->id,
                'name' => $property->name,
                'slug' => $property->slug,
                'description' => $property->description,
                'images' => $property->images,
                'price' => $property->price,
                'bedrooms' => $property->bedrooms,
                'bathrooms' => $property->bathrooms,
                'space' => $property->space,
                'city' => $property->city,
                'state' => $property->state,
                'is_featured' => $property->is_featured,
                'is_for_rent' => $property->is_for_rent,
                'is_for_sale' => $property->is_for_sale,
                'categories' => $property->categories,
                'agent' => $property->agent,
                'project' => $property->project,
            ],
            'relatedProperties' => $relatedProperties,
        ]);
    }
}
