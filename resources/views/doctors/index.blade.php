@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 ">Liste des Doctuers</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="">
        <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Ajouter un Docteur</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>CIN</th>
                    <th>Spécialité</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Date de naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                    <tr>
                        <!-- $employe -> id -->
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->nom }}</td>
                        <td>{{ $doctor->prenom }}</td>
                        <td>{{ $doctor->cin }}</td>
                        <td>{{ $doctor->speciality ? $doctor->speciality->name : '—' }}</td>   
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->mobile }}</td>
                        <td>{{ $doctor->adresse }}</td>
                        <td>{{ $doctor->date_naissance ? $doctor->date_naissance->format('Y-m-d') : '-' }}</td>
                        <td>
                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-sm btn-info">Voir</a>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-muted">Aucun docteur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

