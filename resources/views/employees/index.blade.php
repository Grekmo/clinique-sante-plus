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
  .btn-emp-warning { background-color: #f59e0b; border-color: #f59e0b; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-emp-info { background-color: #0ea5e9; border-color: #0ea5e9; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-emp-secondary { background-color: #64748b; border-color: #64748b; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-emp-secondary:hover { background-color: #475569; border-color: #475569; color: #ffffff; }
  .form-label-emp { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-emp { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-emp:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-select-emp { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-select-emp:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .invalid-feedback-emp { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .table-emp { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-emp thead th { background-color: #f1f5f9; color: #2c4964; border-bottom: 2px solid #e2e8f0; border-top: none; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.85rem 1rem; vertical-align: middle; }
  .table-emp tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-emp tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-emp tbody tr:last-child { border-bottom: none; }
  .table-emp tbody tr:hover { background-color: #f8fafc; }
  .table-responsive-emp { border-radius: 12px; border: 1px solid #eef2f7; overflow: hidden; }
  .alert-emp { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-emp.alert-success { background-color: #f0fdf4; color: #166534; }
  .alert-emp.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-emp { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-emp .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-emp .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-emp .actions { display: flex; gap: 0.75rem; }
  .btn-emp-warning.btn-sm, .btn-emp-info.btn-sm, .btn-emp-danger.btn-sm { padding: 0.35rem 0.65rem; font-size: 0.78rem; line-height: 1.2; }
</style>
@endpush

@section('content')
<div class="emp-page">
  <div class="container px-4 py-4">
    <div class="page-header-emp">
      <div class="title-group">
        <h1 class="emp-title">Liste des employés</h1>
        <p class="emp-subtitle">Gérez le personnel de la clinique</p>
      </div>
      <div class="actions">
        <a href="{{ route('employees.create') }}" class="btn-emp-primary">
          <i class="bi bi-person-plus me-2"></i> Ajouter un employé
        </a>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-emp alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="emp-card">
      <div class="table-responsive-emp">
        <table class="table-emp table-borderless mb-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>CIN</th>
              <th>Email</th>
              <th>Téléphone</th>
              <th>Adresse</th>
              <th>Date de naissance</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($employees as $employee)
              <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->nom }}</td>
                <td>{{ $employee->prenom }}</td>
                <td>{{ $employee->cin }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->mobile }}</td>
                <td>{{ $employee->adresse }}</td>
                <td>{{ $employee->date_naissance->format('Y-m-d') }}</td>
                <td class="text-end text-nowrap">
                  <div class="d-flex align-items-center flex-nowrap gap-1">
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn-emp-warning btn-sm">
                      <i class="bi bi-pencil-square me-1"></i> Modifier
                    </a>
                    <a href="{{ route('employees.show', $employee->id) }}" class="btn-emp-info btn-sm">
                      <i class="bi bi-eye me-1"></i> Voir
                    </a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-emp-danger btn-sm">
                        <i class="bi bi-trash me-1"></i> Supprimer
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-muted text-center py-4">Aucun employé trouvé.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
