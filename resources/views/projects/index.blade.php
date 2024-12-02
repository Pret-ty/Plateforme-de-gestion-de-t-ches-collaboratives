<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Projets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div style="display: flex">
                    <a href="{{ route('projects.create') }}" class="btn btn-success mb-3">Ajouter un projet</a> <br>
                    <h2>Liste des projets</h2>
                </div>
                <table class="table table-striped" id="projectTable">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date limite</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->titre }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->date_limite }}</td>
                            <td>
                                @if($project->statut == 'En cours')
                                    <span class="badge bg-warning">En cours</span>
                                @else
                                    <span class="badge bg-success">Terminé</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}">Modifier</button>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier le projet</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="titre" class="form-label">Titre</label>
                                                <input type="text" name="titre" class="form-control" value="{{ $project->titre }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" class="form-control">{{ $project->description }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date_limite" class="form-label">Date limite</label>
                                                <input type="date" name="date_limite" class="form-control" value="{{ $project->date_limite }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="statut" class="form-label">Statut</label>
                                                <select name="statut" class="form-select">
                                                    <option value="En cours" {{ $project->statut == 'En cours' ? 'selected' : '' }}>En cours</option>
                                                    <option value="Terminé" {{ $project->statut == 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
