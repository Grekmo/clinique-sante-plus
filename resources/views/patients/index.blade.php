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
  .btn-pat-warning { background-color: #f59e0b; border-color: #f59e0b; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-pat-info { background-color: #0ea5e9; border-color: #0ea5e9; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .form-label-pat { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-pat { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-pat:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-select-pat { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-select-pat:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-pat.is-invalid, .form-select-pat.is-invalid { border-color: #dc3545; }
  .invalid-feedback-pat { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-pat { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-pat.alert-success { background-color: #f0fdf4; color: #166534; }
  .alert-pat.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-pat { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-pat .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-pat .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-pat .actions { display: flex; gap: 0.75rem; }
  .btn-pat-warning.btn-sm, .btn-pat-info.btn-sm, .btn-pat-danger.btn-sm { padding: 0.35rem 0.65rem; font-size: 0.78rem; line-height: 1.2; }
  .table-pat { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-pat thead th { background-color: #f1f5f9; color: #2c4964; border-bottom: 2px solid #e2e8f0; border-top: none; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.85rem 1rem; vertical-align: middle; }
  .table-pat tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-pat tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-pat tbody tr:last-child { border-bottom: none; }
  .table-pat tbody tr:hover { background-color: #f8fafc; }
  .table-responsive-pat { border-radius: 12px; border: 1px solid #eef2f7; overflow: hidden; }
  .icon-box-pat { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="pat-page">
  <div class="container px-4 py-4">
    <div class="page-header-pat">
      <div class="title-group">
        <h1 class="pat-title">Liste des patients</h1>
        <p class="pat-subtitle">Gérez les dossiers patients de la clinique</p>
      </div>
      <div class="actions">
        <a href="{{ route('patients.create') }}" class="btn-pat-primary">
          <i class="bi bi-person-plus me-2"></i> Ajouter un patient
        </a>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-pat alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if ($patients->count())
      <div class="pat-card">
        <div class="table-responsive-pat">
          <table class="table-pat table-borderless mb-0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Adresse</th>
                <th>Date de naissance</th>
                <th>Téléphone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($patients as $patient)
                <tr>
                  <td>{{ $patient->id }}</td>
                  <td>{{ $patient->nom }}</td>
                  <td>{{ $patient->prenom }}</td>
                  <td>{{ $patient->cin }}</td>
                  <td>{{ $patient->adresse }}</td>
                  <td>{{ $patient->date_naissance ? $patient->date_naissance->format('Y-m-d') : '-' }}</td>
                  <td>{{ $patient->mobile ?? '-' }}</td>
                  <td class="text-end text-nowrap">
                    <div class="d-flex align-items-center flex-nowrap gap-1">
                      <a href="{{ route('patients.edit', $patient->id) }}" class="btn-pat-warning btn-sm">
                        <i class="bi bi-pencil-square me-1"></i> Modifier
                      </a>
                      <a href="{{ route('patients.show', $patient->id) }}" class="btn-pat-info btn-sm">
                        <i class="bi bi-eye me-1"></i> Voir
                      </a>
                      <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce patient ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-pat-danger btn-sm">
                          <i class="bi bi-trash me-1"></i> Supprimer
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="d-flex justify-content-center mt-4">
        {{ $patients->links() }}
      </div>
    @else
      <div class="pat-card">
        <div class="card-body text-center py-5">
          <p class="text-muted">Aucun patient trouvé.</p>
        </div>
      </div>
    @endif
  </div>
</div>
@endsection
