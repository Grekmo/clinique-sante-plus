@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Modifier un Patient</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Attention!</strong> Il y a des erreurs.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ $patient->nom }}" class="form-control" required>
            </div>
            <div class="col">
                <label>Prénom</label>
                <input type="text" name="prenom" value="{{ $patient->prenom }}" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>CIN</label>
            <input type="text" name="cin" value="{{ $patient->cin }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text" name="adresse" value="{{ $patient->adresse }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" value="{{ $patient->mobile }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date de naissance</label>
            <input type="date" name="date_naissance" value="{{ old('date_naissance', $patient->date_naissance ? $patient->date_naissance->format('Y-m-d') : '') }}" class="form-control">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
        <a href="{{ route('patients.index') }}" class="btn btn-outline-primary mt-4">⟵ Retour</a>
    </form>
</div>
@endsection
