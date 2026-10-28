@extends('layouts.app')

@push('styles')
<style>
  .pat-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .pat-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .pat-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .pat-card .card-body { padding: 1.5rem 1.25rem; }
  .pat-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .pat-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-pat-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-pat-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-pat-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-pat-outline:hover { background-color: #1977cc; color: #ffffff; }
  .form-label-pat { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-pat { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-pat:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-pat.is-invalid { border-color: #dc3545; }
  .invalid-feedback-pat { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-pat { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-pat.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-pat { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-pat .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-pat .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-pat .actions { display: flex; gap: 0.75rem; }
  .icon-box-pat { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="pat-page">
  <div class="container px-4 py-4">
    <div class="page-header-pat">
      <div class="title-group">
        <h1 class="pat-title">Ajouter un patient</h1>
        <p class="pat-subtitle">Renseignez les informations du nouveau patient</p>
      </div>
      <div class="actions">
        <a href="{{ route('patients.index') }}" class="btn-pat-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-pat alert-danger alert-dismissible fade show" role="alert">
        <strong>Erreur</strong> Veuillez corriger les erreurs suivantes :<br>
        <ul class="mb-0 mt-2 ps-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="pat-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-pat me-3"><i class="bi bi-person-plus"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Nouveau patient</h5>
            <p class="mb-0 small text-muted">Création d'un dossier patient</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('patients.store') }}" method="POST">
          @csrf

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-pat" for="prenom">Prénom</label>
              <input type="text" class="form-control form-control-lg form-control-pat {{ $errors->has('prenom') ? 'is-invalid' : '' }}" id="prenom" name="prenom" placeholder="Entrez le prénom" value="{{ old('prenom') }}">
              <div class="invalid-feedback invalid-feedback-pat">Ce champ est requis.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-pat" for="nom">Nom</label>
              <input type="text" class="form-control form-control-lg form-control-pat {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Entrez le nom" value="{{ old('nom') }}">
              <div class="invalid-feedback invalid-feedback-pat">Ce champ est requis.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-pat" for="cin">CIN</label>
              <input type="text" class="form-control form-control-lg form-control-pat {{ $errors->has('cin') ? 'is-invalid' : '' }}" id="cin" name="cin" placeholder="Ex: AB123456" value="{{ old('cin') }}">
              <div class="invalid-feedback invalid-feedback-pat">Veuillez entrer une CIN valide.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-pat" for="adresse">Adresse</label>
              <input type="text" class="form-control form-control-lg form-control-pat {{ $errors->has('adresse') ? 'is-invalid' : '' }}" id="adresse" name="adresse" placeholder="Ex: 123 Rue, Ville" value="{{ old('adresse') }}">
              <div class="invalid-feedback invalid-feedback-pat">Ce champ est requis.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-pat" for="telephone">Téléphone</label>
              <input type="text" class="form-control form-control-lg form-control-pat {{ $errors->has('mobile') ? 'is-invalid' : '' }}" id="telephone" name="mobile" placeholder="Ex: 0600000000" value="{{ old('mobile') }}">
              <div class="invalid-feedback invalid-feedback-pat">Ce champ est requis.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-pat" for="date_naissance">Date de naissance</label>
              <input type="date" class="form-control form-control-lg form-control-pat {{ $errors->has('date_naissance') ? 'is-invalid' : '' }}" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}">
              <div class="invalid-feedback invalid-feedback-pat">Veuillez choisir une date.</div>
            </div>
          </div>

          <div class="d-flex align-items-center mt-4 pt-3 border-top flex-wrap gap-3">
            <a href="{{ route('patients.index') }}" class="btn-pat-outline">
              <i class="bi bi-x-circle me-2"></i> Annuler
            </a>
            <div class="flex-grow-1 d-flex justify-content-center">
              <button type="submit" class="btn-pat-primary px-5 py-2">
                <i class="bi bi-save me-2"></i> Enregistrer
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
