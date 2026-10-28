@extends('layouts.app')

@push('styles')
<style>
  .emp-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .emp-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .emp-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .emp-card .card-body { padding: 1.5rem 1.25rem; }
  .emp-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .emp-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-emp-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-emp-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-emp-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-emp-outline:hover { background-color: #1977cc; color: #ffffff; }
  .form-label-emp { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-emp { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-emp:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-emp.is-invalid { border-color: #dc3545; }
  .invalid-feedback-emp { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-emp { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-emp.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-emp { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-emp .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-emp .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-emp .actions { display: flex; gap: 0.75rem; }
  .icon-box-emp { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="emp-page">
  <div class="container px-4 py-4">
    <div class="page-header-emp">
      <div class="title-group">
        <h1 class="emp-title">Modifier un employé</h1>
        <p class="emp-subtitle">Mettez à jour les informations de l'employé</p>
      </div>
      <div class="actions">
        <a href="{{ route('employees.index') }}" class="btn-emp-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-emp alert-danger alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> Il y a des erreurs dans le formulaire.<br>
        <ul class="mb-0 mt-2 ps-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="emp-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-emp me-3"><i class="bi bi-person-gear"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Modifier l'employé</h5>
            <p class="mb-0 small text-muted">Mise à jour des informations dans le système</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-emp">Nom</label>
              <input type="text" name="nom" value="{{ old('nom', $employee->nom) }}" class="form-control form-control-lg form-control-emp {{ $errors->has('nom') ? 'is-invalid' : '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label-emp">Prénom</label>
              <input type="text" name="prenom" value="{{ old('prenom', $employee->prenom) }}" class="form-control form-control-lg form-control-emp {{ $errors->has('prenom') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-emp">CIN</label>
              <input type="text" name="cin" value="{{ old('cin', $employee->cin) }}" class="form-control form-control-lg form-control-emp {{ $errors->has('cin') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-emp">Adresse</label>
              <input type="text" name="adresse" value="{{ old('adresse', $employee->adresse) }}" class="form-control form-control-lg form-control-emp {{ $errors->has('adresse') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-emp">Mobile</label>
              <input type="text" name="mobile" value="{{ old('mobile', $employee->mobile) }}" class="form-control form-control-lg form-control-emp {{ $errors->has('mobile') ? 'is-invalid' : '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label-emp">Email</label>
              <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="form-control form-control-lg form-control-emp {{ $errors->has('email') ? 'is-invalid' : '' }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-emp">Date de naissance</label>
              <input type="date" name="date_naissance" value="{{ old('date_naissance', $employee->date_naissance ? \Carbon\Carbon::parse($employee->date_naissance)->format('Y-m-d') : '') }}" class="form-control form-control-lg form-control-emp {{ $errors->has('date_naissance') ? 'is-invalid' : '' }}">
            </div>
          </div>

          <div class="d-flex align-items-center mt-4 pt-3 border-top flex-wrap gap-3">
            <a href="{{ route('employees.index') }}" class="btn-emp-outline">
              <i class="bi bi-arrow-left me-2"></i> Retour
            </a>
            <div class="flex-grow-1 d-flex justify-content-center">
              <button type="submit" class="btn-emp-primary px-5 py-2">
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
