@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 ">Patients List</h1>

    <div class="">
        <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Ajouter un patient</a>
    </div>

    @if ($patients->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Cin</th>
                        <th>Adresse</th>
                        <th>Date Naissance</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->nom }}</td>
                        <td>{{ $patient->prenom }}</td>
                        <td>{{ $patient->cin }}</td>
                        <td>{{ $patient->adresse }}</td>
                        <td>{{ $patient->date_naissance ? $patient->date_naissance->format('Y-m-d') : '-' }}</td>
                        <td>{{ $patient->mobile ?? '-' }}</td>
                        <td class="d-flex gap-2 align-items-center">
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-sm btn-info">Voir</a>
                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">Supprimer</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination links --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $patients->links() }}
        </div>

        @else
        <p>No patients found.</p>
    @endif
</div>
@endsection
