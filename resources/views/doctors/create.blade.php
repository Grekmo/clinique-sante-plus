@extends('layouts.app') <!-- أو layout ديالك اللي فيه الهيكل العام -->

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Ajouter un docteur</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"></h4>
            </div>
            <div class="card-body">
                <form action="{{ route('doctors.store') }}" method="POST" class="needs-validation p-4 bg-light rounded shadow" novalidate>
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez le prénom" required>
                            <div class="invalid-feedback">Ce champ est requis.</div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom" required>
                            <div class="invalid-feedback">Ce champ est requis.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="cin">CIN</label>
                        <input type="text" class="form-control" id="cin" name="cin" placeholder="Ex: AB123456" required>
                        <div class="invalid-feedback">Veuillez entrer une CIN valide.</div>
                    </div>

                    <div class="form-group">
                        <label for="speciality_id">Spécialité</label>
                        <select name="speciality_id" id="speciality_id" class="form-control" required>
                            <option value="">-- Choisir une spécialité --</option>
                            @foreach($specialities as $spec)
                                <option value="{{ $spec->id }}" {{ old('speciality_id') == $spec->id ? 'selected' : '' }}>
                                    {{ $spec->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Ex: 123 Rue, Ville" required>
                        <div class="invalid-feedback">Ce champ est requis.</div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="email">Adresse Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="exemple@domaine.com" required>
                            <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="telephone">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="mobile" placeholder="Ex: 0600000000" required>
                            <div class="invalid-feedback">Ce champ est requis.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="date_naissance">Date de naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                        <div class="invalid-feedback">Veuillez choisir une date.</div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary w-100" type="submit">Enregistrer</button>
                    </div>
                    <a href="{{ route('doctors.index') }}" class="btn btn-outline-primary mt-4">⟵ Retour</a>
                </form>


            </div>
        </div>
    </div>

</div>
@endsection
