<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AgentController extends Controller
{
    public function index(Request $request)
    {
        $query = Agent::query()
            ->where('status', true)
            ->withCount('properties');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('bio', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('min_rating')) {
            $query->where('rating', '>=', $request->min_rating);
        }

        $sortBy = $request->get('sort', 'rating');
        $sortDirection = $request->get('direction', 'desc');
        $query->orderBy($sortBy, $sortDirection);

        $agents = $query->paginate(12)->through(fn($agent) => [
            'id' => $agent->id,
            'name' => $agent->name,
            'image' => $agent->image,
            'email' => $agent->email,
            'phone' => $agent->phone,
            'rating' => $agent->rating,
            'bio' => $agent->bio,
            'properties_count' => $agent->properties_count,
        ]);

        return Inertia::render('Agents/Index', [
            'agents' => $agents,
            'filters' => $request->only(['search', 'min_rating', 'sort', 'direction']),
        ]);
    }

    public function show(string $id)
    {
        $agent = Agent::where('id', $id)
            ->where('status', true)
            ->withCount('properties')
            ->firstOrFail();

        $properties = $agent->properties()
            ->where('status', true)
            ->with('project:id,name,slug')
            ->paginate(9)
            ->through(fn($property) => [
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
                'project' => $property->project,
            ]);

        return Inertia::render('Agents/Show', [
            'agent' => [
                'id' => $agent->id,
                'name' => $agent->name,
                'image' => $agent->image,
                'email' => $agent->email,
                'phone' => $agent->phone,
                'rating' => $agent->rating,
                'bio' => $agent->bio,
                'properties_count' => $agent->properties_count,
            ],
            'properties' => $properties,
        ]);
    }
}
