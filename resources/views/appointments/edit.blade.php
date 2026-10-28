@extends('layouts.app')

@push('styles')
<style>
  .apt-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .apt-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .apt-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .apt-card .card-body { padding: 1.5rem 1.25rem; }
  .apt-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .apt-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-apt-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-apt-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-apt-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-apt-outline:hover { background-color: #1977cc; color: #ffffff; }
  .form-label-apt { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-apt { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-apt:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-apt.is-invalid { border-color: #dc3545; }
  .form-select-apt { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-select-apt:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-select-apt.is-invalid { border-color: #dc3545; }
  .invalid-feedback-apt { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-apt { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-apt.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-apt { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-apt .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-apt .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-apt .actions { display: flex; gap: 0.75rem; }
  .icon-box-apt { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="apt-page">
  <div class="container px-4 py-4">
    <div class="page-header-apt">
      <div class="title-group">
        <h1 class="apt-title">Modifier le rendez-vous</h1>
        <p class="apt-subtitle">Mettez à jour le rendez-vous</p>
      </div>
      <div class="actions">
        <a href="{{ route('appointments.index') }}" class="btn-apt-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-apt alert-danger alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> Il y a des erreurs dans le formulaire.<br>
        <ul class="mb-0 mt-2 ps-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="apt-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-apt me-3"><i class="bi bi-calendar-check"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Modifier le rendez-vous</h5>
            <p class="mb-0 small text-muted">Mise à jour des informations du rendez-vous</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
          @csrf @method('PUT')

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-apt">Patient</label>
              <select name="patient_id" class="form-select form-select-apt {{ $errors->has('patient_id') ? 'is-invalid' : '' }}">
                @foreach($patients as $patient)
                  <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                    {{ $patient->nom }} {{ $patient->prenom }} @if($patient->cin) - {{ $patient->cin }} @endif
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-apt">Médecin</label>
              <select name="doctor_id" class="form-select form-select-apt {{ $errors->has('doctor_id') ? 'is-invalid' : '' }}">
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                    {{ $doctor->nom }} {{ $doctor->prenom }} @if($doctor->cin) - {{ $doctor->cin }} @endif
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-apt">Date et Heure</label>
              <input type="datetime-local" name="appointment_date" class="form-control form-control-apt {{ $errors->has('appointment_date') ? 'is-invalid' : '' }}" value="{{ optional(\Carbon\Carbon::parse($appointment->date_time))->format('Y-m-d\TH:i') }}">
            </div>

            <div class="col-md-6">
              <label class="form-label-apt">Statut</label>
              <select name="status" class="form-select form-select-apt {{ $errors->has('status') ? 'is-invalid' : '' }}">
                <option value="planifier" {{ $appointment->status == 'planifier' ? 'selected' : '' }}>Planifié</option>
                <option value="terminer" {{ $appointment->status == 'terminer' ? 'selected' : '' }}>Terminé</option>
                <option value="annuler" {{ $appointment->status == 'annuler' ? 'selected' : '' }}>Annulé</option>
              </select>
            </div>
          </div>

          <div class="d-flex align-items-center mt-4 pt-3 border-top flex-wrap gap-3">
            <a href="{{ route('appointments.index') }}" class="btn-apt-outline">
              <i class="bi bi-arrow-left me-2"></i> Retour
            </a>
            <div class="flex-grow-1 d-flex justify-content-center">
              <button type="submit" class="btn-apt-primary px-5 py-2">
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
