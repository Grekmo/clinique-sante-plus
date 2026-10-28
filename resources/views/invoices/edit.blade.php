@extends('layouts.app')

@push('styles')
<style>
  .inv-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .inv-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .inv-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .inv-card .card-body { padding: 1.5rem 1.25rem; }
  .inv-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .inv-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-inv-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-inv-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-inv-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-inv-outline:hover { background-color: #1977cc; color: #ffffff; }
  .form-label-inv { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-inv { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-inv:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-inv.is-invalid { border-color: #dc3545; }
  .form-select-inv { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-select-inv:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-select-inv.is-invalid { border-color: #dc3545; }
  .invalid-feedback-inv { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-inv { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-inv.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-inv { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-inv .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-inv .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-inv .actions { display: flex; gap: 0.75rem; }
  .icon-box-inv { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="inv-page">
  <div class="container px-4 py-4">
    <div class="page-header-inv">
      <div class="title-group">
        <h1 class="inv-title">Modifier la facture</h1>
        <p class="inv-subtitle">Mettez à jour la facture</p>
      </div>
      <div class="actions">
        <a href="{{ route('invoices.index') }}" class="btn-inv-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-inv alert-danger alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> Il y a des erreurs dans le formulaire.<br>
        <ul class="mb-0 mt-2 ps-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="inv-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-inv me-3"><i class="bi bi-receipt"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Modifier la facture</h5>
            <p class="mb-0 small text-muted">Mise à jour du montant et du statut</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-apt">Patient</label>
              <select name="patient_id" class="form-select form-select-apt {{ $errors->has('patient_id') ? 'is-invalid' : '' }}">
                @foreach($patients as $patient)
                  <option value="{{ $patient->id }}" {{ $invoice->patient_id == $patient->id ? 'selected' : '' }}>
                    {{ $patient->nom }} {{ $patient->prenom }} @if($patient->cin) - {{ $patient->cin }} @endif
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-apt">Médecin</label>
              <select name="doctor_id" class="form-select form-select-apt {{ $errors->has('doctor_id') ? 'is-invalid' : '' }}">
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}" {{ $invoice->doctor_id == $doctor->id ? 'selected' : '' }}>
                    {{ $doctor->nom }} {{ $doctor->prenom }} @if($doctor->cin) - {{ $doctor->cin }} @endif
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-inv">Montant</label>
              <input type="number" step="0.01" name="amount" class="form-control form-control-inv {{ $errors->has('amount') ? 'is-invalid' : '' }}" value="{{ old('amount', $invoice->amount) }}">
              <div class="invalid-feedback invalid-feedback-inv">Veuillez entrer un montant valide.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-inv">Statut</label>
              <select name="status" class="form-select form-select-inv {{ $errors->has('status') ? 'is-invalid' : '' }}">
                <option value="unpaid" {{ old('status', $invoice->status) == 'unpaid' ? 'selected' : '' }}>Non payé</option>
                <option value="paid" {{ old('status', $invoice->status) == 'paid' ? 'selected' : '' }}>Payé</option>
              </select>
            </div>
          </div>

          <div class="d-flex align-items-center mt-4 pt-3 border-top flex-wrap gap-3">
            <a href="{{ route('invoices.index') }}" class="btn-inv-outline">
              <i class="bi bi-arrow-left me-2"></i> Retour
            </a>
            <div class="flex-grow-1 d-flex justify-content-center">
              <button type="submit" class="btn-inv-primary px-5 py-2">
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
