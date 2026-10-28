@extends('layouts.app')

@push('styles')
<style>
  .inv-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .inv-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .inv-card .card-header { background: #ffffff; border-bottom: 1px solid #eef2f7; border-radius: 0; padding: 1rem 1.25rem; }
  .inv-card .card-body { padding: 1.5rem 1.25rem; }
  .inv-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .inv-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-inv-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-inv-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-inv-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 8px; font-weight: 600; padding: 0.6rem 1.25rem; }
  .btn-inv-outline:hover { background-color: #1977cc; color: #ffffff; }
  .btn-inv-danger { background-color: #dc3545; border-color: #dc3545; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-inv-warning { background-color: #f59e0b; border-color: #f59e0b; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-inv-info { background-color: #0ea5e9; border-color: #0ea5e9; color: #ffffff; border-radius: 8px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .form-label-inv { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-inv { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-inv:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-select-inv { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.625rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-select-inv:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-inv.is-invalid, .form-select-inv.is-invalid { border-color: #dc3545; }
  .invalid-feedback-inv { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-inv { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; }
  .alert-inv.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-inv { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-inv .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-inv .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-inv .actions { display: flex; gap: 0.75rem; }
  .btn-inv-warning.btn-sm, .btn-inv-info.btn-sm, .btn-inv-danger.btn-sm { padding: 0.35rem 0.65rem; font-size: 0.78rem; line-height: 1.2; }
  .table-inv { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-inv thead th { background-color: #f1f5f9; color: #2c4964; border-bottom: 2px solid #e2e8f0; border-top: none; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.85rem 1rem; vertical-align: middle; }
  .table-inv tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-inv tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-inv tbody tr:last-child { border-bottom: none; }
  .table-inv tbody tr:hover { background-color: #f8fafc; }
  .table-responsive-inv { border-radius: 12px; border: 1px solid #eef2f7; overflow: hidden; }
  .badge-inv { display: inline-block; padding: 0.4em 0.8em; border-radius: 6px; font-size: 0.78rem; font-weight: 600; color: #fff; background: #1977cc; }
  .icon-box-inv { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
</style>
@endpush

@section('content')
<div class="inv-page">
  <div class="container px-4 py-4">
    <div class="page-header-inv">
      <div class="title-group">
        <h1 class="inv-title">Liste des factures</h1>
        <p class="inv-subtitle">Gérez les factures de la clinique</p>
      </div>
      <div class="actions">
        <a href="{{ route('invoices.create') }}" class="btn-inv-primary">
          <i class="bi bi-receipt me-2"></i> Nouvelle facture
        </a>
      </div>
    </div>

    <div class="inv-card">
      <div class="table-responsive-inv">
        <table class="table-inv table-borderless mb-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Patient</th>
              <th>Médecin</th>
              <th>Montant</th>
              <th>Statut</th>
              <th>Émise le</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($invoices as $invoice)
              <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->patient->nom }} {{ $invoice->patient->prenom }}</td>
                <td>{{ $invoice->doctor->nom }} {{ $invoice->doctor->prenom }}</td>
                <td>{{ $invoice->amount }} MAD</td>
                <td>
                  @php
                    $badgeClass = $invoice->status === 'paid' ? 'bg-success' : 'bg-danger';
                  @endphp
                  <span class="badge {{ $badgeClass }}">{{ $invoice->status }}</span>
                </td>
                <td>{{ optional($invoice->issued_at)->format('Y-m-d H:i') }}</td>
                <td class="text-end text-nowrap">
                  <div class="d-flex align-items-center flex-nowrap gap-1">
                    <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn-inv-warning btn-sm">
                      <i class="bi bi-pencil-square me-1"></i> Modifier
                    </a>
                    <a href="{{ route('invoices.show', $invoice->id) }}" class="btn-inv-info btn-sm">
                      <i class="bi bi-eye me-1"></i> Voir
                    </a>
                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette facture ?');">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn-inv-danger btn-sm">
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
