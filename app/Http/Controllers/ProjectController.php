<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $projects = Auth::user()->projects;
        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_limite' => 'required|date',
            'statut' => 'required|in:En cours,Terminé',
        ]);

        Auth::user()->projects()->create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Projet ajouté avec succès !');
    }


    public function show(Project $project)
    {
        $this->authorize('view', $project);
        $tasks = $project->tasks;
        return view('projects.show', compact('project', 'tasks'));
    }


    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, Project $project)
    {

    }


    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->tasks()->delete();
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}
