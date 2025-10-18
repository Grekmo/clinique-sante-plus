@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Modifier la Facture</h1>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Patient</label>
                        <input type="text" class="form-control" value="{{ $invoice->patient?->nom }} {{ $invoice->patient?->prenom }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Médecin</label>
                        <input type="text" class="form-control" value="{{ $invoice->doctor?->nom }} {{ $invoice->doctor?->prenom }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Montant</label>
                        <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $invoice->amount) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Statut</label>
                        <select name="status" class="form-control">
                            <option value="unpaid" {{ old('status', $invoice->status) == 'unpaid' ? 'selected' : '' }}>Non payé</option>
                            <option value="paid" {{ old('status', $invoice->status) == 'paid' ? 'selected' : '' }}>Payé</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                    <a href="{{ route('invoices.index') }}" class="btn btn-outline-primary mt-4">⟵ Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
