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
  .table-apt { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-apt tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-apt tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-apt tbody tr:last-child { border-bottom: none; }
  .table-apt tbody tr:hover { background-color: #f8fafc; }
  .table-apt th { width: 35%; font-weight: 600; color: #2c4964; font-size: 0.9rem; white-space: nowrap; }
  .page-header-apt { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-apt .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-apt .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-apt .actions { display: flex; gap: 0.75rem; }
  .icon-box-apt { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
  .badge-apt { display: inline-block; padding: 0.4em 0.8em; border-radius: 6px; font-size: 0.78rem; font-weight: 600; color: #fff; background: #1977cc; }
</style>
@endpush

@section('content')
<div class="apt-page">
  <div class="container px-4 py-4">
    <div class="page-header-apt">
      <div class="title-group">
        <h1 class="apt-title">Détails du rendez-vous</h1>
        <p class="apt-subtitle">Informations du rendez-vous</p>
      </div>
      <div class="actions">
        <a href="{{ route('appointments.index') }}" class="btn-apt-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    <div class="apt-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-apt me-3"><i class="bi bi-calendar-check"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Rendez-vous</h5>
            <p class="mb-0 small text-muted">Détails du créneau</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table-apt table-borderless mb-0">
          <tr>
            <th>Patient :</th>
            <td>{{ $appointment->patient?->nom }} {{ $appointment->patient?->prenom }}</td>
          </tr>
          <tr>
            <th>Médecin :</th>
            <td>{{ $appointment->doctor?->nom }} {{ $appointment->doctor?->prenom }}</td>
          </tr>
          <tr>
            <th>Date :</th>
            <td>
              @if($appointment->date_time)
                {{ \Carbon\Carbon::parse($appointment->date_time)->format('Y-m-d H:i') }}
              @else
                —
              @endif
            </td>
          </tr>
          <tr>
            <th>Statut :</th>
            <td><span class="badge-apt">{{ $appointment->status }}</span></td>
          </tr>
          <tr>
            <th>Notes :</th>
            <td>{{ $appointment->notes }}</td>
          </tr>
        </table>

        <div class="mt-4 pt-3 border-top">
          <a href="{{ route('appointments.index') }}" class="btn-apt-outline">
            <i class="bi bi-arrow-left me-2"></i> Retour à la liste
          </a>
          <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn-apt-primary">
            <i class="bi bi-pencil-square me-2"></i> Modifier
          </a>
          <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline-block ms-2"
                onsubmit="return confirm('Voulez-vous vraiment supprimer ce rendez-vous ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-apt-danger">
              <i class="bi bi-trash me-2"></i> Supprimer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
