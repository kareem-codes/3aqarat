<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Property;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('status', true)
            ->where('is_featured', true)
            ->withCount('properties')
            ->latest()
            ->limit(8)
            ->get()
            ->map(fn($project) => [
                'id' => $project->id,
                'name' => $project->name,
                'slug' => $project->slug,
                'description' => $project->description,
                'city' => $project->city,
                'state' => $project->state,
                'properties_count' => $project->properties_count,
                'price_range' => $project->price_range,
                'image' => $project->images[0] ?? null,
            ]);

        $featuredProperties = Property::where('status', true)
            ->where('is_featured', true)
            ->with('agent:id,name,image')
            ->latest()
            ->limit(6)
            ->get()
            ->map(fn($property) => [
                'id' => $property->id,
                'name' => $property->name,
                'slug' => $property->slug,
                'price' => $property->price,
                'bedrooms' => $property->bedrooms,
                'bathrooms' => $property->bathrooms,
                'space' => $property->space,
                'city' => $property->city,
                'is_for_rent' => $property->is_for_rent,
                'is_for_sale' => $property->is_for_sale,
                'image' => $property->images[0] ?? null,
                'agent' => $property->agent,
            ]);

        $stats = [
            'total_projects' => Project::where('status', true)->count(),
            'total_properties' => Property::where('status', true)->count(),
            'cities_count' => Property::where('status', true)->distinct('city')->count('city'),
        ];

        return Inertia::render('Home', [
            'featuredProjects' => $featuredProjects,
            'featuredProperties' => $featuredProperties,
            'stats' => $stats,
        ]);
    }
}
