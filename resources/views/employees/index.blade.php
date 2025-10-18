@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 ">Liste des employés</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="">
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Ajouter un employé</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>CIN</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Date de naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                    <tr>
                        <!-- $employe -> id -->
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->nom }}</td>
                        <td>{{ $employee->prenom }}</td>
                        <td>{{ $employee->cin }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->mobile }}</td>
                        <td>{{ $employee->adresse }}</td>
                        <td>{{ $employee->date_naissance->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">Voir</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-muted">Aucun employé trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

