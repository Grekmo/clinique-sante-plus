@extends('layouts.app')

@push('styles')
<style>
  .apt-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .apt-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .apt-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .apt-card .card-body { padding: 1.5rem 1.25rem; }
  .apt-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .apt-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-apt-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-apt-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-apt-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-apt-outline:hover { background-color: #1977cc; color: #ffffff; }
  .btn-apt-danger { background-color: #dc3545; border-color: #dc3545; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-apt-warning { background-color: #f59e0b; border-color: #f59e0b; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-apt-info { background-color: #0ea5e9; border-color: #0ea5e9; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .form-label-apt { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-apt { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-apt:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-select-apt { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-select-apt:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-apt.is-invalid, .form-select-apt.is-invalid { border-color: #dc3545; }
  .invalid-feedback-apt { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-apt { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-apt.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-apt { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-apt .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-apt .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-apt .actions { display: flex; gap: 0.75rem; }
  .btn-apt-warning.btn-sm, .btn-apt-info.btn-sm, .btn-apt-danger.btn-sm { padding: 0.35rem 0.65rem; font-size: 0.78rem; line-height: 1.2; }
  .table-apt { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-apt thead th { background-color: #f1f5f9; color: #2c4964; border-bottom: 2px solid #e2e8f0; border-top: none; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.85rem 1rem; vertical-align: middle; }
  .table-apt tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-apt tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-apt tbody tr:last-child { border-bottom: none; }
  .table-apt tbody tr:hover { background-color: #f8fafc; }
  .table-responsive-apt { border-radius: 12px; border: 1px solid #eef2f7; overflow: hidden; }
  .badge-apt { display: inline-block; padding: 0.4em 0.8em; border-radius: 6px; font-size: 0.78rem; font-weight: 600; color: #fff; background: #1977cc; }
  .icon-box-apt { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="apt-page">
  <div class="container px-4 py-4">
    <div class="page-header-apt">
      <div class="title-group">
        <h1 class="apt-title">Liste des rendez-vous</h1>
        <p class="apt-subtitle">Gérez les rendez-vous de la clinique</p>
      </div>
      <div class="actions">
        <a href="{{ route('appointments.create') }}" class="btn-apt-primary">
          <i class="bi bi-calendar-plus me-2"></i> Nouveau rendez-vous
        </a>
      </div>
    </div>

    <div class="apt-card">
      <div class="table-responsive-apt">
        <table class="table-apt table-borderless mb-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Patient</th>
              <th>Médecin</th>
              <th>Date</th>
              <th>Statut</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($appointments as $appointment)
              <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->patient->nom }} {{ $appointment->patient->prenom }}</td>
                <td>{{ $appointment->doctor->nom }} {{ $appointment->doctor->prenom }}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->date_time)->format('Y-m-d H:i') }}</td>
                <td>
                  @php
                    $badgeClass = $appointment->status === 'terminer' ? 'bg-success' : ($appointment->status === 'annuler' ? 'bg-danger' : 'bg-primary');
                  @endphp
                  <span class="badge {{ $badgeClass }}">{{ $appointment->status }}</span>
                </td>
                <td class="text-end text-nowrap">
                  <div class="d-flex align-items-center flex-nowrap gap-1">
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn-apt-warning btn-sm">
                      <i class="bi bi-pencil-square me-1"></i> Modifier
                    </a>
                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn-apt-info btn-sm">
                      <i class="bi bi-eye me-1"></i> Voir
                    </a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?');">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn-apt-danger btn-sm">
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
  </div>
</div>
@endsection
