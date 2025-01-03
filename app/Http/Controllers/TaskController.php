<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the reso    urce.
     */
    public function index()
    {
        $tasks = Task::all();
        $users = User::all();
        return view('tasks.index', compact('tasks', 'users'));
    }

    public function assign(Request $request, $id)
{
    $task = Task::findOrFail($id);
    $user = User::find($request->assignee);
    $task->assignee = $user ? $user->name : null;
    $task->save();

    return back()->with('success', 'Tâche assignée avec succès.');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
