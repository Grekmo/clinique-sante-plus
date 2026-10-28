@extends('layouts.app')

@push('styles')
<style>
  .dash-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .dash-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .dash-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .dash-card .card-body { padding: 1.5rem 1.25rem; }
  .dash-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .dash-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .stat-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; height: 100%; }
  .stat-card .card-body { padding: 1.5rem; }
  .stat-card .icon { width: 56px; height: 56px; display: flex; align-items: center; justify-content: center; border-radius: 14px; font-size: 1.6rem; }
  .stat-card .icon-doctors { background: #eff6ff; color: #1977cc; }
  .stat-card .icon-patients { background: #f0fdf4; color: #166534; }
  .stat-card .icon-employees { background: #fffbeb; color: #d97706; }
  .stat-card .label { color: #64748b; font-size: 0.875rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin: 0 0 0.5rem 0; font-family: var(--default-font); }
  .stat-card .value { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 2rem; margin: 0; }
  .page-header-dash { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-dash .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-dash .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-dash .actions { display: flex; gap: 0.75rem; }
  .icon-box-dash { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="dash-page">
  <div class="container px-4 py-4">
    <div class="page-header-dash">
      <div class="title-group">
        <h1 class="dash-title">Tableau de bord</h1>
        <p class="dash-subtitle">Bienvenue, {{ Auth::user()->name }} !</p>
      </div>
      <div class="actions">
        <div class="icon-box-dash"><i class="bi bi-speedometer2"></i></div>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="stat-card">
          <div class="card-body d-flex align-items-center">
            <div class="icon icon-doctors me-3"><i class="bi bi-person-badge"></i></div>
            <div>
              <div class="label">Médecins</div>
              <div class="value">{{ $doctorsCount ?? 0 }}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="card-body d-flex align-items-center">
            <div class="icon icon-patients me-3"><i class="bi bi-people"></i></div>
            <div>
              <div class="label">Patients</div>
              <div class="value">{{ $patientsCount ?? 0 }}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="card-body d-flex align-items-center">
            <div class="icon icon-employees me-3"><i class="bi bi-person-lines-fill"></i></div>
            <div>
              <div class="label">Employés</div>
              <div class="value">{{ $employeesCount ?? 0 }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
