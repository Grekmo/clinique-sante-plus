@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Liste des Rendez-vous</h1>
    
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Nouveau Rendez-vous</a>

    <table class="table table-bordered text-center table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Médecin</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient->nom }} {{ $appointment->patient->prenom }}</td>
                    <td>{{ $appointment->doctor->nom }} {{ $appointment->doctor->prenom }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointment->date_time)->format('Y-m-d H:i') }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-sm btn-info">Voir</a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
