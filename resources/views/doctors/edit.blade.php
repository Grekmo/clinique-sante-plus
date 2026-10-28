@extends('layouts.app')

@push('styles')
<style>
  .doc-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .doc-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .doc-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .doc-card .card-body { padding: 1.5rem 1.25rem; }
  .doc-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .doc-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-doc-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-doc-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-doc-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-doc-outline:hover { background-color: #1977cc; color: #ffffff; }
  .form-label-doc { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-doc { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-doc:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-doc.is-invalid { border-color: #dc3545; }
  .form-select-doc { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-select-doc:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-select-doc.is-invalid { border-color: #dc3545; }
  .invalid-feedback-doc { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-doc { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-doc.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-doc { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-doc .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-doc .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-doc .actions { display: flex; gap: 0.75rem; }
  .icon-box-doc { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="doc-page">
  <div class="container px-4 py-4">
    <div class="page-header-doc">
      <div class="title-group">
        <h1 class="doc-title">Modifier un docteur</h1>
        <p class="doc-subtitle">Mettez à jour les informations du médecin</p>
      </div>
      <div class="actions">
        <a href="{{ route('doctors.index') }}" class="btn-doc-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-doc alert-danger alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> Il y a des erreurs dans le formulaire.<br>
        <ul class="mb-0 mt-2 ps-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="doc-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-doc me-3"><i class="bi bi-person-badge"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Modifier le docteur</h5>
            <p class="mb-0 small text-muted">Mise à jour des informations dans le système</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-doc">Nom</label>
              <input type="text" name="nom" value="{{ old('nom', $doctor->nom) }}" class="form-control form-control-lg form-control-doc {{ $errors->has('nom') ? 'is-invalid' : '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label-doc">Prénom</label>
              <input type="text" name="prenom" value="{{ old('prenom', $doctor->prenom) }}" class="form-control form-control-lg form-control-doc {{ $errors->has('prenom') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-doc">CIN</label>
              <input type="text" name="cin" value="{{ old('cin', $doctor->cin) }}" class="form-control form-control-lg form-control-doc {{ $errors->has('cin') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-doc" for="speciality_id">Spécialité</label>
              <select name="speciality_id" id="speciality_id" class="form-select form-select-doc {{ $errors->has('speciality_id') ? 'is-invalid' : '' }}">
                <option value="">-- Choisir une spécialité --</option>
                @foreach($specialities as $spec)
                  <option value="{{ $spec->id }}" {{ (old('speciality_id', $doctor->speciality_id) == $spec->id) ? 'selected' : '' }}>
                    {{ $spec->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-doc">Adresse</label>
              <input type="text" name="adresse" value="{{ old('adresse', $doctor->adresse) }}" class="form-control form-control-lg form-control-doc {{ $errors->has('adresse') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-doc">Mobile</label>
              <input type="text" name="mobile" value="{{ old('mobile', $doctor->mobile) }}" class="form-control form-control-lg form-control-doc {{ $errors->has('mobile') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-doc">Email</label>
              <input type="email" name="email" value="{{ old('email', $doctor->email) }}" class="form-control form-control-lg form-control-doc {{ $errors->has('email') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-doc">Date de naissance</label>
              <input type="date" name="date_naissance" value="{{ old('date_naissance', $doctor->date_naissance ? $doctor->date_naissance->format('Y-m-d') : '') }}" class="form-control form-control-lg form-control-doc {{ $errors->has('date_naissance') ? 'is-invalid' : '' }}">
            </div>
          </div>

          <div class="d-flex align-items-center mt-4 pt-3 border-top flex-wrap gap-3">
            <a href="{{ route('doctors.index') }}" class="btn-doc-outline">
              <i class="bi bi-arrow-left me-2"></i> Retour
            </a>
            <div class="flex-grow-1 d-flex justify-content-center">
              <button type="submit" class="btn-doc-primary px-5 py-2">
                <i class="bi bi-check-circle me-2"></i> Mettre à jour
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
