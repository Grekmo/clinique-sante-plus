@extends('layouts.app')

@push('styles')
<style>
  .emp-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .emp-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .emp-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .emp-card .card-body { padding: 1.5rem 1.25rem; }
  .emp-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .emp-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-emp-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-emp-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-emp-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-emp-outline:hover { background-color: #1977cc; color: #ffffff; }
  .btn-emp-danger { background-color: #dc3545; border-color: #dc3545; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .table-emp { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-emp tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-emp tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-emp tbody tr:last-child { border-bottom: none; }
  .table-emp tbody tr:hover { background-color: #f8fafc; }
  .table-emp th { width: 35%; font-weight: 600; color: #2c4964; font-size: 0.9rem; white-space: nowrap; }
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
        <h1 class="emp-title">Détails de l'employé</h1>
        <p class="emp-subtitle">Informations complètes du profil employé</p>
      </div>
      <div class="actions">
        <a href="{{ route('employees.index') }}" class="btn-emp-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    <div class="emp-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-emp me-3"><i class="bi bi-person-circle"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Informations de l'employé</h5>
            <p class="mb-0 small text-muted">Profil détaillé</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table-emp table-borderless mb-0">
          <tr>
            <th>Nom :</th>
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
            <th>Date de naissance :</th>
            <td>{{ $employee->date_naissance ? $employee->date_naissance->format('d/m/Y') : '-' }}</td>
          </tr>
          <tr>
            <th>Téléphone :</th>
            <td>{{ $employee->mobile ?? '-' }}</td>
          </tr>
        </table>

        <div class="mt-4 pt-3 border-top">
          <a href="{{ route('employees.index') }}" class="btn-emp-outline">
            <i class="bi bi-arrow-left me-2"></i> Retour à la liste
          </a>
          <a href="{{ route('employees.edit', $employee->id) }}" class="btn-emp-primary">
            <i class="bi bi-pencil-square me-2"></i> Modifier
          </a>
          <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline-block ms-2"
                onsubmit="return confirm('Voulez-vous vraiment supprimer ce employé ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-emp-danger">
              <i class="bi bi-trash me-2"></i> Supprimer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
