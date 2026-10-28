@extends('layouts.app')

@push('styles')
<style>
  .doc-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .doc-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .doc-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .doc-card .card-body { padding: 1.5rem 1.25rem; }
  .doc-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .doc-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-doc-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-doc-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-doc-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-doc-outline:hover { background-color: #1977cc; color: #ffffff; }
  .btn-doc-danger { background-color: #dc3545; border-color: #dc3545; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .table-doc { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-doc tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-doc tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-doc tbody tr:last-child { border-bottom: none; }
  .table-doc tbody tr:hover { background-color: #f8fafc; }
  .table-doc th { width: 35%; font-weight: 600; color: #2c4964; font-size: 0.9rem; white-space: nowrap; }
  .page-header-doc { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-doc .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-doc .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-doc .actions { display: flex; gap: 0.75rem; }
  .icon-box-doc { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
  .badge-doc { display: inline-block; padding: 0.4em 0.8em; border-radius: 6px; font-size: 0.78rem; font-weight: 600; color: #fff; background: #1977cc; }
</style>
@endpush

@section('content')
<div class="doc-page">
  <div class="container px-4 py-4">
    <div class="page-header-doc">
      <div class="title-group">
        <h1 class="doc-title">Détails du docteur</h1>
        <p class="doc-subtitle">Informations complètes du profil médecin</p>
      </div>
      <div class="actions">
        <a href="{{ route('doctors.index') }}" class="btn-doc-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    <div class="doc-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-doc me-3"><i class="bi bi-person-circle"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Informations du docteur</h5>
            <p class="mb-0 small text-muted">Profil détaillé</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table-doc table-borderless mb-0">
          <tr>
            <th>Nom :</th>
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
            <th>Spécialité :</th>
            <td><span class="badge-doc">{{ $doctor->speciality ? $doctor->speciality->name : '— non définie —' }}</span></td>
          </tr>
          <tr>
            <th>E-mail :</th>
            <td>{{ $doctor->email }}</td>
          </tr>
          <tr>
            <th>Adresse :</th>
            <td>{{ $doctor->adresse }}</td>
          </tr>
          <tr>
            <th>Date de naissance :</th>
            <td>{{ $doctor->date_naissance ? $doctor->date_naissance->format('d/m/Y') : '-' }}</td>
          </tr>
          <tr>
            <th>Téléphone :</th>
            <td>{{ $doctor->mobile ?? '-' }}</td>
          </tr>
        </table>

        <div class="mt-4 pt-3 border-top">
          <a href="{{ route('doctors.index') }}" class="btn-doc-outline">
            <i class="bi bi-arrow-left me-2"></i> Retour à la liste
          </a>
          <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn-doc-primary">
            <i class="bi bi-pencil-square me-2"></i> Modifier
          </a>
          <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline-block ms-2"
                onsubmit="return confirm('Voulez-vous vraiment supprimer ce docteur ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-doc-danger">
              <i class="bi bi-trash me-2"></i> Supprimer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
