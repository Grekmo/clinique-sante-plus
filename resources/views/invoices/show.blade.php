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
  .table-inv { width: 100%; margin-bottom: 1rem; color: #444444; }
  .table-inv tbody td { border-color: #eef2f7; padding: 0.85rem 1rem; vertical-align: middle; font-size: 0.92rem; }
  .table-inv tbody tr { border-bottom: 1px solid #eef2f7; }
  .table-inv tbody tr:last-child { border-bottom: none; }
  .table-inv tbody tr:hover { background-color: #f8fafc; }
  .table-inv th { width: 35%; font-weight: 600; color: #2c4964; font-size: 0.9rem; white-space: nowrap; }
  .page-header-inv { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-inv .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-inv .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-inv .actions { display: flex; gap: 0.75rem; }
  .icon-box-inv { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
  .badge-inv { display: inline-block; padding: 0.4em 0.8em; border-radius: 6px; font-size: 0.78rem; font-weight: 600; color: #fff; background: #1977cc; }
</style>
@endpush

@section('content')
<div class="inv-page">
  <div class="container px-4 py-4">
    <div class="page-header-inv">
      <div class="title-group">
        <h1 class="inv-title">Détails de la facture</h1>
        <p class="inv-subtitle">Informations de la facture</p>
      </div>
      <div class="actions">
        <a href="{{ route('invoices.index') }}" class="btn-inv-outline">
          <i class="bi bi-arrow-left me-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    <div class="inv-card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="icon-box-inv me-3"><i class="bi bi-receipt"></i></div>
          <div>
            <h5 class="mb-0" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">Facture</h5>
            <p class="mb-0 small text-muted">Détails de facturation</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table-inv table-borderless mb-0">
          <tr>
            <th>Patient :</th>
            <td>{{ $invoice->patient?->nom }} {{ $invoice->patient?->prenom }}</td>
          </tr>
          <tr>
            <th>Médecin :</th>
            <td>{{ $invoice->doctor?->nom }} {{ $invoice->doctor?->prenom }}</td>
          </tr>
          <tr>
            <th>Montant :</th>
            <td>{{ $invoice->amount }} MAD</td>
          </tr>
          <tr>
            <th>Statut :</th>
            <td><span class="badge-inv">{{ $invoice->status }}</span></td>
          </tr>
          <tr>
            <th>Émise le :</th>
            <td>{{ optional($invoice->issued_at)->format('Y-m-d H:i') }}</td>
          </tr>
          <tr>
            <th>Notes :</th>
            <td>{{ $invoice->notes }}</td>
          </tr>
        </table>

        <div class="mt-4 pt-3 border-top">
          <a href="{{ route('invoices.index') }}" class="btn-inv-outline">
            <i class="bi bi-arrow-left me-2"></i> Retour à la liste
          </a>
          <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn-inv-primary">
            <i class="bi bi-pencil-square me-2"></i> Modifier
          </a>
          <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline-block ms-2"
                onsubmit="return confirm('Voulez-vous vraiment supprimer cette facture ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-inv-danger">
              <i class="bi bi-trash me-2"></i> Supprimer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
