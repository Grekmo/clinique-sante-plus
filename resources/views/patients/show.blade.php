@extends('layouts.app')

@section('title', 'Détails du Patient')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">👤 Informations du Patient</h4>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 40%;">Nom :</th>
                            <td>{{ $patient->nom }}</td>
                        </tr>
                        <tr>
                            <th>Prénom :</th>
                            <td>{{ $patient->prenom }}</td>
                        </tr>
                        <tr>
                            <th>CIN :</th>
                            <td>{{ $patient->cin }}</td>
                        </tr>
                        <tr>
                            <th>Adresse :</th>
                            <td>{{ $patient->adresse }}</td>
                        </tr>
                        <tr>
                            <th>Date de Naissance :</th>
                            <td>{{ $patient->date_naissance ? $patient->date_naissance->format('d/m/Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Téléphone :</th>
                            <td>{{ $patient->mobile ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">
                            ⬅ Retour à la liste
                        </a>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary ms-2">
                            ✏ Modifier
                        </a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline-block ms-2" 
                              onsubmit="return confirm('Voulez-vous vraiment supprimer ce patient ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">🗑 Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
