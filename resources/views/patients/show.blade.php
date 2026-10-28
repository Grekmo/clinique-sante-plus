@extends('layouts.app')

@push('styles')
<style>
  .pat-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .pat-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .pat-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .pat-card .card-body { padding: 1.5rem 1.25rem; }
  .pat-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .pat-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-pat-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-pat-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-pat-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-pat-outline:hover { background-color: #1977cc; color: #ffffff; }
  .btn-pat-danger { background-color: #dc3545; border-color: #dc3545; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .table-pat { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-pat tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-pat tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-pat tbody tr:last-child { border-bottom: none; }
  .table-pat tbody tr:hover { background-color: #f8fafc; }
  .table-pat th { width: 35%; font-weight: 600; color: #2c4964; font-size: 0.9rem; white-space: nowrap; }
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
        <h1 class="pat-title">Détails du patient</h1>
        <p class="pat-subtitle">Informations complètes du dossier patient</p>
      </div>
      <div class="actions">
        <a href="{{ route('patients.index') }}" class="btn-pat-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    <div class="pat-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-pat me-3"><i class="bi bi-person-circle"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Informations du patient</h5>
            <p class="mb-0 small text-muted">Profil détaillé</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table-pat table-borderless mb-0">
          <tr>
            <th>Nom :</th>
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
            <th>Date de naissance :</th>
            <td>{{ $patient->date_naissance ? $patient->date_naissance->format('d/m/Y') : '-' }}</td>
          </tr>
          <tr>
            <th>Téléphone :</th>
            <td>{{ $patient->mobile ?? '-' }}</td>
          </tr>
        </table>

        <div class="mt-4 pt-3 border-top">
          <a href="{{ route('patients.index') }}" class="btn-pat-outline">
            <i class="bi bi-arrow-left me-2"></i> Retour à la liste
          </a>
          <a href="{{ route('patients.edit', $patient->id) }}" class="btn-pat-primary">
            <i class="bi bi-pencil-square me-2"></i> Modifier
          </a>
          <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline-block ms-2"
                onsubmit="return confirm('Voulez-vous vraiment supprimer ce patient ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-pat-danger">
              <i class="bi bi-trash me-2"></i> Supprimer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
