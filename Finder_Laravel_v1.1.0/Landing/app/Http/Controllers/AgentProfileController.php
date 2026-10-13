<?php

namespace App\Http\Controllers;

use App\Models\User;

class AgentProfileController extends Controller
{
    public function index()
    {
        $agents = User::where('is_active', true)
            ->whereHas('roles', fn ($query) => $query->where('name', 'agent'))
            ->withCount(['assignedProperties as published_properties_count' => fn ($query) => $query->where('status', 'published')])
            ->orderBy('name')->orderBy('id')->paginate(12);

        return view('agents.index', compact('agents'));
    }

    public function show(User $agent)
    {
        abort_unless($agent->is_active && $agent->hasRole('agent'), 404);
        $properties = $agent->assignedProperties()->where('status', 'published')
            ->with(['images', 'details'])->orderByDesc('published_at')->orderByDesc('id')->paginate(9);

        return view('agents.show', compact('agent', 'properties'));
    }
}
