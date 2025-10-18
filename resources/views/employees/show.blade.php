@extends('layouts.app')

@section('title', 'Détails du Employee')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">👤 Informations d'employé</h4>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 40%;">Nom :</th>
                            <td>{{ $employee->nom }}</td>
                        </tr>
                        <tr>
                            <th>Prénom :</th>
                            <td>{{ $employee->prenom }}</td>
                        </tr>
                        <tr>
                            <th>CIN :</th>
                            <td>{{ $employee->cin }}</td>
                        </tr>
                        <tr>
                            <th>E-mail :</th>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <th>Adresse :</th>
                            <td>{{ $employee->adresse }}</td>
                        </tr>
                        <tr>
                            <th>Date de Naissance :</th>
                            <td>{{ $employee->date_naissance ? $employee->date_naissance->format('d/m/Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Téléphone :</th>
                            <td>{{ $employee->mobile ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">
                            ⬅ Retour à la liste
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary ms-2">
                            ✏ Modifier
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline-block ms-2" 
                              onsubmit="return confirm('Voulez-vous vraiment supprimer ce employee ?')">
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
