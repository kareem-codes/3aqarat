<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query()
            ->where('status', true)
            ->withCount('properties');

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

        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured);
        }

        $sortBy = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');
        $query->orderBy($sortBy, $sortDirection);

        $projects = $query->paginate(12)->through(fn($project) => [
            'id' => $project->id,
            'name' => $project->name,
            'slug' => $project->slug,
            'description' => $project->description,
            'images' => $project->images,
            'city' => $project->city,
            'state' => $project->state,
            'is_featured' => $project->is_featured,
            'categories' => $project->categories,
            'properties_count' => $project->properties_count,
            'price_range' => $project->price_range,
            'image' => $project->images[0] ?? null,
        ]);

        $cities = Project::where('status', true)
            ->distinct()
            ->pluck('city')
            ->filter()
            ->values();

        return Inertia::render('Projects/Index', [
            'projects' => $projects,
            'filters' => $request->only(['search', 'city', 'category', 'featured', 'sort', 'direction']),
            'cities' => $cities,
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)
            ->where('status', true)
            ->with(['properties' => function ($query) {
                $query->where('status', true)
                      ->with('agent:id,name,image,phone,email')
                      ->limit(6);
            }])
            ->firstOrFail();

        $relatedProjects = Project::where('status', true)
            ->where('id', '!=', $project->id)
            ->where(function ($query) use ($project) {
                $query->where('city', $project->city)
                      ->orWhere('state', $project->state);
            })
            ->withCount('properties')
            ->limit(4)
            ->get()
            ->map(fn($p) => [
                'id' => $p->id,
                'name' => $p->name,
                'slug' => $p->slug,
                'description' => $p->description,
                'city' => $p->city,
                'state' => $p->state,
                'properties_count' => $p->properties_count,
                'price_range' => $p->price_range,
                'image' => $p->images[0] ?? null,
            ]);

        return Inertia::render('Projects/Show', [
            'project' => [
                'id' => $project->id,
                'name' => $project->name,
                'slug' => $project->slug,
                'description' => $project->description,
                'images' => $project->images,
                'city' => $project->city,
                'state' => $project->state,
                'is_featured' => $project->is_featured,
                'categories' => $project->categories,
                'properties_count' => $project->properties_count,
                'price_range' => $project->price_range,
                'properties' => $project->properties->map(fn($property) => [
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
                ]),
            ],
            'relatedProjects' => $relatedProjects,
        ]);
    }
}
