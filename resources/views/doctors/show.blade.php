@extends('layouts.app')

@section('title', 'Détails du doctor')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">👤 Informations du Docteur</h4>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 40%;">Nom :</th>
                            <td>{{ $doctor->nom }}</td>
                        </tr>
                        <tr>
                            <th>Prénom :</th>
                            <td>{{ $doctor->prenom }}</td>
                        </tr>
                        <tr>
                            <th>CIN :</th>
                            <td>{{ $doctor->cin }}</td>
                        </tr>
                        <tr>
                            <th>Spécialité:</th>
                            <td>{{ $doctor->speciality ? $doctor->speciality->name : '— non définie —' }} </td>
                        </tr>
                        <strong></strong>
                        <tr>
                            <th>E-mail :</th>
                            <td>{{ $doctor->email }}</td>
                        </tr>
                        <tr>
                            <th>Adresse :</th>
                            <td>{{ $doctor->adresse }}</td>
                        </tr>
                        <tr>
                            <th>Date de Naissance :</th>
                            <td>{{ $doctor->date_naissance ? $doctor->date_naissance->format('d/m/Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Téléphone :</th>
                            <td>{{ $doctor->mobile ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('doctors.index') }}" class="btn btn-outline-secondary">
                            ⬅ Retour à la liste
                        </a>
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-primary ms-2">
                            ✏ Modifier
                        </a>
                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline-block ms-2" 
                              onsubmit="return confirm('Voulez-vous vraiment supprimer ce doctor ?')">
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
