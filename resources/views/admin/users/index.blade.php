<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des utilisateurs') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex space-x-8 border-b border-gray-300 dark:border-gray-700">
                    <a href="#" class="hover:text-blue-500">Mes Projets</a>
                    <a href="#" class="hover:text-blue-500">Mes tâches</a>
                    <a href="#" class="hover:text-blue-500">Gestion des utilisateurs</a>
                    <a href="#" class="hover:text-blue-500">Nouvelle tâche</a>
                </div>
            </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-lg font-bold">Liste des utilisateurs</h3>
                    <div class="bootstrap-isolated">
                        <table id="userTable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">Edit</a>

                        <a href="#" class="btn btn-sm btn-danger">Delete</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#categories-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            }
        });
    });
</script>
</x-app-layout>
