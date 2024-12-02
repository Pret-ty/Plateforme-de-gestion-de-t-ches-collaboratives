@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Mes Tâches</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">
        + Ajouter une tâche
    </a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Assignée à</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->titre }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    @if ($task->statut == 'Terminé')
                        <span class="badge bg-success">Terminé</span>
                    @else
                        <span class="badge bg-warning text-dark">Non terminé</span>
                    @endif
                </td>
                <td>
                    {{ $task->assignee ?? 'Non assignée' }}
                    <form action="{{ route('tasks.assign', $task->id) }}" method="POST" class="mt-2">
                        @csrf
                        <div class="d-flex align-items-center">
                            <select name="assignee" class="form-select me-2" style="width: auto;">
                                <option value="">Sélectionnez</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $task->assignee == $user->name ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Assigner</button>
                        </div>
                    </form>
                </td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                    @if ($task->statut == 'Terminé')
                        <a href="{{ route('tasks.markIncomplete', $task->id) }}" class="btn btn-info btn-sm">Non terminé</a>
                    @else
                        <a href="{{ route('tasks.markComplete', $task->id) }}" class="btn btn-success btn-sm">Terminé</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
