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
  .btn-doc-warning { background-color: #f59e0b; border-color: #f59e0b; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-doc-info { background-color: #0ea5e9; border-color: #0ea5e9; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-doc-secondary { background-color: #64748b; border-color: #64748b; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-doc-secondary:hover { background-color: #475569; border-color: #475569; color: #ffffff; }
  .form-label-doc { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-doc { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-doc:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-select-doc { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-select-doc:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .invalid-feedback-doc { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-doc { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-doc.alert-success { background-color: #f0fdf4; color: #166534; }
  .alert-doc.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-doc { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-doc .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-doc .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-doc .actions { display: flex; gap: 0.75rem; }
  .btn-doc-warning.btn-sm, .btn-doc-info.btn-sm, .btn-doc-danger.btn-sm { padding: 0.35rem 0.65rem; font-size: 0.78rem; line-height: 1.2; }
  .table-doc { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-doc thead th { background-color: #f1f5f9; color: #2c4964; border-bottom: 2px solid #e2e8f0; border-top: none; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.85rem 1rem; vertical-align: middle; }
  .table-doc tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-doc tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-doc tbody tr:last-child { border-bottom: none; }
  .table-doc tbody tr:hover { background-color: #f8fafc; }
  .table-responsive-doc { border-radius: 12px; border: 1px solid #eef2f7; overflow: hidden; }
  .icon-box-doc { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
  .badge-doc { display: inline-block; padding: 0.4em 0.8em; border-radius: 6px; font-size: 0.78rem; font-weight: 600; color: #fff; background: #1977cc; }
</style>
@endpush

@section('content')
<div class="doc-page">
  <div class="container px-4 py-4">
    <div class="page-header-doc">
      <div class="title-group">
        <h1 class="doc-title">Liste des docteurs</h1>
        <p class="doc-subtitle">Gérez le corps médical de la clinique</p>
      </div>
      <div class="actions">
        <a href="{{ route('doctors.create') }}" class="btn-doc-primary">
          <i class="bi bi-person-plus me-2"></i> Ajouter un docteur
        </a>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-doc alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="doc-card">
      <div class="table-responsive-doc">
        <table class="table-doc table-borderless mb-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>CIN</th>
              <th>Spécialité</th>
              <th>Email</th>
              <th>Téléphone</th>
              <th>Actions</th>
              <th class="text-end text-nowrap"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($doctors as $doctor)
              <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->nom }}</td>
                <td>{{ $doctor->prenom }}</td>
                <td>{{ $doctor->cin }}</td>
                <td><span class="badge-doc">{{ $doctor->speciality ? $doctor->speciality->name : '—' }}</span></td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->mobile }}</td>
                <td class="text-end text-nowrap">
                  <div class="d-flex align-items-center flex-nowrap gap-1">
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn-doc-warning btn-sm">
                      <i class="bi bi-pencil-square me-1"></i> Modifier
                    </a>
                    <a href="{{ route('doctors.show', $doctor->id) }}" class="btn-doc-info btn-sm">
                      <i class="bi bi-eye me-1"></i> Voir
                    </a>
                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce docteur ?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-doc-danger btn-sm">
                        <i class="bi bi-trash me-1"></i> Supprimer
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="10" class="text-muted text-center py-4">Aucun docteur trouvé.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
